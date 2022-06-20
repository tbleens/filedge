@extends('layouts.auth')

@section('title', 'Register')

@section('content')

<!-- container -->
<div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center g-0
        min-vh-100">
        <div class="col-12 col-md-8 col-lg-6 col-xxl-4 py-8 py-xl-0">
            <!-- Card -->
            <div class="card smooth-shadow-md">
                <!-- Card body -->
                <div class="card-body p-6">
                    <div class="mb-4">
                    <a class="navbar-brand fw-bold" href="{{ route('home')}}">{{ config('settings.site_name') }}</a>
                    <p class="mb-6">{{ __('Please enter your user information.') }}</p>
                    </div>
                    <!-- Form -->
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <input type="hidden" name="recaptcha_token" id="recaptcha">
                        <!-- Username -->
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" required="" value="{{ old('name') }}">
                            @error('name')
                            <div class="text-danger font-weight-normal mt-1 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
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
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="confirm-password" class="form-label">{{ __('Confirm Password') }}</label>
                            <input type="password" id="confirm-password" class="form-control" name="password_confirmation" required="">
                            @error('password_confirmation')
                            <div class="text-danger font-weight-normal mt-1 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- Checkbox -->
                        <div class="mb-3">
                            <div class="form-check custom-checkbox">
                                <input type="checkbox" name="agree_terms" class="form-check-input" id="agreeCheck">
                                <label class="form-check-label" for="agreeCheck"><span class="fs-5">{{ __('I agree to the') }} <a href="{{ config('settings.term_service_link') }}">{{ __('Terms of Service') }} </a>{{ __('and') }}
                                        <a href="{{ config('settings.privacy_policy_link') }}">{{ __('Privacy Policy.') }}</a></span></label>
                            </div>
                            @error('agree_terms')
                            <div class="text-danger font-weight-normal mt-1 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div>
                            <!-- Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                {{ __('Create Free Account') }}
                                </button>
                            </div>

                            <div class="d-md-flex justify-content-between mt-4">
                                <div class="mb-2 mb-md-0">
                                    <a href="{{ route('login') }}" class="fs-5">{{ __('Already member? Login') }}</a>
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

@if(config('settings.recaptcha_registration'))
@section('scripts')
<script src="https://www.google.com/recaptcha/api.js?render={{ config('settings.recaptcha_public_key') }}"></script>

<script>
    grecaptcha.ready(function() {
        grecaptcha.execute("{{ config('settings.recaptcha_public_key') }}", {
            action: 'register'
        }).then(function(token) {
            if (token) {
                document.getElementById('recaptcha').value = token;
            }
        });
    });
</script>
@endsection
@endif