@extends('layouts.master')

@section('content')
    <div class="py-5">
        <h1><u>@yield('title')</u></h1>

        @yield('form-body')

    </div>
@endsection



