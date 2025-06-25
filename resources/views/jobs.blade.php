@extends('layout.main')

@section('container')
<main>
    <form action="{{ route('jobs') }}" method="GET" class="d-flex gap-2 my-5" style="margin-left:70px; max-width: 500px;">
        <input type="text" name="keyword" value="{{ request('keyword') }}" class="form-control"
            placeholder="Search job title, location, or company">
        <input type="hidden" name="job_kind" value="{{ request('job_kind') }}">
        <button type="submit" class="btn btn-dark">
            <i class="bi bi-search"></i>
        </button>
    </form>


    @if(request('keyword'))
    <p style="margin-left:70px;">Showing results for: <strong>{{ request('keyword') }}</strong></p>
    @endif

    @livewire('job-board')
</main>
@include('components.footer')
@endsection