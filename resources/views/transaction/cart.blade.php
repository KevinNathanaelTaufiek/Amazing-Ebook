@extends('layouts.master')

@section('title',__('nav.cart'))

@section('content')
@include('partials.error-alert-message')

@if ( $cart )
    <table class="table mt-5 text-center">
        <thead>
            <tr>
                <th scope="col">{{ __('ebook.title') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart as $item)
            <tr>
                <td>{{ $item->title }}</td>

                <td>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCartItem{{ $item->id }}">
                        {{ __('action.delete') }}
                    </button>

                    <div class="modal fade" id="deleteCartItem{{ $item->id }}" tabindex="-1" aria-labelledby="deleteCartItemLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteCartItemLabel">{{ __('action.delete') }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{ __('action.confirm') }}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('action.close')
                                        }}</button>
                                    <a href="/cart/remove/{{ $item->id }}" class="btn btn-danger">{{ __('action.delete') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </td>



            </tr>
            @endforeach
        </tbody>
    </table>

    <form action="/checkout" method="POST">
        @csrf
        <div class="d-flex justify-content-center mt-5">
            <button type="submit" class="btn btn-warning fw-bold px-5">{{ __('action.submit') }}</button>
        </div>
    </form>
@endif

@endsection
