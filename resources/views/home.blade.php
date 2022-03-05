@extends('layouts.master')

@section('title',__('nav.home'))

@section('content')
    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">{{ __('ebook.author') }}</th>
                <th scope="col">{{ __('ebook.title') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ebooks as $ebook)
                <tr>
                    <td>{{ $ebook->author }}</td>
                    <td>
                        <a href="/ebook/detail/{{ $ebook->id }}">
                            {{ $ebook->title }}
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
