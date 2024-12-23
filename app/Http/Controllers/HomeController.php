<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Donation;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $fosterChildCount = DB::table('foster_children')->count();
        $events = \App\Models\Activity::orderBy('created_at', 'desc')->take(3)->get();
        $data = array(
            'events' => $events,
            'fosterChildCount' => $fosterChildCount
        );
        return view('home', $data);
    }

    public function donation()
    {
        $data = array(

        );
        return view('donateform', $data);
    }

    public function eventDonation(Activity $event)
    {
        return view('donateform-event', compact('event', 'profile'));
    }

    public function donate(Request $request): JsonResponse
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('app.midtrans_server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $request->jumlah,
            ),
            'customer_details' => array(
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email
            ),
            'custom_field1' => $request->pesan,
            'custom_field2' => $request->activity_id ?? 0,
            'custom_field3' => json_encode([
                'id' => auth()->id(),
                'name' => auth()->user()->name
            ]),
        );

        $transaction = \Midtrans\Snap::createTransaction($params);

        return response()->json(['token' => $transaction->token, 'url' => $transaction->redirect_url]);
    }

    public function handleAfterPayment(Request $request)
    {
        $custom_field3 = json_decode($request->custom_field3, true);
        $data = [
            'order_id' => $request->order_id,
            'payment_type' => $request->payment_type,
            'status' => $request->transaction_status,
            'amount' => $request->gross_amount,
            'date' => Carbon::now(),
            'user_id' => $custom_field3['id'],
            'name'  => $custom_field3['name'],
            'description' => $request->custom_field1,
            'donation_type' => 'uang',
            'photo' => ''
        ];
        if($request->custom_field2 != 0)
            $data['activity_id'] = $request->custom_field2;


        $signature = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . config('app.midtrans_server_key'));
        if($request->signature_key == $signature){
            Donation::updateOrInsert(['order_id' => $request->order_id], $data);
        }
    }
}
