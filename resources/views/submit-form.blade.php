@extends('layout.main')

@section('container')
<main class="container my-5" style="max-width: 700px;">
    <form action="{{ route('application.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="job_id" value="{{ $job->id }}">
        <div class="row g-3">
            <div class="col-md-6">
                <label for="firstName" class="form-label">Name*</label>
                <input type="text" name="name" class="form-control" id="firstName" placeholder="Philip" required>
            </div>
            <div class="col-md-6">
                <label for="lastName" class="form-label">Last Name*</label>
                <input type="text" name="last_name" class="form-control" id="lastName" placeholder="Maya" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email*</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Philip.Maya@gmail.com" required>
            </div>
            <div class="col-md-6">
                <label for="phone" class="form-label">Phone Number*</label>
                <div class="input-group">
                    <select class="form-select" style="max-width: 80px;" name="country_code">
                        <option selected>🇵🇹</option>
                    </select>
                    <input type="tel" name="phone_number" class="form-control" id="phone" placeholder="345 016 2468" required>
                </div>
            </div>

            <div class="col-12">
                <label class="form-label">Upload CV*</label>
                <input type="file" name="cv" class="form-control" required>
            </div>

            <div class="col-12">
                <label class="form-label">Additional File*</label>
                <input type="file" name="additional_file" class="form-control">
            </div>

            <div class="col-12">
                <label for="coverLetter" class="form-label">Cover Letter</label>
                <textarea class="form-control" name="cover_letter" id="coverLetter" rows="5" placeholder="Write a letter..."></textarea>
            </div>

            <div class="col-12">
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="agreePolicy" required>
                    <label class="form-check-label small" for="agreePolicy">
                        By submitting this application, I agree that I have read the Privacy Policy...
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="allow_contact" id="allowContact">
                    <label class="form-check-label small" for="allowContact">
                        Yes, Jobior can contact me directly about specific future job opportunities.
                    </label>
                </div>
            </div>

            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-dark px-4 py-2 rounded-pill fw-medium">
                    Submit application
                </button>
            </div>
        </div>
    </form>
</main>
@endsection