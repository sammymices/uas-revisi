<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function index(){
        $fosterChildCount = DB::table('foster_children')->count();
        $data = array(
            'fosterChildCount' => $fosterChildCount
        );
        return view('about', $data);
    }
}
