@extends('layout.main')

@section('container')
<main>
    <section class="contact-us-banner p-5">
        <h3 class="text-center my-5 text-dark">How can we help you?</h3>
    </section>

    <div class="container my-5" style="max-width: 600px; font-weight:bold;">
        <h2 class="fw-bold mb-2">Contact Us</h2>
        <p class="text-muted mb-4">Fill in the fields below and we will be able to better respond to your request</p>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('contact.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="firstName" class="form-label">Name*</label>
                    <input type="text" class="form-control" id="firstName" name="first_name" placeholder="Philip">
                </div>
                <div class="col-md-6">
                    <label for="lastName" class="form-label">Last Name*</label>
                    <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Maya">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="email" class="form-label">Email*</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="example@mail.com">
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">Phone Number*</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="+351 567 987 932">
                </div>
            </div>

            <div class="mb-3">
                <label for="file" class="form-label">Upload File</label>
                <input class="form-control" type="file" id="file" name="upload_file">
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">What Is The Topic Of Your Question? *</label>
                <select class="form-select" id="category" name="topic">
                    <option selected disabled>Select Category</option>
                    <option value="General">General Inquiry</option>
                    <option value="Technical Support">Technical Support</option>
                    <option value="Billing">Billing</option>
                    <option value="Others">Other</option>
                </select>
            </div>


            <div class="mb-3">
                <label for="subject" class="form-label">Subject *</label>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Write The Subject Of Your Request Here">
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Write Your Message</label>
                <textarea class="form-control" id="message" name="message" rows="5" placeholder="Write a letter"></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-dark px-5 rounded-pill">Submit</button>
            </div>
        </form>
    </div>
</main>
@include('components.footer')
@endsection