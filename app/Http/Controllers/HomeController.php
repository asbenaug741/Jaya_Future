<?php

namespace App\Http\Controllers;

use App\Models\Job;

class HomeController extends Controller
{

    public function index()
    {
        $latestJobs = Job::latest()->take(4)->get();
        $topInternships = Job::where('job_kind', 'Internship')->latest()->take(4)->get();
        $topTrainings = Job::where('job_kind', 'Training')->latest()->take(4)->get();

        return view('home', compact('latestJobs', 'topInternships', 'topTrainings'));
    }
}
