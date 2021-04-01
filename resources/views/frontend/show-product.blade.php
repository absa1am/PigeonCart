@extends('layouts.home')

@section('Product Details')

@section('content')
    <!-- Featured Products -->
    <div class="small-container">
        <h2 class="title">Product Details</h2>
        <div class="row">
            <div class="col-4">
                <img src="{{ asset($product->image) }}" alt="" width="400px" height="350">
                <h4>Name: {{ $product->name }}</h4>
                <p>Price: {{ $product->price }} BDT</p>
                <p>Description: {{ $product->description }}</p>
            </div>
        </div>
    </div>
@endsection
