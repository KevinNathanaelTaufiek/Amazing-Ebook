<div class="form-group row mb-2">
        <div class="col-md-2"></div>
        <label for="first_name" class="col-md-1 col-form-label text-md-right">{{ __('account.name.first') }}</label>

        <div class="col-md-3">
            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                value="{{ old('first_name') }}" autocomplete="first_name" autofocus>

            @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <label for="middle_name" class="col-md-1 col-form-label text-md-right">{{ __('account.name.middle') }}</label>

        <div class="col-md-3">
            <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name"
                value="{{ old('middle_name') }}" autocomplete="middle_name" autofocus>

            @error('middle_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row mb-2">
        <div class="col-md-2"></div>
        <label for="last_name" class="col-md-1 col-form-label text-md-right">{{ __('account.name.last') }}</label>

        <div class="col-md-3">
            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                value="{{ old('last_name') }}" autocomplete="last_name" autofocus>

            @error('last_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
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
        <div class="col-md-2"></div>
        <label for="gender" class="col-md-1 col-form-label text-md-right">{{ __('account.gender') }}</label>

        <div class="col-md-3 d-flex">
            @foreach ($genders as $gender)
                <div class="form-check me-3">
                    <input class="form-check-input" type="radio" name="gender" id="{{ $gender->gender_desc }}" value="{{ $gender->gender_desc }}" @if ($gender->gender_desc == old('gender') || $gender->id == old('gender_id')) checked @endif>
                    <label class="form-check-label" for="{{ $gender->gender_desc }}">
                        {{ $gender->gender_desc }}
                    </label>
                </div>
            @endforeach
            @error('gender')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <label for="role" class="col-md-1 col-form-label text-md-right">{{ __('account.role') }}</label>

        <div class="col-md-3">

                <select class="form-select" aria-label="Default select example" name="role">
                    @foreach ($roles as $role)
                        <option value="{{ $role->role_desc }}"
                            @if ($role->role_desc == old('role') || $role->id == old('role_id'))
                                selected
                            @elseif ($role->role_desc == $roles->first()->role_desc)
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
    </div>
    <div class="form-group row mb-2">
        <div class="col-md-2"></div>
        <label for="password" class="col-md-1 col-form-label text-md-right">{{ __('account.password') }}</label>

        <div class="col-md-3">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" autocomplete="password" autofocus>

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <label for="display_picture_link" class="col-md-1 col-form-label text-md-right">{{ __('account.picture') }}</label>

        <div class="col-md-3">
            <input id="display_picture_link" type="file" class="form-control @error('display_picture_link') is-invalid @enderror"
                name="display_picture_link" autocomplete="display_picture_link" autofocus>

            @error('display_picture_link')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
