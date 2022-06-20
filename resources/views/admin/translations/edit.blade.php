@extends('layouts.content')

@section('title', __('Edit translation'))

@section('content')
<!-- Container fluid -->
<div class="container-fluid px-6">
    <!-- row  -->
    <div class="row my-6">
        <!-- card  -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="border-bottom pb-4 mb-4 d-flex align-items-center
                  justify-content-between">
                <div class="mb-2 mb-lg-0">
                    <h3 class="mb-0 fw-bold">{{ __('Translations') }}</h3>
                </div>
                <div>
                    <a href="{{ route('translations.list') }}" class="btn btn-primary">{{ __('Back') }}</a>
                </div>
            </div>
            <div class="card h-100">
                <!-- card header  -->
                <div class="card-header nav-line-bottom bg-white py-4">
                    <h4 class="mb-0">{{ __('Edit translation')}} </h4>
                </div>
                <form action="{{ route('translations.edit', $id) }}" method="POST" class="p-4">
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
                    @foreach($translation as $key => $value)
                    <div class="mb-1 row">
                        <label for="email" class="col-sm-4 col-form-label form-label">{{ $key }}</label>
                        <div class="col-md-8 col-12">
                            <input type="text" class="form-control" name="{{ $key }}" id="email" value="{{ $value }}">
                        </div>
                    </div>
                    @endforeach
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-primary" type="submit">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection