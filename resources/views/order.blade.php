@extends('master')

@section('meta')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="orders">
    <meta name="author" content="Eric Hu">
@endsection

@section('title')
    <title>Orders</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1 class="my-4">Orders:</h1>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">id</th>
                    <th scope="col">total</th>
                    <th scope="col">shipping total</th>
                    <th scope="col">create time</th>
                    <th scope="col">timezone</th>
                    <th scope="col">action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <th scope="row">{{$order->id}}</th>
                        <td>{{$order->id_order}}</td>
                        <td>{{$order->total}}</td>
                        <td>{{$order->shipping_total}}</td>
                        <td>{{$order->create_time}}</td>
                        <td>{{$order->timezone}}</td>
                        <td><a href="/order/show/{{$order->id}}" class="btn btn-primary">Show →</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
