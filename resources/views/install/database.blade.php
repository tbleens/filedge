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
                            <form action="{{ route('install.database') }}" method="POST">
                                @csrf
                                <h5 class="mb-4"> {{ __('Enter the database connexion') }}</h5>
                                @if (Session::has('error'))
                                <div class="alert alert-danger" role="alert">
                                    <p>{{ Session::get('error') }}</p>
                                </div>
                                @endif
                                <div class="row mt-4 mb-3">
                                    <div class="col-6">
                                        <label for="database_hostname" class="form-label">{{ __('Hostname') }}</label>
                                        <input type="text" value="{{ old('database_hostname') }}" class="form-control @error('database_hostname') border border-danger @enderror" id="database_hostname" name="database_hostname">
                                        @error('database_hostname')
                                        <div class="text-danger font-weight-normal mt-1 text-sm">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="database_port" class="form-label"> {{ __('Port') }}</label>
                                        <input type="number" value="{{ old('database_port') }}" class="form-control @error('database_port') border border-danger @enderror" id="database_port" name="database_port">
                                        @error('database_port')
                                        <div class="text-danger font-weight-normal mt-1 text-sm">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="database_name" class="form-label">{{ __('Database') }}</label>
                                    <input type="text" value="{{ old('database_name') }}" class="form-control @error('database_name') border border-danger @enderror" id="database_name" name="database_name">
                                    @error('database_name')
                                    <div class="text-danger font-weight-normal mt-1 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="database_username" class="form-label">{{ __('User') }}</label>
                                    <input type="text" value="{{ old('database_username') }}" class="form-control @error('database_username') border border-danger @enderror" id="database_username" name="database_username">
                                    @error('database_username')
                                    <div class="text-danger font-weight-normal mt-1 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="database_password" class="form-label">{{ __('Password') }}</label>
                                    <input type="password" class="form-control" id="database_password" name="database_password">
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
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