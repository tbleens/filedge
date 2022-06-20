@extends('layouts.content')

@section('title', __('Captcha'))

@section('content')
<!-- Container fluid -->
<div class="container-fluid px-6">
    <!-- row  -->
    <div class="row my-6">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div>
                <div class="border-bottom pb-4 mb-4 d-flex align-items-center justify-content-between">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0 fw-bold">{{ __('Captcha') }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- card  -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="card h-100">
                <!-- card header  -->
                <div class="card-header nav-line-bottom bg-white py-4">
                    <h4 class="mb-0">{{ __('Captcha')}} </h4>
                </div>
                <form action="{{ route('settings.captcha') }}" method="POST" class="p-4">
                    @csrf

                    @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                    @endif
                    <!-- Input -->
                    <div class="mb-3">
                        <label class="form-label" for="recaptcha_public_key">{{ __('recaptcha public key') }}</label>
                        <input type="text" id="recaptcha_public_key" class="form-control" name="recaptcha_public_key" value="{{ config('settings.recaptcha_public_key') }}">
                        @error('site_name')
                        <div class="text-danger font-weight-normal mt-1 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="recaptcha_secret_key">{{ __('recaptcha secret key') }}</label>
                        <input type="text" id="recaptcha_secret_key" class="form-control" name="recaptcha_secret_key" value="{{ config('settings.recaptcha_secret_key') }}">
                        @error('home_title')
                        <div class="text-danger font-weight-normal mt-1 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <!-- Select Option -->
                    <div class="mb-3">
                        <label class="form-label" for="recaptcha_registration">{{ __('recaptcha registration') }}</label>
                        <select id="recaptcha_registration" name="recaptcha_registration" class="form-select">
                            <option value="0">No</option>
                            <option value="1" @if(config('settings.recaptcha_registration')) selected @endif>Yes</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="recaptcha_login">{{ __('recaptcha login') }}</label>
                        <select id="recaptcha_login" name="recaptcha_login" class="form-select">
                            <option value="0">{{ __('No') }}</option>
                            <option value="1" @if(config('settings.recaptcha_login')) selected @endif>{{ __('Yes') }}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="recaptcha_forgot_password">{{ __('recaptcha forgot password') }}</label>
                        <select id="recaptcha_forgot_password" name="recaptcha_forgot_password" class="form-select">
                            <option value="0">{{ __('No') }}</option>
                            <option value="1" @if(config('settings.recaptcha_forgot_password')) selected @endif>{{ __('Yes') }}</option>
                        </select>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-primary" type="submit">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection