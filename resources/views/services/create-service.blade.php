@extends('layouts.app')

@section('title', 'Create Service')

@section('content')
    <div class="card">
        <div class="header-row">
            <h1>Create Service</h1>
            <a href="{{ route('service-list') }}" class="btn btn-secondary">Back</a>
        </div>

        <form action="{{ route('store-service') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control"
                    maxlength="100"
                    value="{{ old('name') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea
                    id="description"
                    name="description"
                    class="form-control"
                    rows="4"
                    maxlength="1000"
                    required
                >{{ old('description') }}</textarea>
            </div>

            <div class="actions">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('service-list') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
@endsection
