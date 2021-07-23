@extends('master')

@section('meta')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="order">
    <meta name="author" content="Eric Hu">
@endsection

@section('title')
    <title>Order</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <h1 class="mt-4">id : {{$order->id_order}}</h1>
            <p>total : {{$order->total}}</p>
            <hr>
            <p>shipping total : {{$order->shipping_total}}</p>
            <hr>
            <p>create time : {{$order->create_time}}</p>
            <hr>
            <p>timezone : {{$order->timezone}}</p>
            <hr>
            <p>created at (save on db) : {{$order->created_at->format('M d, Y')}}</p>
            <hr>
        </div>
    </div>
@endsection
