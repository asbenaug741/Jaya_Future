@extends('layout.dashboard')

@section('container')
<div class="container py-5">

    <!-- Title -->
    <h2 class="fw-bold mb-4 text-start">Jobs</h2>

    <!-- Search and Filter -->
    <form action="{{ route('admin.job.index') }}" method="GET" class="w-100 mb-4">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">

            {{-- Search + Buttons --}}
            <div class="d-flex align-items-center gap-2" style="max-width: 600px;">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" name="keyword" class="form-control border-start-0" placeholder="Search by title, location..." value="{{ request('search') }}">
                </div>
                <button class="btn btn-outline-secondary rounded-pill px-3" type="submit">Search</button>
                <a href="{{ route('admin.job.index') }}" class="btn btn-outline-secondary rounded-pill px-3">Reset</a>
            </div>

            {{-- Add job --}}
            <a href="{{ route('admin.job.create') }}" class="text-dark btn btn-outline-secondary rounded-pill px-3">
                + Add job
            </a>

        </div>
    </form>

    <!-- Table -->
    <div class="table-responsive">
        <table class="table align-middle text-start">
            <thead class="table-light">
                <tr>
                    <th>Job Title</th>
                    <th>Type</th>
                    <th>Location</th>
                    <th>Applicants</th>
                    <th>Views</th>
                    <th>Date Posted</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jobs as $job)
                <tr>
                    <td><i class="bi bi-star-fill text-primary me-1"></i> {{ $job->title }}</td>
                    <td>{{ $job->job_type }}</td>
                    <td>{{ $job->location }}</td>
                    <td>17 <button class="btn btn-outline-dark btn-sm rounded-pill ms-2">View</button></td>
                    <td>901</td>
                    <td>{{ \Carbon\Carbon::parse($job->date_posted)->translatedFormat('d F Y') }}</td>
                    @if ($job->status == 'Open')
                    <td><span class="badge bg-success">{{ $job->status }}</span></td>
                    @elseif($job->status == 'Paused')
                    <td><span class="badge bg-warning">{{ $job->status }}</span></td>
                    @else
                    <td><span class="badge bg-secondary">{{ $job->status }}</span></td>
                    @endif

                    <td class="dropdown"><i class="bi bi-three-dots-vertical" data-bs-toggle="dropdown"></i>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('admin.job.edit', $job->id) }}">Edit</a></li>
                            <li>
                                <form action="{{ route('admin.job.destroy', $job->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type='submit' class="dropdown-item" onclick="return confirm('Are You Sure?')">Delete</button>
                                </form>
                            </li>
                        </ul>
                    </td>
                </tr>
                @empty
                <p>No Data</p>
                @endforelse

            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $jobs->links() }}
    </div>
</div>
@endsection