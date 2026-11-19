@extends('layouts.app')

@section('title', 'Create Customer')

@section('content')
    <div class="card">
        <div class="header-row">
            <h1>Create Customer</h1>
            <a href="{{ route('customer-list') }}" class="btn btn-secondary">Back</a>
        </div>

        <form action="{{ route('store-customer') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control"
                    minlength="2"
                    maxlength="100"
                    value="{{ old('name') }}"
                    required
                >
                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input
                    type="text"
                    id="phone_number"
                    name="phone_number"
                    class="form-control"
                    minlength="12"
                    maxlength="20"
                    value="{{ old('phone_number') }}"
                    required
                >
                @error('phone_number')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="actions">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('customer-list') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
