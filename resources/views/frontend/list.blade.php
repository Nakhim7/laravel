@extends('layout.frontend')
@section('content')
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($products as $product)
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <a href="{{ url('/show/' . $product->id) }}">
                            <img class="card-img-top mx-auto d-block" src="{{ asset('img/' . $product->image) }}"
                                alt="{{ $product->name }}" style="width: 200px; height: 200px; object-fit: cover;" />
                        </a>
                        @if (session('success'))
                            <div class="alert alert-primary alert-dismissible fade show mt-2">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <strong>Success!</strong> {{ session('success') }}
                            </div>
                        @endif

                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{ $product->name }}</h5>
                                <!-- Product price-->
                                ${{ $product->price }}
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="d-flex justify-content-around">
                                <a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-warning btn-block"
                                    role="button">Add to cart</a>
                                <a class="btn btn-outline-dark mt-auto" href="{{ url('/show/' . $product->id) }}">View
                                    options</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="pagination">
        <!-- Pagination -->
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
    </div>
@endsection
