@extends('layouts.formpage')

@section('title')
    {{ $ebook->title }} {{ __('nav.detail') }}
@endsection

@section('form-body')

    @include('partials.error-alert-message')

    <div class="row">
        <div class="col-3">
            {{ __('ebook.title') }}:
        </div>
        <div class="col-9">
            {{ $ebook->title }}
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            {{ __('ebook.author') }}:
        </div>
        <div class="col-9">
            {{ $ebook->author }}
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            {{ __('ebook.description') }}:
        </div>
        <div class="col-9">
            {{ $ebook->description }}
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <form action="/cart/rent" method="post">
            @csrf
            <input value="{{ $ebook->id }}" type="hidden" name="ebook_id">
            <button type="submit" class="btn btn-warning fw-bold">{{ __('action.rent') }}</button>
        </form>
    </div>

@endsection
