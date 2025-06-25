<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Tag;

class jobController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        // Filter hanya untuk job_kind = Job
        $query = Job::where('job_kind', 'Job');

        // Jika ada keyword, tambahkan kondisi pencarian
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;

            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', '%' . $keyword . '%')
                    ->orWhere('company_name', 'like', '%' . $keyword . '%')
                    ->orWhere('location', 'like', '%' . $keyword . '%')
                    ->orWhere('category', 'like', '%' . $keyword . '%');
            });
        }

        // Ambil hasil dengan pagination
        $jobs = $query->latest()->simplePaginate(8);

        // Untuk admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            return view('admin.job.index', compact('jobs'));
        }

        // Untuk user biasa
        return view('jobs', compact('jobs'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Tag::all();
        return view('admin.job.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'company_name' => 'required|string',
            'location' => 'required|string',
            'category' => 'required|string',
            'job_type' => 'required|string',
            'description' => 'required|string',
            'requirement' => 'required|string',
            'benefit' => 'required|string',
            'company_logo' => 'nullable|image|max:2048',
            'status' => 'required|in:Open,Closed,Paused',
        ]);

        $logoPath = null;
        if ($request->hasFile('company_logo')) {
            $logoPath = $request->file('company_logo')->store('logos', 'public');
        }

        Job::create([
            'title' => $request->title,
            'job_kind' => $request->job_kind,
            'company_name' => $request->company_name,
            'location' => $request->location,
            'category' => $request->category,
            'job_type' => $request->job_type,
            'description' => $request->description,
            'requirement' => $request->requirement,
            'benefit' => $request->benefit,
            'company_logo' => $logoPath,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.job.index')->with('success', 'Job successfully added!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jobs = Job::findOrFail($id);
        // return view('job-detail', compact('jobs'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $categories = Tag::all();
        $jobs = Job::findOrFail($id);
        return view('admin.job.edit', compact('jobs', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $jobs = Job::findOrFail($id);

        $request->validate([
            'title' => 'required|string',
            'company_name' => 'required|string',
            'location' => 'required|string',
            'category' => 'required|string',
            'job_type' => 'required|string',
            'description' => 'required|string',
            'requirement' => 'required|string',
            'benefit' => 'required|string',
            'company_logo' => 'nullable|image|max:2048',
            'status' => 'required|in:Open,Closed,Paused',
        ]);

        $logoPath = null;
        if ($request->hasFile('company_logo')) {
            $logoPath = $request->file('company_logo')->store('logos', 'public');
        }

        $jobs->update([
            'title' => $request->title,
            'job_kind' => $request->job_kind,
            'company_name' => $request->company_name,
            'location' => $request->location,
            'category' => $request->category,
            'job_type' => $request->job_type,
            'description' => $request->description,
            'requirement' => $request->requirement,
            'benefit' => $request->benefit,
            'company_logo' => $logoPath ?? $jobs->company_logo,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.job.index')->with('success', 'Job successfully Update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $job = Job::findOrFail($id);
        $job->delete();

        return redirect()->route('admin.job.index')->with('success', 'Successfully Delete');
    }
}
