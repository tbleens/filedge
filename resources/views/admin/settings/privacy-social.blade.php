@extends('layouts.content')

@section('title', __('Pages'))

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
                        <h3 class="mb-0 fw-bold">{{ __('Privacy & Social') }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- card  -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="card h-100">
                <!-- card header  -->
                <div class="card-header nav-line-bottom bg-white py-4">
                    <h4 class="mb-0">{{ __('Privacy & Social') }} </h4>
                </div>
                <form action="{{ route('settings.pages') }}" method="POST" class="p-4">
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
                        <label class="form-label" for="privacy_policy_link">{{ __('Privacy policy link') }}</label>
                        <input type="text" class="form-control" name="privacy_policy_link" id="privacy_policy_link" value="{{ config('settings.privacy_policy_link') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="term_service_link">{{ __('Terms of service link') }}</label>
                        <input type="text" class="form-control" name="term_service_link" id="term_service_link" value="{{ config('settings.term_service_link') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="facebook_link">{{ __('Facebook link') }}</label>
                        <input type="text" class="form-control" name="facebook_link" id="facebook_link" value="{{ config('settings.facebook_link') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="twitter_link">{{ __('Twitter link') }}</label>
                        <input type="text" class="form-control" name="twitter_link" id="twitter_link" value="{{ config('settings.twitter_link') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="linkedin_link">{{ __('Linkedin link') }}</label>
                        <input type="text" class="form-control" name="linkedin_link" id="linkedin_link" value="{{ config('settings.linkedin_link') }}">
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