@extends('layout.main')

@section('container')
<main>
    <hr class="my-5">
    <div class="container-fluid ">
        <div class="row mx-5">
            <!-- Kiri: List Company -->
            <div class="col-md-4" style="max-height: 120vh; overflow-y: auto;">
                <!-- Card Company - ulangi untuk setiap company -->
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <div class="text-center"><img src="{{ asset('img/logo.jpg') }}" alt="Logo" width="100" class="rounded-circle mb-2"></div>
                        <h6 class="mb-1 fw-semibold">wiwok detok Company</h6>
                        <small class="text-muted d-block">Software Development</small>
                        <small class="text-muted d-block">Germany • 10k+ Employees</small>
                        <div class="mt-2 d-flex gap-2">
                            <span class="badge bg-primary">32 Jobs</span>
                            <span class="badge bg-success">High Benefit</span>
                        </div>
                    </div>
                </div>

                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <div class="text-center"><img src="{{ asset('img/logo.jpg') }}" alt="Logo" width="100" class="rounded-circle mb-2"></div>
                        <h6 class="mb-1 fw-semibold">wiwok detok Company</h6>
                        <small class="text-muted d-block">Software Development</small>
                        <small class="text-muted d-block">Germany • 10k+ Employees</small>
                        <div class="mt-2 d-flex gap-2">
                            <span class="badge bg-primary">32 Jobs</span>
                            <span class="badge bg-success">High Benefit</span>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <div class="text-center"><img src="{{ asset('img/logo.jpg') }}" alt="Logo" width="100" class="rounded-circle mb-2"></div>
                        <h6 class="mb-1 fw-semibold">wiwok detok Company</h6>
                        <small class="text-muted d-block">Software Development</small>
                        <small class="text-muted d-block">Germany • 10k+ Employees</small>
                        <div class="mt-2 d-flex gap-2">
                            <span class="badge bg-primary">32 Jobs</span>
                            <span class="badge bg-success">High Benefit</span>
                        </div>
                    </div>
                </div>
                <!-- End Card -->
            </div>

            <!-- Kanan: Detail Company -->
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <!-- Header -->
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('img/logo.jpg') }}" alt="Logo" width="60" class="me-3 rounded-circle">
                                <div>
                                    <h5 class="fw-bold mb-1">NAVA Company</h5>
                                    <p class="text-muted mb-0">Software Development</p>
                                    <small class="text-muted">Seattle, WA • 31M followers • 10K+ employees</small>
                                </div>
                            </div>
                            <button class="btn btn-outline-dark">Visit Website</button>
                        </div>

                        <!-- Tabs -->
                        <ul class="nav nav-tabs mt-4" id="companyTab" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about">About</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="jobs-tab" data-bs-toggle="tab" data-bs-target="#jobs">Jobs</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="people-tab" data-bs-toggle="tab" data-bs-target="#people">People</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="life-tab" data-bs-toggle="tab" data-bs-target="#life">Life</button>
                            </li>
                        </ul>

                        <div class="tab-content mt-3 p-2">
                            <!-- About -->
                            <div class="tab-pane fade show active" id="about">
                                <h4>About</h4>
                                <p class="mb-3 mt-3">
                                    NAVA is guided by four principles: customer obsession rather than competitor focus, passion for invention, commitment to operational excellence, and long-term thinking. We are driven by the excitement of building technologies, inventing products, and providing services that change lives. We embrace new ways of doing things, make decisions quickly, and are not afraid to fail...See more
                                </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Contact Info</label>
                                        <div>aboutnava.com</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Stock</label>
                                        <div>----</div>
                                    </div>
                                </div>
                                <hr>
                                <h4 class="mt-5">Jobs</h4>
                                <div class="row mt-3 mb-3">
                                    <!-- Job Card -->
                                    <div class="col-md-6 mb-3">
                                        <div class="border p-3 rounded shadow-sm">
                                            <h6 class="fw-semibold">UI/UX Designer</h6>
                                            <small class="text-muted">Bonn, Germany (On Site)</small><br>
                                            <span class="badge bg-primary">Easy Apply</span>
                                            <span class="badge bg-info">Multiple Candidate</span>
                                            <div class="text-end text-muted small">1d</div>
                                        </div>
                                    </div>
                                    <!-- More jobs ... -->
                                </div>
                                <a href="#" class="text-decoration-none text-primary fw-semibold">Show More Jobs →</a>
                            </div>

                            <!-- Jobs -->
                            <div class="tab-pane fade" id="jobs">
                                <div class="row">
                                    <!-- Job Card -->
                                    <div class="col-md-6 mb-3">
                                        <div class="border p-3 rounded shadow-sm">
                                            <h6 class="fw-semibold">UI/UX Designer</h6>
                                            <small class="text-muted">Bonn, Germany (On Site)</small><br>
                                            <span class="badge bg-primary">Easy Apply</span>
                                            <span class="badge bg-info">Multiple Candidate</span>
                                            <div class="text-end text-muted small">1d</div>
                                        </div>
                                    </div>
                                    <!-- More jobs ... -->
                                </div>
                                <a href="#" class="text-decoration-none text-primary fw-semibold">Show More Jobs →</a>
                            </div>

                            <!-- People & Life: Kosongkan dulu -->
                            <div class="tab-pane fade" id="people">Coming soon</div>
                            <div class="tab-pane fade" id="life">Coming soon</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('components.footer')
@endsection