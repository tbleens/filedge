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
                            <h4 class="mb-0">{{ __('Complete Installation') }}</h4>
                        </div>
                        <!-- card body  -->
                        <div class="card-body text-center">
                            <h5 class="mb-4"> {{ __('Enter the database connexion') }}</h5>

                            <p> {{ __('Clic to this link for go in the page') }} </p>

                            <a href="{{ route('home') }}" class="btn btn-primary"> {{ __('Finish') }} </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection