
@extends('layouts.formpage')

@section('title', __('nav.profile'))

@section('form-body')

    @include('partials.error-alert-message')

    <div class="row">
        <div class="col-3">
            <img src="{{ Storage::url(old('display_picture_link')) }}" alt="profile-picture" width="80%">

        </div>
        <div class="col-9">
            <form action="/profile/update/{{ Auth::user()->account_id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @include('partials.account-form')

                <div class="d-flex justify-content-center mt-5">
                    <button type="submit" class="btn btn-warning fw-bold px-5">{{ __('action.save') }}</button>
                </div>

            </form>
        </div>
    </div>




@endsection
