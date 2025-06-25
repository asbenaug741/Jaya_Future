@extends('layout.main')

@section('container')
<main class="container my-5">
    <div class="card shadow-sm p-5">
        <div class="d-flex align-items-center mb-5">
            <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('img/logo.jpg') }}" class="rounded-circle me-3" width="70" height="70" alt="Profile Photo">
            <div class="flex-grow-1">

                <h4 class="fw-bold mb-0">{{ $user->name }}</h4>
                <p class="text-muted mb-0">{{ $user->job_title ?? 'Job title not set' }}</p>
                <p class="text-muted">{{ $user->location ?? 'Location not set' }}</p>
            </div>
            <div class="text-end">
                <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-outline-primary">Edit Profile</a>
            </div>
        </div>

        <ul class="nav nav-tabs mb-4" id="profileTab" role="tablist">
            <li class="nav-item">
                <button class="nav-link active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab">About</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" id="resume-tab" data-bs-toggle="tab" data-bs-target="#resume" type="button" role="tab">Resume</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" id="activities-tab" data-bs-toggle="tab" data-bs-target="#activities" type="button" role="tab">My Activities</button>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                <h5 class="fw-semibold mb-2">About</h5>
                <p class="text-muted">Updating your information will offer you the most relevant content</p>
                <div class="row text-sm mb-4">
                    <div class="col-md-3 mb-3">
                        <strong class="d-block text-muted">Employment Status</strong>
                        <span>{{ $user->employment_status ?? 'Not set' }}</span>
                    </div>
                    <div class="col-md-3 mb-3">
                        <strong class="d-block text-muted">Full Name</strong>
                        <span>{{ $user->name }}</span>
                    </div>
                    <div class="col-md-3 mb-3">
                        <strong class="d-block text-muted">Job Title</strong>
                        <span>{{ $user->job_title ?? 'Not set' }}</span>
                    </div>
                    <div class="col-md-3 mb-3">
                        <strong class="d-block text-muted">Location</strong>
                        <span>{{ $user->location ?? 'Not set' }}</span>
                    </div>
                </div>
                <a href="#" class="text-decoration-none text-primary fw-semibold mb-5 d-block">Show All Info →</a>
                <hr class="my-4">

                <h5 class="fw-semibold mb-3">Resume</h5>
                @if($user->resume)
                <div class="border rounded py-4 px-3 mb-2 d-flex justify-content-between align-items-center">
                    <div>
                        <i class="bi bi-file-earmark-text-fill me-2"></i>
                        <a href="{{ asset('storage/' . $user->resume) }}" download class="text-decoration-none fw-semibold">
                            {{ basename($user->resume) }}
                        </a>
                        <small class="text-muted d-block">Click to download resume</small>
                    </div>
                    <a href="{{ asset('storage/' . $user->resume) }}" download class="btn btn-sm btn-outline-primary">
                        <i class="bi bi-download"></i> Download
                    </a>
                </div>

                @else
                <p class="text-muted">No resume uploaded</p>
                @endif
                <a href="#" class="text-decoration-none d-inline-block mt-2 text-success"><i class="bi bi-plus-circle me-1"></i> Add more</a>

                <hr class="my-4">

                <h5 class="fw-semibold mb-3">My Activities</h5>
                <div class="row">
                    @forelse ($user->archivedJobs as $job)
                    <div class="col-md-6 mb-3">
                        <div class="border rounded p-4">
                            <div class="d-flex align-items-center mb-1">
                                <img src="{{ asset('img/logo.jpg') }}" alt="Company Logo" width="20" height="20" class="me-2">
                                <small class="text-muted">{{ $job->company_name ?? 'Company' }}</small>
                            </div>
                            <h6 class="fw-semibold">{{ $job->title }}</h6>
                            <small class="text-muted">{{ $job->location }}</small>
                            <div class="mt-2">
                                <span class="badge bg-light text-success border border-success">Archived</span>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="text-muted">No activities yet</p>
                    @endforelse
                </div>
                <a href="#" class="text-decoration-none text-primary fw-semibold">Show All Info →</a>
            </div>

            <div class="tab-pane fade" id="resume" role="tabpanel" aria-labelledby="resume-tab">
                <h5 class="fw-semibold mb-3">Resume</h5>
                @if($user->resume)
                <div class="border rounded p-4 mb-3 d-flex justify-content-between align-items-center">
                    <div>
                        <i class="bi bi-file-earmark-text me-2"></i> {{ $user->resume }}<br>
                        <small class="text-muted">Uploaded Resume</small>
                    </div>
                    <i class="bi bi-three-dots"></i>
                </div>
                @else
                <p class="text-muted">No resume uploaded</p>
                @endif
                <a href="#" class="text-success"><i class="bi bi-plus-circle me-1"></i> Add more</a>
            </div>

            <div class="tab-pane fade" id="activities" role="tabpanel" aria-labelledby="activities-tab">
                <h5 class="fw-semibold mb-3">My Activities</h5>
                <div class="row g-3">
                    @forelse ($user->archivedJobs as $job)
                    <div class="col-md-6">
                        <div class="border p-4 rounded">
                            <div class="d-flex align-items-center mb-1">
                                <img src="{{ asset('img/logo.jpg') }}" alt="Company Logo" width="20" height="20" class="me-2">
                                <small class="text-muted">{{ $job->company_name ?? 'Company' }}</small>
                            </div>
                            <div class="fw-semibold">{{ $job->title }}</div>
                            <small class="text-muted">{{ $job->location }}</small>
                            <div class="badge bg-success mt-2">Archived</div>
                        </div>
                    </div>
                    @empty
                    <p class="text-muted">No activities yet</p>
                    @endforelse
                </div>
                <div class="mt-3">
                    <a href="#" class="text-primary fw-semibold">Show All Info</a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection