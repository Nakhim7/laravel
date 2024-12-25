@extends('layout.backend')
@section('content')
    <p>Name: {{ $product->name }}</p>
    <p>Category: {{ $product->category->name }}</p>
    <p>Price: {{ $product->price }}</p>
    <p>Description: {{ $product->description }}</p>
    <div>{!! Html::img('/img/' . $product->image, $product->name, ['width' => '300']) !!}</div>
    <a class="btn btn-secondary" href="{{ url('/product') }}">Back</a>
@endsection
