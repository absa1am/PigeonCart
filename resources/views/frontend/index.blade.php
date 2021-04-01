@extends('layouts.home')

@section('Welcome to Demo')

@section('heros')
    <div class="row">
        <div class="col-2">
            <h1>New Dress</h1>
            <p>Here is the new dresses.</p>
            <a class="btn" href="#">Explore</a>
        </div>

        <div class="col-2">
            <img src="vendor/img/product1.png" alt="">
        </div>
    </div>
@endsection

@section('content')
    <!-- Featured Products -->
    <div class="small-container">
        <h2 class="title">Latest Products</h2>
        <div class="row">
            @foreach($products as $product)
                <div class="col-4">
                    <img src="{{ asset($product->image) }}" alt="" width="240px" height="240">
                    <h4><a href="{{ route('show.product', ['id', $product->id]) }}">{{ $product->name }}</a></h4>
                    <p>{{ $product->price }} BDT</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
