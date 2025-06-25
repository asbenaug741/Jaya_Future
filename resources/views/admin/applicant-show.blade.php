@extends('layout.dashboard')

@section('container')
<div class="container py-5" style="max-width: 800px;">
    <h2 class="fw-bold mb-4 text-dark">Applicant Profile</h2>

    <div class="card shadow-sm border-0 p-4 rounded-4">
        <div class="mb-4">
            <h4 class="fw-semibold">{{ $application->name }}</h4>
            <p class="mb-1"><strong>Email:</strong> {{ $application->email }}</p>
            <p class="mb-1"><strong>Phone:</strong> {{ $application->phone_number }}</p>
            <p class="mb-1"><strong>Job Applied:</strong> {{ $application->job->title ?? '-' }}</p>
            <p class="mb-1">
                <strong>Status:</strong>
                <span class="badge 
                    {{ $application->status == 'Approved' ? 'bg-success' : 
                       ($application->status == 'Rejected' ? 'bg-danger' : 'bg-warning text-dark') }}">
                    {{ $application->status }}
                </span>
            </p>
            <p class="mb-0"><strong>Application Date:</strong> {{ \Carbon\Carbon::parse($application->application_date)->format('d M Y') }}</p>
        </div>

        <hr>

        <div class="mb-4">
            <h5 class="fw-semibold">Cover Letter</h5>
            <p class="text-muted">{{ $application->cover_letter }}</p>
        </div>

        <div class="d-flex flex-wrap gap-2">
            <a href="{{ asset('storage/' . $application->cv) }}" class="btn btn-outline-primary" target="_blank">
                📄 View CV
            </a>
            @if($application->additional_file)
            <a href="{{ asset('storage/' . $application->additional_file) }}" class="btn btn-outline-secondary" target="_blank">
                📎 Additional File
            </a>
            @endif
        </div>
    </div>

    <div class="mt-4 text-end">
        <a href="{{ url()->previous() }}" class="btn btn-secondary px-4">← Back</a>
    </div>
</div>
@endsection