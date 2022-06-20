@extends('layouts.auth')

@section('title', 'Forgot Password')

@section('content')

<div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center g-0
        min-vh-100">
        <div class="col-12 col-md-6 col-lg-4 col-xxl-4 py-8 py-xl-0">
            <!-- Card -->
            <div class="card smooth-shadow-md">
                <!-- Card body -->
                <div class="card-body p-6">
                    <div class="mb-4">
                    <a class="navbar-brand fw-bold" href="{{ route('home')}}">{{ config('settings.site_name') }}</a>
                    <p class="mb-6">{{ __('Don\'t worry, we\'ll send you an email to reset your password.') }}
                        </p>
                    </div>
                    <!-- Form -->
                    <form action="{{ route('forget-password') }}" method="POST">
                        @csrf

                        @if (Session::has('status'))
                        <div class="alert alert-success" role="alert">
                            <p>{{ Session::get('status') }}</p>
                        </div>
                        @endif
                        @if (Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            <p>{{ Session::get('status') }}</p>
                        </div>
                        @endif
                        <input type="hidden" name="recaptcha_token" id="recaptcha">
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" required="">
                            @error('email')
                            <div class="text-danger font-weight-normal mt-1 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- Button -->
                        <div class="mb-3 d-grid">
                            <button type="submit" class="btn btn-primary">
                            {{ __('Reset Password') }}
                            </button>
                        </div>
                        <span>{{ __('Don\'t have an account ?') }} <a href="{{ route('register') }}">{{ __('Sign In') }}</a></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@if(config('settings.recaptcha_forgot_password'))
@section('scripts')
<script src="https://www.google.com/recaptcha/api.js?render={{ config('settings.recaptcha_public_key') }}"></script>

<script>
    grecaptcha.ready(function() {
        grecaptcha.execute("{{ config('settings.recaptcha_public_key') }}", {
            action: 'forgotPassword'
        }).then(function(token) {
            if (token) {
                document.getElementById('recaptcha').value = token;
            }
        });
    });
</script>
@endsection
@endif