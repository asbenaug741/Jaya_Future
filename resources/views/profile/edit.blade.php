@extends('layout.main')

@section('container')
<div class="container py-5" style="max-width: 700px;">
    <h2 class="fw-bold mb-4">Edit Profile</h2>

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Job Title</label>
            <input type="text" name="job_title" value="{{ old('job_title', $user->job_title) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Location</label>
            <input type="text" name="location" value="{{ old('location', $user->location) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Employment Status</label>
            <input type="text" name="employment_status" value="{{ old('employment_status', $user->employment_status) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Profile Picture</label>
            <input type="file" name="profile_picture" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Resume (PDF/DOC)</label>
            <input type="file" name="resume" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="{{ route('profile') }}" class="btn btn-secondary ms-2">Cancel</a>
    </form>
</div>
@endsection