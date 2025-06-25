<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class internshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Job::where('job_kind', 'Internship');

        if ($request->has('search')) {
            $keyword = $request->search;
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                    ->orWhere('location', 'like', "%{$keyword}%")
                    ->orWhere('category', 'like', "%{$keyword}%");
            });
        }

        $internships = $query->latest()->paginate(10);

        return view('admin.internship.index', compact('internships'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Tag::all();
        return view('admin.internship.create', compact('categories'));
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

        return redirect()->route('admin.internship.index')->with('success', 'Job successfully added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $internships = Job::findOrFail($id);
        $categories = Tag::all();
        return view('admin.internship.edit', compact('internships', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $internships = Job::findOrFail($id);

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

        $internships->update([
            'title' => $request->title,
            'job_kind' => $request->job_kind,
            'company_name' => $request->company_name,
            'location' => $request->location,
            'category' => $request->category,
            'job_type' => $request->job_type,
            'description' => $request->description,
            'requirement' => $request->requirement,
            'benefit' => $request->benefit,
            'company_logo' => $logoPath ?? $internships->company_logo,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.internship.index')->with('success', 'Internship Succesfully Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $internship = Job::findOrFail($id);
        $internship->delete();
        return redirect()->route('admin.internship.index')->with('success', 'Internship successfully deleted!');
    }
}
