@extends('layouts.master')

@section('title', __('nav.saved'))

@section('content')
    @include('partials.greeting', ['message' =>  __('nav.saved'), 'redirectLink'=>'/home']);

@endsection

