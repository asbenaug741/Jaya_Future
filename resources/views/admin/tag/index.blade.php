@extends('layout.dashboard')

@section('container')
<div class="container py-5">

    <!-- Title -->
    <h2 class="fw-bold mb-4 text-start">Tags</h2>

    <!-- Search and Filter -->
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div class="input-group" style="max-width: 400px;">
            <span class="input-group-text bg-white border-end-0">
                <i class="bi bi-search"></i>
            </span>
            <input type="text" class="form-control border-start-0" placeholder="Search and Filter">
        </div>

        <a href="{{ route('admin.tag.create') }}" class="text-dark btn btn-outline-secondary rounded-pill px-3"> + Add Tag</a>
    </div>

    <div class="mx-auto" style="max-width: 500px;">
        <div class="table-responsive">
            <table class="table table-sm align-middle text-start w-100">
                <thead class="table-light">
                    <tr>
                        <th class="w-auto">Tag Name</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tags as $tag)
                    <tr>
                        <td><i class="bi bi-star-fill text-primary me-1"></i> {{ $tag->name }}</td>
                        <td class="text-end">
                            <div class="dropdown">
                                <i class="bi bi-three-dots-vertical" data-bs-toggle="dropdown" role="button"></i>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="{{ route('admin.tag.edit', $tag->id) }}">Edit</a></li>
                                    <li>
                                        <form action="{{ route('admin.tag.destroy', $tag->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type='submit' class="dropdown-item" onclick="return confirm('Are You Sure?')">Delete</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2">No Data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


</div>
@endsection