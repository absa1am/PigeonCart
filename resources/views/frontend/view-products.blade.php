@extends('layouts.home')

@section('title', 'Latest Products')

@section('content')
    <!-- Latest Products -->
    <div class="small-container">
        <h2 class="title">Latest Products</h2>
        <div class="row">
            @foreach($products as $product)
                <div class="col-4">
                    <img src="\{{ $product->image }}" alt="" width="240px" height="240">
                    <h4><a href="{{ route('show.product', ['id' => $product->id]) }}">Name: {{ $product->name }}</a></h4>
                    <p>Price: {{ $product->price }} BDT</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
