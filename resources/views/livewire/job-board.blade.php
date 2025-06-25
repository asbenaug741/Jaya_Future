<div class="container-fluid my-5">
    <div class="row mx-5">
        <!-- Kiri: List Jobs -->
        <div class="col-md-4" style="max-height: 120vh; overflow-y: auto;">
            @foreach ($this->jobs as $job)
            <div class="card mb-3 shadow-sm" wire:click="selectJob({{ $job->id }})" style="cursor:pointer;">
                <div class="card-body">
                    <h6 class="mb-1 fw-semibold">{{ $job->title }}</h6>
                    <small class="text-muted d-block">{{ $job->company_name }}</small>
                    <small class="text-muted d-block">{{ $job->location }} ({{ $job->job_type }})</small>
                    <div class="mt-2 d-flex gap-2">
                        <span class="badge bg-primary">{{ $job->job_kind }}</span>
                        <span class="badge bg-info">{{ $job->category }}</span>
                    </div>
                    <div class="text-end text-muted small mt-2">{{ $job->date_posted->diffForHumans() }}</div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Kanan: Detail Job -->
        <div class="col-md-8">
            @if($selectedJob)
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/' . $selectedJob->company_logo) }}" alt="Logo" width="60" class="me-3 rounded-circle">

                            <div>
                                <h5 class="fw-bold mb-1">{{ $selectedJob->title }}</h5>
                                <p class="text-muted mb-0">{{ $selectedJob->company_name }}</p>
                                <small class="text-muted">{{ $selectedJob->location }} • {{ $selectedJob->job_type }}</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <button wire:click="archiveJob({{ $selectedJob->id }})" class="btn btn-outline-secondary" title="Archive this job">
                                <i class="bi bi-bookmark"></i> {{-- Bootstrap Icon --}}
                            </button>
                            <a href="{{ route('application.form', ['job' => $selectedJob->id]) }}" class="btn btn-outline-dark">Apply Now</a>
                        </div>

                    </div>

                    <ul class="nav nav-tabs mt-4">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#desc">Description</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#req">Requirements</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#benefit">Benefits</button>
                        </li>
                    </ul>

                    <div class="tab-content mt-3 p-2">
                        <div class="tab-pane fade show active" id="desc">
                            <p>{{ $selectedJob->description }}</p>
                        </div>
                        <div class="tab-pane fade" id="req">
                            <p>{{ $selectedJob->requirement }}</p>
                        </div>
                        <div class="tab-pane fade" id="benefit">
                            <p>{{ $selectedJob->benefit }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="alert alert-info">Select a job to view details</div>
            @endif

            @if (session()->has('message'))
            <div class="alert alert-success mt-3">
                {{ session('message') }}
            </div>
            @elseif (session()->has('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
            @endif

        </div>
    </div>
</div>