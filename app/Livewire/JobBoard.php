<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class JobBoard extends Component
{
    public function archiveJob($jobId)
    {
        if (!Auth::check()) {
            session()->flash('error', 'You need to log in to archive jobs.');
            return;
        }

        $user = Auth::user();

        // Cegah archive duplikat
        $alreadyArchived = $user->archivedJobs()->where('job_id', $jobId)->exists();

        if ($alreadyArchived) {
            session()->flash('message', 'Job already archived.');
            return;
        }

        $user->archivedJobs()->attach($jobId);

        session()->flash('message', 'Job archived successfully.');
    }


    public $jobs;
    public $selectedJob = null;

    public function mount(Request $request)
    {
        $query = Job::query();

        if ($request->has('job_kind')) {
            $query->where('job_kind', $request->job_kind);
        }

        if ($request->has('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', '%' . $keyword . '%')
                    ->orWhere('company_name', 'like', '%' . $keyword . '%')
                    ->orWhere('location', 'like', '%' . $keyword . '%')
                    ->orWhere('category', 'like', '%' . $keyword . '%');
            });
        }

        $this->jobs = $query->latest()->get();

        // Pilih job pertama secara otomatis jika tersedia
        if ($this->jobs->isNotEmpty()) {
            $this->selectedJob = $this->jobs->first();
        }
    }



    public function selectJob($jobId)
    {
        $this->selectedJob = Job::find($jobId);
    }

    public function render()
    {
        return view('livewire.job-board');
    }
}
