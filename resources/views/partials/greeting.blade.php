<div class="d-flex align-items-center justify-content-center mt-5">

    <div class="circle text-center" >
        <h1>{{ $message }}</h1>
    </div>

</div>

@isset($redirectLink)
    <div class="text-center mt-3">
        <a href="{{ $redirectLink }}">{{ __('nav.goHome') }}</a>

    </div>
@endisset
