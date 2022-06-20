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
                            <form method="POST">
                                @csrf
                                <h5 class="mb-4"> {{ __('Requirements') }}</h5>
                                <ul class="requirements my-4 ps-0">
                                    <li class="d-flex justify-content-between">
                                        <span class="fw-bold">PHP version : {{ $phpversion['version'] }}</span>
                                        @if($phpversion['valid'])
                                        <i class="bi bi-check text-success fs-3"></i>
                                        @else
                                        <i class='bi bi-x text-danger fs-3'></i>
                                        @endif
                                    </li>
                                    @foreach($extensions as $extension)
                                    <li class="d-flex justify-content-between">
                                        <span>{{ $extension }}</span>
                                        @if(in_array($extension, $allextension))
                                        <i class="bi bi-check text-success fs-3"></i>
                                        @else
                                        <i class='bi bi-x text-danger fs-3'></i>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <input type="submit" class="btn btn-primary next req" @if($DisableExtension) disabled="true" @endif value="{{ __('Next') }}">
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