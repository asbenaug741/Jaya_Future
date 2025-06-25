@extends('layout.dashboard')

@section('container')
<div class="container my-5">
    <h2 class="mb-4">Contact Messages</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Topic</th>
                <th>Subject</th>
                <th>Received At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $msg)
            <tr>
                <td>{{ $msg->first_name }} {{ $msg->last_name }}</td>
                <td>{{ $msg->topic }}</td>
                <td>{{ $msg->subject }}</td>
                <td>{{ $msg->created_at->format('d M Y H:i') }}</td>
                <td><a href="{{ route('admin.messages.show', $msg->id) }}" class="btn btn-sm btn-dark">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $messages->links() }} {{-- Pagination --}}
</div>
@endsection