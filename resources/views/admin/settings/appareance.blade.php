@extends('layouts.content')

@section('title', __('Appareance'))

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
                        <h3 class="mb-0 fw-bold">{{ __('Appareance') }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- card  -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="card h-100">
                <!-- card header  -->
                <div class="card-header nav-line-bottom bg-white py-4">
                    <h4 class="mb-0">{{ __('Appareance')}} </h4>
                </div>
                <form action="{{ route('settings.appareance') }}" method="POST" enctype="multipart/form-data" class="p-4">
                    @csrf

                    @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <div class="mb-3">
                        <label class="form-label">{{ __('Logo') }}</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="logo" id="logo" accept="jpeg,png,bmp,gif,svg,webp">
                            <label class="input-group-text" for="logo"><img src="{{ asset('assets/logo/'.config('settings.logo')) }}" width="40"></label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Favicon') }}</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="favicon" id="favicon" accept="jpeg,png,bmp,gif,svg,webp">
                            <label class="input-group-text" for="favicon"><img src="{{ asset('assets/logo/'.config('settings.favicon')) }}" width="40"></label>
                        </div>
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