@extends('layout.frontend')
@section('content')
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ asset('img/' . $product->image) }}"
                    alt="..." /></div>
            <div class="col-md-6">
                <div class="small mb-1">SKU: BST-{{ $product->id }}</div>
                <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
                <div class="fs-5 mb-5">
                    <span class="text-decoration-line-through">$45.00</span>
                    <span>${{ $product->price }}</span>
                </div>
                <p class="lead">{{ $product->description }}</p>
                <form class="d-flex">
                    <a href="{{ route('cart') }}" class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Cart
                        <span class="badge bg-dark text-white ms-1 rounded-pill">
                            {{ count((array) session('cart')) }}
                        </span>
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
