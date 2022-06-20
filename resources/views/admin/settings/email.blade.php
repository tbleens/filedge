@extends('layouts.content')

@section('title', __('Email'))

@section('content')
<div class="container-fluid px-6">
    <div class="row my-6">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div>
                <div class="border-bottom pb-4 mb-4 d-flex align-items-center justify-content-between">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0 fw-bold">{{ __('Email') }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="card h-100">
                <div class="card-header nav-line-bottom bg-white py-4">
                    <h4 class="mb-0">{{ __('Email')}} </h4>
                </div>
                <form action="{{ route('settings.email') }}" method="POST" class="p-4">
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
                    <div class="mb-3">
                        <label class="form-label" for="mail_host">{{ __('Mail host') }}</label>
                        <input type="text" id="mail_host" class="form-control" name="mail_host" value="{{ env('MAIL_HOST') }}">
                        @error('mail_host')
                        <div class="text-danger font-weight-normal mt-1 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="mail_port">{{ __('Mail port') }}</label>
                        <input type="number" id="mail_port" class="form-control" name="mail_port" value="{{ env('MAIL_PORT') }}">
                        @error('mail_port')
                        <div class="text-danger font-weight-normal mt-1 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="mail_username">{{ __('Mail username') }}</label>
                        <input type="text" id="mail_username" class="form-control" name="mail_username" value="{{ env('MAIL_USERNAME') }}">
                        @error('mail_username')
                        <div class="text-danger font-weight-normal mt-1 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="mail_password">{{ __('Mail password') }}</label>
                        <input type="text" id="mail_password" class="form-control" name="mail_password" value="{{ env('MAIL_PASSWORD') }}">
                        @error('mail_password')
                        <div class="text-danger font-weight-normal mt-1 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="mail_encryption">{{ __('Mail encryption') }}</label>
                        <select id="mail_encryption" name="mail_encryption" class="form-select">
                            <option value="tls" @if(env('MAIL_ENCRYPTION')=='tls' ) selected @endif>TLS</option>
                            <option value="ssl" @if(env('MAIL_ENCRYPTION')=='ssl' ) selected @endif>SSl</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="from_address">{{ __('From address') }}</label>
                        <input type="text" id="from_address" class="form-control" name="from_address" value="{{ env('MAIL_FROM_ADDRESS') }}">
                        @error('from_address')
                        <div class="text-danger font-weight-normal mt-1 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="from_name">{{ __('From name') }}</label>
                        <input type="text" id="from_name" class="form-control" name="from_name" value="{{ env('MAIL_FROM_NAME') }}">
                        @error('from_name')
                        <div class="text-danger font-weight-normal mt-1 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
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