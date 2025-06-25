@extends('layout.dashboard')

@section('container')
<div class="container py-5">

    <!-- Title -->
    <h2 class="fw-bold mb-4 text-start">Trainings</h2>

    <!-- Search and Filter -->
    <form action="{{ route('admin.training.index') }}" method="GET" class="w-100 mb-4">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">

            {{-- Search + Buttons --}}
            <div class="d-flex align-items-center gap-2" style="max-width: 600px;">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" name="search" class="form-control border-start-0" placeholder="Search by title, location..." value="{{ request('search') }}">
                </div>
                <button class="btn btn-outline-secondary rounded-pill px-3" type="submit">Search</button>
                <a href="{{ route('admin.training.index') }}" class="btn btn-outline-secondary rounded-pill px-3">Reset</a>
            </div>

            {{-- Add Training --}}
            <a href="{{ route('admin.training.create') }}" class="text-dark btn btn-outline-secondary rounded-pill px-3">
                + Add Training
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
                @forelse ($trainings as $train)
                <td><i class="bi bi-star-fill text-primary me-1"></i> {{ $train->title }}</td>
                <td>{{ $train->job_type }}</td>
                <td>{{ $train->location }}</td>
                <td>17 <button class="btn btn-outline-dark btn-sm rounded-pill ms-2">View</button></td>
                <td>901</td>
                <td>{{ \Carbon\Carbon::parse($train->date_posted)->translatedFormat('d F Y') }}</td>
                @if ($train->status == 'Open')
                <td><span class="badge bg-success">{{ $train->status }}</span></td>
                @elseif($train->status == 'Paused')
                <td><span class="badge bg-warning">{{ $train->status }}</span></td>
                @else
                <td><span class="badge bg-secondary">{{ $train->status }}</span></td>
                @endif

                <td class="dropdown"><i class="bi bi-three-dots-vertical" data-bs-toggle="dropdown"></i>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.training.edit', $train->id) }}">Edit</a>
                        </li>
                        <li>
                            <form action="{{ route('admin.training.destroy', $train->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type='submit' class="dropdown-item"
                                    onclick="return confirm('Are You Sure?')">Delete</button>
                            </form>
                        </li>
                    </ul>
                </td>
                </tr>
                @empty
                <p>No data</p>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $trainings->links() }}
    </div>
</div>
@endsection