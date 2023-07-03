<!-- productDetails.blade.php -->

@extends('productAjax')

@section('content')
    <div class="container">
        <h1>Product Details</h1>

        <div>
            <h3>Name: {{ $product->name }}</h3>
            <p>Email: {{ $product->email }}</p>
            <p>phone_number: {{ $product->phone_number }}</p>
            <p>Country: {{ $product->country }}</p>

        </div>
    </div>
@endsection
