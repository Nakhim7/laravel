@extends('layout.backend')
@section('content')
    <a class="btn btn-primary" href="{{ url('/user/create') }}">New</a>
    <br><br>
    @if (Session::has('users_delete'))
        <div class="alert alert-primary alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Primary!</strong> {!! session('users_delete') !!}
        </div>
    @endif
    @if (count($users) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Detail</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
            <tbody>
                @foreach ($users as $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->phone }}</td>
                        <td>{{ $value->address }}</td>
                        <td><a class="btn btn-primary" href="{{ route('user.show', ['id' => $value->id]) }}">Detail</a>
                        </td>

                        <td><a class="btn btn-primary" href="{!! url('user/' . $value->id . '/edit') !!}">Edit</a></td>
                        <td>
                            <button class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#userDelete_{{ $value->id }}">
                                Delete
                            </button>
                        </td>
                    </tr>
                    <div class="modal fade" id="userDelete_{{ $value->id }}" tabindex="-1"
                        arialabelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete {{ $value->name }} ?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    {{ Html::form('DELETE', 'user/' . $value->id)->open() }}
                                    <button class="btn btn-danger delete">Delete</button>
                                    {{ Html::form()->close() }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
            </tbody>
        </table>
    @endif
@endsection
