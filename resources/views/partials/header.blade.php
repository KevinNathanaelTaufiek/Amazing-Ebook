<div class="container-fluid bg-lightblue">
    <div class="container py-3">
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col-4 d-flex align-items-center justify-content-center">
                <h1 class="fw-bold text-center">Amazing E-book</h1>
            </div>
            <div class="col-4 d-flex align-items-center justify-content-end">
                <div>
                    @guest
                    <a href="/login" class="btn btn-warning fw-bold">{{ __('auth.login') }}</a>
                    <a href="/signup" class="btn btn-warning fw-bold">{{ __('auth.signup') }}</a>

                    @else
                    <a href="/logout" class="btn btn-warning fw-bold">{{ __('auth.logout') }}</a>

                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
