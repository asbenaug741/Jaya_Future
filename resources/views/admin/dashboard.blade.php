@extends('layout.dashboard')
@section('container')
<div class="container">
    <h1>Admin Dashboard</h1>
    <p>Welcome to the admin dashboard!</p>
    <p>Here you can manage users, view reports, and perform administrative tasks.</p>
</div>

<section class="container my-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <!-- Dashboard -->
        <div class="col">
            <a href="{{ route('admin.dashboard') }}" class="text-decoration-none text-dark">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fs-4 fw-semibold">Dashboard</h5>
                        <p class="card-text fs-6 text-muted">Pantau ringkasan statistik dan aktivitas terbaru dalam sistem admin.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Internship -->
        <div class="col">
            <a href="{{ route('admin.internship.index') }}" class="text-decoration-none text-dark">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fs-4 fw-semibold">Internship</h5>
                        <p class="card-text fs-6 text-muted">Kelola lowongan magang yang tersedia untuk mahasiswa atau fresh graduate.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Job -->
        <div class="col">
            <a href="{{ route('admin.job.index') }}" class="text-decoration-none text-dark">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fs-4 fw-semibold">Job</h5>
                        <p class="card-text fs-6 text-muted">Atur dan publikasi lowongan kerja reguler dari perusahaan mitra.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Training -->
        <div class="col">
            <a href="{{ route('admin.training.index') }}" class="text-decoration-none text-dark">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fs-4 fw-semibold">Training</h5>
                        <p class="card-text fs-6 text-muted">Manajemen program pelatihan untuk meningkatkan kompetensi pencari kerja.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Applicant -->
        <div class="col">
            <a href="{{ route('admin.training.index') }}" class="text-decoration-none text-dark">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fs-4 fw-semibold">Applicant</h5>
                        <p class="card-text fs-6 text-muted">Lihat dan proses daftar pelamar yang masuk dari berbagai lowongan.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Messages -->
        <div class="col">
            <a href="{{ route('admin.messages.index') }}" class="text-decoration-none text-dark">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fs-4 fw-semibold">Messages</h5>
                        <p class="card-text fs-6 text-muted">Kelola pesan atau pertanyaan dari pengguna terkait fitur atau lowongan.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>


@endsection