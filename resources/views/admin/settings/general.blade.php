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
                        <h3 class="mb-0 fw-bold">{{ __('General') }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- card  -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="card h-100">
                <!-- card header  -->
                <div class="card-header nav-line-bottom bg-white py-4">
                    <h4 class="mb-0">{{ __('General')}} </h4>
                </div>
                <form action="{{ route('settings.general') }}" method="POST" class="p-4">
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
                        <label class="form-label" for="site_name">{{ __('Site name') }}</label>
                        <input type="text" id="site_name" class="form-control" name="site_name" value="{{ config('settings.site_name') }}">
                        @error('site_name')
                        <div class="text-danger font-weight-normal mt-1 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="home_title">{{ __('Home title') }}</label>
                        <input type="text" id="home_title" class="form-control" name="home_title" value="{{ config('settings.home_title') }}">
                        @error('home_title')
                        <div class="text-danger font-weight-normal mt-1 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="meta_keywords">{{ __('Meta Keywords') }}</label>
                        <input type="text" id="meta_keywords" class="form-control" name="meta_keywords" value="{{ config('settings.meta_keywords') }}">
                        @error('meta_keywords')
                        <div class="text-danger font-weight-normal mt-1 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="meta_description">{{ __('Meta description') }}</label>
                        <textarea name="meta_description" class="form-control" id="meta_description" rows="4">{{ config('settings.meta_description') }}</textarea>
                        @error('meta_description')
                        <div class="text-danger font-weight-normal mt-1 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <!-- Select Option -->
                    <div class="mb-3">
                        <label class="form-label" for="storage_uploads">{{ __('Storage Uploads') }}</label>
                        <select id="storage_uploads" name="storage_uploads" class="form-select">
                            <option value="1" @if(config('settings.storage_uploads') == "1") selected @endif>{{ __('Local server') }}</option>
                            <option value="2"  @if(config('settings.storage_uploads') == "2") selected @endif>{{ __('Amazon S3') }}</option>
                            <option value="3"  @if(config('settings.storage_uploads') == "3") selected @endif>{{ __('Wasabi') }}</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="max_file_size">{{ __('Max File Size') }}</label>
                        <input type="number" id="max_file_size" class="form-control" name="max_file_size" value="{{ config('settings.max_file_size') }}">
                        <small>1073741824 Bytes = 1 Gigabytes</small>
                        @error('max_file_size')
                        <div class="text-danger font-weight-normal mt-1 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="language">{{ __('Language') }}</label>
                        <select id="language" name="language" class="form-select">
                            @foreach($translations as $translation)
                            <option value="{{ $translation->locale }}" @if(config('settings.translation') == $translation->locale) selected @endif>{{ $translation->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="force_https">{{ __('Force https') }}</label>
                        <select id="force_https" name="force_https" class="form-select">
                            <option value="0">{{ __('No') }}</option>
                            <option value="1" @if(config('settings.force_https')) selected @endif>{{ __('Yes') }}</option>
                        </select>
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