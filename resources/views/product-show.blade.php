@extends('master')

@section('meta')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="product">
    <meta name="author" content="Eric Hu">
@endsection

@section('title')
    <title>Product</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <h1 class="mt-4">SKU: {{$product->SKU}}</h1>
            <p>title: {{$product->title}}</p>
            <hr>
            <p>type: {{$product->type}}</p>
            <hr>
            <p>format: {{$product->format}}</p>
            <hr>
            <p>image: </p>
            <p class="text-full"> {!! $product->image !!}</p>
            <hr>
        </div>
    </div>
@endsection
