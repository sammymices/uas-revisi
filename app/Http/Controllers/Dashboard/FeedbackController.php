<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Feedback;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    public function index()
    {
        // Ambil data feedback dengan pagination
        $feedback = Feedback::orderBy('created_at', 'desc')->paginate(10);

        return view('dashboard.pages.feedback.index', compact('feedback'));
    }
}
