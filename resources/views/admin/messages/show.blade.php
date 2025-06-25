@extends('layout.dashboard')

@section('container')
<div class="container my-5">
    <h2 class="mb-4">Message Detail</h2>
    <div class="card p-4">
        <h5><strong>Name:</strong> {{ $message->first_name }} {{ $message->last_name }}</h5>
        <p><strong>Email:</strong> {{ $message->email }}</p>
        @if($message->phone_number)
        <p><strong>Phone:</strong> {{ $message->phone_number }}</p>
        @endif
        <p><strong>Topic:</strong> {{ $message->topic }}</p>
        <p><strong>Subject:</strong> {{ $message->subject }}</p>
        <hr>
        <p><strong>Message:</strong></p>
        <p>{{ $message->message }}</p>

        @if($message->upload_file)
        <a href="{{ asset('storage/' . $message->upload_file) }}" class="btn btn-outline-primary mt-3" target="_blank">Download Attachment</a>
        @endif
    </div>
</div>
@endsection