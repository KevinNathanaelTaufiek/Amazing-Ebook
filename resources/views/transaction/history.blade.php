@extends('layouts.master')

@section('title',__('nav.history'))

@section('content')
@include('partials.error-alert-message')

    @if($orders->first())
        <table class="table mt-5">
            <thead>
                <tr>
                    <th scope="col">{{ __('ebook.title') }}</th>
                    <th scope="col">{{ __('ebook.orderDate') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->ebook->title }}</td>
                    <td>
                        {{ $order->order_date }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection
