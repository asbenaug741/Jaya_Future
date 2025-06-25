<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest()->paginate(10); // optional pagination
        return view('admin.messages.index', compact('messages'));
    }

    public function show($id)
    {
        $message = ContactMessage::findOrFail($id);
        return view('admin.messages.show', compact('message'));
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'nullable|string|max:20',
            'upload_file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
            'topic' => 'required|in:General,Technical Support,Billing,Others',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        // Upload file
        if ($request->hasFile('upload_file')) {
            $validated['upload_file'] = $request->file('upload_file')->store('uploads/contact', 'public');
        }

        ContactMessage::create($validated);

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
