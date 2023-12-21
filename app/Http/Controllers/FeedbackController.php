<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackMail;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('dashboard.feedback');
    }
    public function submit(Request $request)
    {
        $feedback = $request->input('feedback');

        // Kirim email
        Mail::to('sahabatmahasiswa@sahabat.com')->send(new FeedbackMail($feedback));
        

        // Logika lain, jika diperlukan

        return redirect('/dashboard/feedback')->with('success', 'Feedback berhasil dikirim');
    }
}
