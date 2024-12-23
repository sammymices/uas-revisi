<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class DonationController extends Controller
{
    public function printMoneyDonation()
    {
        $donations = Donation::with('user')->where(['status' => 'settlement', 'donation_type' => 'uang'])->get();
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadview('dashboard.pages.donation.printMoneyDonation', compact('donations'));
        return $pdf->stream();
    }

    public function viewUang(): view
    {
        $donations = Donation::with('user')->where(['status' => 'settlement', 'donation_type' => 'uang'])->get();
        return \view ('dashboard.pages.donation.uang', compact('donations'));
    }

    public function viewBarang(): view
    {
        $donations = Donation::with('user')->where(['status' => 'settlement', 'donation_type' => 'barang'])->get();
        return \view ('dashboard.pages.donation.barang', compact('donations'));
    }

    public function create(): View
    {
        return view('dashboard.pages.donation.create');
    }

    public function edit($id): view
    {
        $data = Donation::where('order_id', $id)->first();
        return view('dashboard.pages.donation.edit', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'description' => 'required',
            'photo' => 'required|image',
        ]);
        $data['photo'] = Storage::disk('public')->put('file', $request->file('photo'));
        $data['order_id'] = mt_rand(10000, 1000000);
        $data['date'] = Carbon::now();
        $data['user_id'] = Auth()->id();
        $data['status'] = 'settlement';
        $data['donation_type'] = 'barang';
        Donation::create($data);

        return to_route('dashboard.donation.barang.index');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'description' => 'required',
        ]);
        if ($request->hasFile('photo')) {
            $data['photo'] = Storage::disk('public')->put('file', $request->file('photo'));
        }
        $data['order_id'] = mt_rand(10000, 1000000);
        $data['date'] = Carbon::now();
        $data['user_id'] = Auth()->id();
        $data['status'] = 'settlement';
        $data['donation_type'] = 'barang';
        Donation::where('order_id', $id)->update($data);

        return to_route('dashboard.donation.barang.index');
    }

    public function destroy($id)
    {
        $data = Donation::where('order_id',$id)->first();

        if (Storage::exists('public/' . $data->photo)) {
            Storage::delete('public/' . $data->photo);
        }

        Donation::where('order_id',$id)->delete();

        return to_route('dashboard.donation.index')->with('success', 'berhasil menghapus donation!');
    }

    public function storeMoney(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'description' => 'nullable',
            'photo' => 'required|image', // Pastikan foto adalah gambar
        ]);
    
        // Simpan foto jika ada
        $data['photo'] = Storage::disk('public')->put('file', $request->file('photo'));
        $data['order_id'] = mt_rand(10000, 1000000);
        $data['date'] = Carbon::now();
        $data['user_id'] = Auth()->id();
        $data['status'] = 'settlement';
        $data['donation_type'] = 'uang'; // Set donation_type ke 'uang'
    
        Donation::create($data);
    
        return to_route('dashboard.donation.uang.index')->with('success', 'Donasi uang berhasil disimpan!');
    }

}
