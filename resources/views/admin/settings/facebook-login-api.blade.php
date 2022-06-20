@extends('layouts.content')

@section('title', __('General'))

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
                        <h3 class="mb-0 fw-bold">{{ __('Facebook Login Api') }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- card  -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="card h-100">
                <!-- card header  -->
                <div class="card-header nav-line-bottom bg-white py-4">
                    <h4 class="mb-0">{{ __('Facebook Login Api')}} </h4>
                </div>
                <form action="{{ route('settings.facebook.login.api') }}" method="POST" class="p-4">
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
                        <label class="form-label" for="client_id_facebook_login">{{ __('CLIENT ID :') }}</label>
                        <input type="text" id="client_id_facebook_login" class="form-control" name="client_id_facebook_login" value="{{ env('FACEBOOK_CLIENT_ID') }}">
                        @error('client_id_facebook_login')
                        <div class="text-danger font-weight-normal mt-1 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="client_secret_facebook_login">{{ __('CLIENT SECRET :') }}</label>
                        <input type="text" id="client_secret_facebook_login" class="form-control" name="client_secret_facebook_login" value="{{ env('FACEBOOK_CLIENT_SECRET') }}">
                        @error('client_secret_facebook_login')
                        <div class="text-danger font-weight-normal mt-1 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="redirect_url_facebook_login">{{ __('REDIRECT URL :') }}</label>
                        <input type="text" id="redirect_url_facebook_login" class="form-control" name="redirect_url_facebook_login" value="{{ env('FACEBOOK_CLIENT_CALLBACK') }}">
                        @error('redirect_url_facebook_login')
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