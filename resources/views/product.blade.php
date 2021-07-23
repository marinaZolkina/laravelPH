@extends('master')

@section('meta')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="products">
    <meta name="author" content="Eric Hu">
@endsection

@section('title')
    <title>Products</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1 class="my-4">Products:</h1>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">SKU</th>
                    <th scope="col">type</th>
                    <th scope="col">format</th>
                    <th scope="col">image</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>{{$product->title}}</td>
                        <td>{{$product->SKU}}</td>
                        <td>{{$product->type}}</td>
                        <td>{{$product->format}}</td>
                        <td class="text">{{$product->image}}</td>
                        <td><a href="/product/show/{{$product->id}}" class="btn btn-primary">Show →</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
