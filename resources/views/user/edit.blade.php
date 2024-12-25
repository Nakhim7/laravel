@extends('layout.backend')
@section('content')
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Edit users</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="/users">View all users</a></li>
                <li class="breadcrumb-item active"><a href="/users/create">Create post</a></li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    @if (Session::has('users_update'))
                        <div class="alert alert-primary alert-dismissible">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <strong>Primary!</strong> {!! session('users_update') !!}
                        </div>
                    @endif
                    @if (count($errors) > 0)
                        <!-- Form Error List -->
                        <div class="alert alert-danger">
                            <strong>Something is Wrong</strong>
                            <br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{!! $error !!}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('user.update', $users->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $users->name) }}">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" name="phone" class="form-control"
                                value="{{ old('phone', $users->phone) }}">
                        </div>

                        <div class="form-group">
                            <label for="address">Address:</label>
                            <textarea name="address" class="form-control">{{ old('address', $users->address) }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a class="btn btn-primary" href="{{ route('user.index') }}">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
