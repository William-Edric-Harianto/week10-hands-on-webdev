@extends('layouts.app')

@section('title', 'Customers')

@section('content')
    <div class="card">
        <div class="header-row">
            <h1>Customers</h1>
            <a href="{{ route('create-customer') }}" class="btn btn-primary">+ Create Customer</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customers as $customer)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->phone_number ?? '-' }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('edit-customer', $customer) }}" class="btn btn-secondary">Update</a>
                                <form action="{{ route('delete-customer', $customer) }}" method="POST" onsubmit="return confirm('Delete this customer?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="empty-state">No customers found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
