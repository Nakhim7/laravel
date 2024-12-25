@extends('layout.backend')
@section('content')
    <a class="btn btn-primary" href="{{ url('/product/create') }}">New</a>
    <br><br>
    @if (Session::has('product_delete'))
        <div class="alert alert-primary alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Primary!</strong> {!! session('product_delete') !!}
        </div>
    @endif
    @if (count($products) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                All Products
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Price</th>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>
                                    <a href="{{ url('/product/' . $product->id) }}">{{ $product->name }}</a>

                                </td>
                                <td>
                                    <div>{!! $product->description !!}</div>
                                </td>
                                <td>
                                    <div><img src="{{ asset('img/' . $product->image) }}" alt="{{ $product->name }}"
                                            style="width: 90px;"></div>

                                </td>
                                <td>
                                    <div>{!! $product->price !!}</div>
                                </td>

                                <td><a class="btn btn-primary" href="{!! url('product/' . $product->id . '/edit') !!}">Edit</a></td>

                                <td>
                                    <button class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#userDelete_{{ $product->id }}">
                                        Delete
                                    </button>
                                </td>

                            </tr>
                            <!-- Delete Modal -->
                            <div class="modal fade" id="userDelete_{{ $product->id }}" tabindex="-1"
                                arialabelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete {{ $product->name }} ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            {{ Html::form('DELETE', 'product/' . $product->id)->open() }}
                                            <button class="btn btn-danger delete">Delete</button>
                                            {{ Html::form()->close() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <script></script>
    @endif
@endsection
