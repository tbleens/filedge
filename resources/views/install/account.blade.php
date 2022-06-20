@extends('layouts.install')

@section('content')
<div class="container-fluid">

    <div class="row mt-6">
        <div class="offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 col-md-12 col-12">
            <div class="row">
                <div class="col-12 mb-6">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('assets/logo/logo.png') }}" alt="logo" width="150">
                    </div>
                    <!-- card  -->
                    <div class="card">
                        <!-- card header  -->
                        <div class="card-header p-4 bg-white">
                            <h4 class="mb-0">{{ __('Install your App') }}</h4>
                        </div>
                        <!-- card body  -->
                        <div class="card-body">
                            <form method="post" action="{{ route('install.account') }}" class="connexion page install_form">
                                @csrf
                                <h5 class="mb-4"> {{ __('CREATE YOUR ACCOUNT') }} </h5>
                                @if (Session::has('status'))
                                <div class="alert alert-danger" role="alert">
                                    <p>{{ Session::get('status') }}</p>
                                </div>
                                @endif
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                    <input type="text" class="form-control @error('name') border border-danger @enderror" value="{{ old('name') }}" id="name" name="name">
                                    @error('name')
                                    <div class="text-danger font-weight-normal mt-1 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">{{ __('Email') }}</label>
                                    <input type="email" class="form-control @error('email') border border-danger @enderror" value="{{ old('email') }}" id="email" name="email">
                                    @error('email')
                                    <div class="text-danger font-weight-normal mt-1 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                    <input type="password" class="form-control @error('password') border border-danger @enderror" id="password" name="password">
                                    @error('password')
                                    <div class="text-danger font-weight-normal mt-1 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password" class="form-label">{{ __('Password Confirmation') }}</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                </div>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                                    <input type="submit" class="btn btn-primary next db" value="{{ __('Next') }}">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection