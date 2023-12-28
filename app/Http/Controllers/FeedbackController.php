<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::latest()->get();
        return view('dashboard.feedback', compact('feedbacks'));
    }

    public function submit(Request $request)
    {
        // Validate the request
        $request->validate([
            'content' => 'required|string',
            'feedbackFile' => 'nullable|file|mimes:jpeg,png,pdf|max:2048', // Adjust file types and size as needed
        ]);

        $fileName = null;

        // Handle file upload if a file is provided
        if ($request->hasFile('feedbackFile')) {
            $file = $request->file('feedbackFile');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('feedback_files', $fileName, 'public'); // Adjust the storage path as needed
        }

        // Save feedback to the database or perform any other necessary actions
        $feedback = new Feedback();
        $feedback->content = $request->input('content');
        $feedback->file_path = $fileName; // Save the file path if a file is uploaded
        $feedback->save();

        return response()->json($feedback);
    }

}