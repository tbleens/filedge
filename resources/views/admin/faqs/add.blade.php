@extends('layouts.content')

@section('title', __('Add faq'))

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
                        <h3 class="mb-0 fw-bold">{{ __('Faq') }}</h3>
                    </div>
                    <div>
                        <a href="{{ route('faqs.list') }}" class="btn btn-primary">{{ __('Back') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- card  -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="card h-100">
                <!-- card header  -->
                <div class="card-header nav-line-bottom bg-white py-4">
                    <h4 class="mb-0">{{ __('Edit Faq') }} </h4>
                </div>
                <form action="{{ route('faqs.add') }}" method="POST" class="p-4" enctype="multipart/form-data">
                    @csrf

                    @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <!-- Input -->
                    <div class="mb-3">
                        <label class="form-label" for="question">{{ __('Question') }}</label>
                        <input type="text" id="question" class="form-control" name="question" value="{{ old('question') }}">
                        @error('question')
                        <div class="text-danger font-weight-normal mt-1 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="answer">{{ __('Answer') }}</label>
                        <textarea name="answer" id="answer" class="form-control" rows="5">{{ old('answer') }}</textarea>
                        @error('answer')
                        <div class="text-danger font-weight-normal mt-1 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="visibility">{{ __('Visibility') }}</label>
                        <select id="visibility" name="visibility" class="form-select">
                            <option value="0">{{ __('Hidden') }}</option>
                            <option value="1" selected>{{ __('Public') }}</option>
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