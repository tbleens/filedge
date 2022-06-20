@extends('layouts.content')

@section('title', __('Add extension'))

@section('content')
<!-- Container fluid -->
<div class="container-fluid px-6">
    <!-- row  -->
    <div class="row my-6">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div>
                <div class="border-bottom pb-4 mb-4 d-flex align-items-center
                  justify-content-between">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0 fw-bold">{{ __('Extensions') }}</h3>
                    </div>
                    <div>
                        <a href="{{ route('extensions.list') }}" class="btn btn-primary">{{ __('Back') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- card  -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="card h-100">
                <!-- card header  -->
                <div class="card-header nav-line-bottom bg-white py-4">
                    <h4 class="mb-0">{{ __('Add Extension') }} </h4>
                </div>
                <form action="{{ route('extensions.add') }}" method="POST" class="p-4">
                    @csrf

                    @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <!-- Input -->
                    <div class="mb-3">
                        <label class="form-label" for="name">{{ __('Name') }}</label>
                        <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="text-danger font-weight-normal mt-1 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Icon') }}</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="icon" id="icon" accept="jpeg,png,bmp,gif,svg,webp">
                            <label class="input-group-text d-block" for="icon">{{ __('Upload') }}</label>
                        </div>
                        @error('icon')
                        <div class="text-danger font-weight-normal mt-1 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
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