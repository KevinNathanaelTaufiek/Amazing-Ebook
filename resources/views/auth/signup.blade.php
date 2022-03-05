@extends('layouts.formpage')

@section('title', __('auth.signup'))

@section('form-body')

    @include('partials.error-alert-message')

    <form action="/signup" method="POST" enctype="multipart/form-data">
        @csrf
        @include('partials.account-form')

        <div class="d-flex justify-content-center mt-5">
            <button type="submit" class="btn btn-warning fw-bold px-5">{{ __('auth.signup') }}</button>
        </div>

    </form>

    <div class="text-center my-5">
        <a href="/login">{{ __('auth.haveAccount') }}</a>
    </div>

@endsection

