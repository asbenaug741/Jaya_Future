@extends('layout.dashboard')

@section('container')
    <div class="container my-5" style="max-width: 700px;">
        <h2 class="my-5">Add Internship Information</h2>
        <form action="{{ route('admin.internship.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="form-label">Internship Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Write Internship Title"
                    value="{{ old('title') }}">
                <span class="text-danger">
                    @error('title')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="mb-4">
                <input type="hidden" class="form-control" name="job_kind" value="Internship">
            </div>

            <div class="mb-4">
                <label for="company_name" class="form-label">Company Name</label>
                <input type="text" class="form-control" id="company_name" name="company_name"
                    placeholder="Write Company Name" value="{{ old('company_name') }}">
                <span class="text-danger">
                    @error('company_name')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="mb-4">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" id="location" name="location"
                    placeholder="Write Internship Location" value="{{ old('location') }}">
                <span class="text-danger">
                    @error('location')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="mb-4">
                <select name="category" id="category" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                    <option value="">Choose category</option>
                    @forelse($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @empty
                    @endforelse
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label">Internship Type</label>
                <div class="d-flex flex-wrap gap-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="job_type" id="on_site" value="On Site">
                        <label class="form-check-label" for="on_site">On Site</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="job_type" id="hybrid" value="Hybrid">
                        <label class="form-check-label" for="hybrid">Hybrid</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="job_type" id="remote" value="Remote">
                        <label class="form-check-label" for="remote">Remote</label>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label for="description" class="form-label">Internship Description</label>
                <textarea class="form-control" id="description" name="description" rows="10" style="min-height: 200px;"
                    placeholder="Internship Description">{{ old('description') }}</textarea>
                <span class="text-danger">
                    @error('description')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="mb-4">
                <label for="requirement" class="form-label">Requirement</label>
                <textarea class="form-control" id="requirement" name="requirement" rows="10" style="min-height: 200px;"
                    placeholder="Write Internship Requirement">{{ old('requirement') }}</textarea>
                <span class="text-danger">
                    @error('requirement')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="mb-4">
                <label for="benefit" class="form-label">Benefits</label>
                <textarea class="form-control" id="benefit" name="benefit" rows="10" style="min-height: 200px;"
                    placeholder="Write Internship Benefits">{{ old('benefit') }}</textarea>
                <span class="text-danger">
                    @error('benefit')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="mb-4">
                <label for="company_logo" class="form-label">Company Logo</label>
                <input type="file" class="form-control" id="company_logo" name="company_logo">
                <span class="text-danger">
                    @error('company_logo')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="mb-4">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" aria-label="Default select example" name="status">
                    <option value="Open" selected>Open</option>
                    <option value="Closed">Closed</option>
                    <option value="Paused">Paused</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
