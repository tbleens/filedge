@extends('layouts.content')

@section('title', __('Wasabi'))

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
                    <h4 class="mb-0">{{ __('Wasabi')}} </h4>
                </div>
                <form action="{{ route('settings.storage.wasabi') }}" method="POST" class="p-4">
                    @csrf

                    @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label" for="wasabi_access_key_id">{{ __('Wasabi access key ID :') }}</label>
                        <input type="text" id="wasabi_access_key_id" name="wasabi_access_key_id" class="form-control" value="{{ env('WASABI_ACCESS_KEY_ID') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="wasabi_secret_access_key">{{ __('Wasabi secret access key :') }}</label>
                        <input type="text" id="wasabi_secret_access_key" name="wasabi_secret_access_key" class="form-control" value="{{ env('WASABI_SECRET_ACCESS_KEY') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="wasabi_default_region">{{ __('Wasabi default region :') }}</label>
                        <input type="text" name="wasabi_default_region" id="wasabi_default_region" class="form-control" value="{{ env('WASABI_DEFAULT_REGION') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="wasabi_bucket">{{ __('Wasabi bucket :') }}</label>
                        <input type="text" name="wasabi_bucket" id="wasabi_bucket" class="form-control" value="{{ env('WASABI_BUCKET') }}">
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