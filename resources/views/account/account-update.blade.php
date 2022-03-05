@extends('layouts.formpage')

@section('title')
{{ $account->first_name }}
{{ $account->middle_name }}
{{ $account->last_name }}
@endsection

@section('form-body')

@include('partials.error-alert-message')

<form action="/account-maintenance/update/{{ $account->account_id }}" method="POST">
    @csrf
    @method('PUT')
    <label for="role" class="col-md-1 col-form-label text-md-right">{{ __('account.role') }}</label>

    <div class="col-md-3">
        <select class="form-select" aria-label="Default select example" name="role">
            @foreach ($roles as $role)
            <option value="{{ $role->role_desc }}" @if ($role->role_desc == $account->role->role_desc)
                selected
                @endif>{{ $role->role_desc }}</option>
            @endforeach
        </select>

        @error('role')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="d-flex justify-content-center mt-5">
        <button type="submit" class="btn btn-warning fw-bold px-5">{{ __('action.save') }}</button>
    </div>

</form>
@endsection
