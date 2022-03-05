@extends('layouts.master')

@section('title', 'Amazing E-Book')

@section('content')
    @include('partials.greeting', ['message' => $message])
@endsection
