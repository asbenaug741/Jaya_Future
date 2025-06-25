@extends('layout.main')

@section('container')
<div class="container py-5" style="max-width: 600px;">
    <div class="text-center mb-4">
        <img src="{{ asset('img/logo.jpg') }}" alt="Paper Plane" style="width: 150px;">
    </div>

    <h2 class="text-center fw-bold">Your Application Has Been</h2>
    <h3 class="text-center fw-bold text-success mb-4">Submitted!</h3>

    <div class="mb-3 d-flex align-items-start">
        <span class="me-2 text-success">✔</span>
        <p class="mb-1 text-justify" style="text-align: justify;">
            You will get an email confirmation at <strong>Philip.Maya@gamil.com</strong>
        </p>
    </div>

    <div class="mb-4 d-flex align-items-start">
        <span class="me-2 text-success">✔</span>
        <p class="mb-1 text-justify" style="text-align: justify;">
            This employer typically responds to applications within 1 day
        </p>
    </div>

    <div class="mb-4">
        <h5 class="fw-bold">Keep track of your applications</h5>
        <p class="text-justify" style="text-align: justify;">
            You will receive a status update in an email from Jobior within a few weeks of submitting your application.
            In the meantime, you can view and track all your applications in the Jobior My Jobs section at any time.
        </p>
        <a href="#" class="text-decoration-underline text-primary">Check your applications on Recent Activities</a>
    </div>

    <div class="text-center mt-5">
        <a href="{{ route('jobs') }}" class="btn btn-dark px-4 py-2 rounded-pill">
            Return to job search
        </a>
    </div>
</div>
@endsection