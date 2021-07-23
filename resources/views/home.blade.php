@extends('master')

@section('meta')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="laravel">
    <meta name="author" content="Eric Hu">
@endsection

@section('title')
    <title>Laravel</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1 class="my-4">Laravel Parser
                <small>Home Page</small>
            </h1>
            <a href="/" class="btn btn-primary">Add More</a>

            @if($errors)
                <p>Error:</p>
                <p>{{$errors}}</p>

            @else
                @include('object')
            @endif
        </div>
    </div>
@endsection
