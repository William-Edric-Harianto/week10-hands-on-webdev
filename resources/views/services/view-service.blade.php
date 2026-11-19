@extends('layouts.app')

@section('title', 'Services')

@section('content')
    <div class="card">
        <div class="header-row">
            <h1>Services</h1>
            <a href="{{ route('create-service') }}" class="btn btn-primary">+ Create Service</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($services as $service)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->description }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('edit-service', $service) }}" class="btn btn-secondary">Update</a>
                                <form action="{{ route('delete-service', $service) }}" method="POST" onsubmit="return confirm('Delete this service?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="empty-state">No services found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
