@extends('layout.backend')
@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <h3>Name: {{ $users->name }}</h3>
            <p>Phone: {{ $users->phone }}</p>
            <p>Address: {{ $users->address }}</p>
            <a class="btn btn-secondary" href="{{ route('user.index') }}">Back</a>
        </div>
    </div>
@endsection
