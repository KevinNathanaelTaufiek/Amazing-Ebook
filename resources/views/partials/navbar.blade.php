@auth
<div class="d-flex bg-warning py-2 align-items-center justify-content-around">
    <a href="/home" class="text-decoration-none fw-bold text-black fs-5">{{ __('nav.home') }}</a>
    <a href="/cart" class="text-decoration-none fw-bold text-black fs-5">{{ __('nav.cart') }}</a>
    <a href="/history" class="text-decoration-none fw-bold text-black fs-5">{{ __('nav.history') }}</a>
    <a href="/profile" class="text-decoration-none fw-bold text-black fs-5">{{ __("nav.profile") }}</a>
    @if (Auth::user()->role->role_desc == 'Admin')
    <a href="/account-maintenance" class="text-decoration-none fw-bold text-black fs-5">{{ __('nav.accountMaintenance') }}</a>
    @endif
</div>
@endauth
