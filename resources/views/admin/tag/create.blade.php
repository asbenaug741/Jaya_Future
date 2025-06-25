@extends('layout.dashboard')

@section('container')
<div class="container my-5" style="max-width: 700px;">
    <h2 class="my-5">Add Tag</h2>
    <form action="{{ route('admin.tag.store') }}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="mb-4">
            <label for="name" class="form-label">Tag name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Write Tag name">
            <span class="text-danger">
                @error('name')
                {{ $message }}
                @enderror
            </span>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@endsection