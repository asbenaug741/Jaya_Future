<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index()
    {
        return view('admin.dashboard');
    }

    public function jobsAdmin()
    {
        return view('admin.jobs-admin');
    }


    public function postSubmitted()
    {
        return view('admin.post-submitted');
    }

    public function applicant()
    {
        return view('admin.applicant');
    }
}
