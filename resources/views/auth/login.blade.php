@extends('layouts.auth')

@section('title', 'Login')

@section('content')

<style>
    .smooth-shadow-md .hr-text {
        display: flex;
        /* margin: 0; */
        align-items: center;
        margin: 2rem 0;
        font-size: 0.625rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: .04em;
        line-height: 1.6;
        color: #656d77;
        height: 1px;
    }

    .hr-text:before {
        content: "";
        margin-right: .5rem;
    }

    .hr-text:after {
        content: "";
        margin-left: .5rem;
    }

    .hr-text:before, .hr-text:after {
        flex: 1 1 auto;
        height: 1px;
        background-color: currentColor;
        opacity: 0.16;
    }
</style>

<!-- container -->
<div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center g-0 min-vh-100">
        <div class="col-12 col-md-6 col-lg-4 col-xxl-4 py-8 py-xl-0">
            <!-- Card -->
            <div class="card smooth-shadow-md">
                <!-- Card body -->
                <div class="card-body p-6">
                    <div class="mb-4">
                        <a class="navbar-brand fw-bold" href="{{ route('home')}}">{{ config('settings.site_name') }}</a>
                        <p class="mb-6 mt-2">{{ __('Please enter your user information.') }}</p>
                    </div>
                    <!-- Form -->
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        @if (Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                        @endif
                        <input type="hidden" name="recaptcha_token" id="recaptcha">
                        <!-- Username -->
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" required="">

                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input type="password" id="password" class="form-control" name="password" required="">
                            @error('password')
                            <div class="text-danger font-weight-normal mt-1 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- Checkbox -->
                        <div class="d-lg-flex justify-content-between align-items-center mb-4">
                            <div class="form-check custom-checkbox">
                                <input type="checkbox" class="form-check-input" name="remember" id="rememberme">
                                <label class="form-check-label" for="rememberme">{{ __('Remember me') }}</label>
                            </div>
                        </div>
                        <div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">{{ __('Sign In') }}</button>
                            </div>
                            <div class="hr-text">or</div>
                            <div class="d-grid mt-3">
                                <a href="{{ route('socialite.redirect', 'facebook') }}" title="Connexion/Inscription avec Facebook" class="btn btn-outline-primary"><i class="bi bi-facebook"></i> {{ __('Facebook') }}</a>
                            </div>

                            <div class="d-md-flex justify-content-between mt-4">
                                <div class="mb-2 mb-md-0">
                                    <a href="{{ route('register') }}" class="fs-5">{{ __('Create An Account') }} </a>
                                </div>
                                <div>
                                    <a href="{{ route('forget-password') }}" class="text-inherit fs-5">{{ __('Forgot your password ?') }}</a>
                                </div>

                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@if(config('settings.recaptcha_login'))
@section('scripts')
<script src="https://www.google.com/recaptcha/api.js?render={{ config('settings.recaptcha_public_key') }}"></script>

<script>
    grecaptcha.ready(function() {
        grecaptcha.execute("{{ config('settings.recaptcha_public_key') }}", {
            action: 'login'
        }).then(function(token) {
            if (token) {
                document.getElementById('recaptcha').value = token;
            }
        });
    });
</script>
@endsection
@endif