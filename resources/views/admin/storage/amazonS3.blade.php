@extends('layouts.content')

@section('title', __('Amazon S3'))

@section('content')
<!-- Container fluid -->
<div class="container-fluid px-6">
    <!-- row  -->
    <div class="row my-6">
        <!-- card  -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="card h-100">
                <!-- card header  -->
                <div class="card-header nav-line-bottom bg-white py-4">
                    <h4 class="mb-0">{{ __('Amazon S3')}} </h4>
                </div>
                <form action="{{ route('settings.storage.amazon') }}" method="POST" class="p-4">
                    @csrf

                    @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label" for="aws_access_key_id">{{ __('Aws access key ID :') }}</label>
                        <input type="text" id="aws_access_key_id" name="aws_access_key_id" class="form-control" value="{{ env('AWS_ACCESS_KEY_ID') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="aws_secret_access_key">{{ __('Aws secret access key :') }}</label>
                        <input type="text" id="aws_secret_access_key" name="aws_secret_access_key" class="form-control" value="{{ env('AWS_SECRET_ACCESS_KEY') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="aws_default_region">{{ __('Aws default region :') }}</label>
                        <input type="text" name="aws_default_region" id="aws_default_region" class="form-control" value="{{ env('AWS_DEFAULT_REGION') }}">
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