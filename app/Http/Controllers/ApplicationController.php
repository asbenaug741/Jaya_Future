<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Application;
use App\Models\Job;

class ApplicationController extends Controller
{

    public function index($status = null)
    {
        if ($status && in_array($status, ['Approved', 'In Review', 'Rejected'])) {
            $applications = Application::with('job')->where('status', $status)->latest()->get();
        } else {
            $applications = Application::with('job')->latest()->get();
        }

        return view('admin.applicant', compact('applications'));
    }

    public function show($id)
    {
        $application = \App\Models\Application::with('job', 'user')->findOrFail($id);
        return view('admin.applicant-show', compact('application'));
    }


    public function showForm($jobId)
    {
        $job = Job::findOrFail($jobId);
        return view('submit-form', compact('job'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string|max:20',
            'cv' => 'required|file|mimes:pdf,doc,docx',
            'additional_file' => 'nullable|file|mimes:pdf,doc,docx',
            'cover_letter' => 'nullable|string',
        ]);

        $cvPath = $request->file('cv')->store('applications/cv', 'public');
        $additionalPath = $request->file('additional_file') ?
            $request->file('additional_file')->store('applications/other', 'public') :
            null;

        Application::create([
            'user_id' => Auth::id(),
            'job_id' => $request->job_id,
            'name' => $request->name . ' ' . $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'cv' => $cvPath,
            'additional_file' => $additionalPath,
            'cover_letter' => $request->cover_letter,
            'status' => 'In Review',
            'application_date' => now(),
        ]);

        return redirect()->back()->with('success', 'Application submitted successfully!');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Approved,In Review,Rejected',
        ]);

        $app = \App\Models\Application::findOrFail($id);
        $app->status = $request->status;
        $app->save();

        return response()->json(['message' => 'Status updated successfully.']);
    }
}
