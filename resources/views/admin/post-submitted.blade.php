@extends('layout.main')

@section('container')
<div class="container py-5" style="max-width: 600px;">
    <div class="text-center mb-4">
        <img src="{{ asset('img/logo.jpg') }}" alt="Paper Plane" style="width: 150px;">
    </div>

    <h2 class="text-center fw-bold">Your Job Has Been</h2>
    <h3 class="text-center fw-bold text-success mb-4">Successfully Posted!</h3>

    <div class="mb-3 d-flex align-items-start">
        <span class="me-2 text-success">✔</span>
        <p class="mb-1 text-justify" style="text-align: justify;">
            You will get an email confirmation at <strong>Philip.Maya@gmail.com</strong>
        </p>
    </div>

    <div class="mb-4 d-flex align-items-start">
        <span class="me-2 text-success">✔</span>
        <p class="mb-1 text-justify" style="text-align: justify;">
            Your job post is now live and visible to potential candidates.
        </p>
    </div>

    <div class="mb-4">
        <h5 class="fw-bold">Manage your job posts</h5>
        <p class="text-justify" style="text-align: justify;">
            You can view, edit, or track applications for this job at any time in the My Jobs section of your dashboard.
        </p>
        <a href="{{ route('admin.dashboard') }}" class="text-decoration-underline text-primary">
            Go to My Jobs
        </a>
    </div>

    <div class="text-center mt-5">
        <a href="{{ route('admin.post1') }}" class="btn btn-dark px-4 py-2 rounded-pill">
            Post another job
        </a>
    </div>
</div>
@endsection