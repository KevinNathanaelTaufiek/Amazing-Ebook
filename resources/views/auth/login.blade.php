@extends('layouts.formpage')

@section('title', __('auth.login'))

@section('form-body')

    @include('partials.error-alert-message')

    <form action="/login" method="POST">
        @csrf
        <div class="form-group row mb-2">
            <div class="col-md-4"></div>
            <label for="email" class="col-md-1 col-form-label text-md-right">{{ __('account.email') }}</label>

            <div class="col-md-3">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row mb-2">
            <div class="col-md-4"></div>
            <label for="password" class="col-md-1 col-form-label text-md-right">{{ __('account.password') }}</label>

            <div class="col-md-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="password" autofocus>

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="d-flex justify-content-center mt-5">
            <button type="submit" class="btn btn-warning fw-bold px-5">{{ __('auth.login') }}</button>
        </div>

    </form>

    <div class="text-center my-5">
        <a href="/signup">{{ __('auth.haventAccount') }}</a>
    </div>


@endsection

