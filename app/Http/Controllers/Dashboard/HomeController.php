<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use const App\Mod;

class HomeController extends Controller
{
    public function index(): View
    {
        $donBarang = Donation::where('donation_type', 'barang')->sum('amount');
        $donUang = Donation::where('donation_type', 'uang')->sum('amount');
        $event = \App\Models\Activity::count();
        $data_anak = \App\Models\Child::count();
        $data_feedback = \App\Models\Feedback::count();
        $data_donatur = DB::table('roles', '2')->count();
        $data = array(
            'don_barang' => $donBarang,
            'don_uang' => $donUang,
            'event' => $event,
            'data_anak' => $data_anak,
            'data_donatur' => $data_donatur,
            'data_feedback' => $data_feedback
        );
        return \view('dashboard.pages.index', $data);
    }
}
