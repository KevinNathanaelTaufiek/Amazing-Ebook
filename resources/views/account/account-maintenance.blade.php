@extends('layouts.master')

@section('title', __('nav.accountMaintenance'))

@section('content')

@include('partials.error-alert-message')

<table class="table mt-5 text-center">
    <thead>
        <tr>
            <th scope="col">{{ __('account.account') }}</th>
            <th scope="col">{{ __('action.action') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($accounts as $key => $account)
        <tr>
            <td>
                {{ $account->first_name }}
                {{ $account->middle_name }}
                {{ $account->last_name }} -
                 {{ $account->role->role_desc }}
            </td>
            <td class="d-flex justify-content-center">
                <a href="/account-maintenance/update/{{ $account->account_id }}" class="btn btn-warning me-2">
                    {{ __('action.update') }}
                </a>

                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccount{{ $key }}">
                    {{ __('action.delete') }}
                </button>

                <div class="modal fade" id="deleteAccount{{ $key }}" tabindex="-1" aria-labelledby="deleteAccountLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteAccountLabel">{{ __('action.delete') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {{ __('action.confirm') }}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('action.close') }}</button>
                                <form action="/account-maintenance/delete/{{ $account->account_id }}" method="post">
                                    @csrf
                                    @method('PUT')

                                    <button type="submit" class="btn btn-danger">
                                        {{ __('action.delete') }}
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
