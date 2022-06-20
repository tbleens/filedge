@extends('layouts.user')

@section('title', __('Account'))

@section('content')
<div class="container px-6 py-4">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div class="border-bottom pb-4 mb-4 mt-4">
                <div class="mb-2 mb-lg-0">
                    <h3 class="mb-0 fw-bold">{{ __('Account Settings') }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-8">

        <div class="col-xl-9 col-lg-8 col-md-12 col-12 mx-auto">
            <!-- card -->
            <div class="card" id="edit">
                <!-- card body -->
                <div class="card-body">
                    <div class="mb-6">
                        <h4 class="mb-1">{{ __('Email') }}</h4>

                    </div>
                    <form action="{{ route('user.account.email') }}" method="POST">
                        @csrf
                        @if (Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                        @endif
                        @if (Session::has('success-email'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success-email') }}
                        </div>
                        @endif
                        <!-- row -->
                        <div class="mb-3 row">
                            <!-- label -->
                            <label for="newEmailAddress" class="col-sm-4 col-form-label form-label">{{ __('Email') }}</label>
                            <div class="col-md-8 col-12">
                                <!-- input -->
                                <input type="email" class="form-control" placeholder="Enter your email address" id="email" name="email" required="" value="{{ Auth::user()->email }}">
                                @error('email')
                                <div class="text-danger font-weight-normal mt-1 text-sm">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!-- button -->
                            <div class="offset-md-4 col-md-8 col-12 mt-3">
                                <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>
                            </div>
                        </div>
                    </form>

                    <div class="mb-6 mt-6">
                        <h4 class="mb-1">{{ __('Change your password') }}</h4>
                    </div>
                    <form action="{{ route('user.account.password') }}" method="POST">
                        @csrf
                        @if (Session::has('success-password'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success-password') }}
                        </div>
                        @endif
                        <!-- row -->
                        <div class="mb-3 row">
                            <label for="currentPassword" class="col-sm-4 col-form-label form-label">{{ __('Current password') }}</label>

                            <div class="col-md-8 col-12">
                                <input type="password" class="form-control" name="current_password" id="currentPassword" required="">
                            </div>
                            @error('current_password')
                            <div class="text-danger font-weight-normal mt-1 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- row -->
                        <div class="mb-3 row">
                            <label for="currentNewPassword" class="col-sm-4  col-form-label form-label">{{ __('New password') }}</label>

                            <div class="col-md-8 col-12">
                                <input type="password" class="form-control" name="password" id="currentNewPassword" required="">
                            </div>
                            @error('password')
                            <div class="text-danger font-weight-normal mt-1 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <!-- row -->
                        <div class="row align-items-center">
                            <label for="confirmNewpassword" class="col-sm-4 col-form-label form-label">{{ __('Confirm new password') }}</label>
                            <div class="col-md-8 col-12 mb-2 mb-lg-0">
                                <input type="password" class="form-control" name="password_confirmation" id="confirmNewpassword" required="">
                            </div>
                            @error('password_confirmation')
                            <div class="text-danger font-weight-normal mt-1 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                            <!-- list -->
                            <div class="offset-md-4 col-md-8 col-12 mt-4">
                                <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@include('layouts.footer')

@endsection
