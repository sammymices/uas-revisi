<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
{
    // Validate the input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string',
    ]);

    // Save the feedback
    Feedback::create([
        'name' => $request->name,
        'email' => $request->email,
        'message' => $request->message,
    ]);

    // Redirect back to the contact page with a success message
    return redirect()->route('contact')->with('success', 'Pesan Anda berhasil dikirim!');
}

}
