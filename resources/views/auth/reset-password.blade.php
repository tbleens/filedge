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
                    <form action="{{ route('reset-password') }}" method="POST">
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
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('New Password') }}</label>
                            <input type="password" id="password" class="form-control" name="password" placeholder="New Password" required="">
                            @error('password')
                            <div class="text-danger font-weight-normal mt-1 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Confirm new password" required="">
                            @error('password_confirmation')
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection