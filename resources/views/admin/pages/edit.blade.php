@extends('layouts.content')

@section('title', __('Edit pages'))

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
                        <h3 class="mb-0 fw-bold">{{ __('Page') }}</h3>
                    </div>
                    <div>
                        <a href="{{ route('pages.list') }}" class="btn btn-primary">{{ __('Back') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- card  -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="card h-100">
                <!-- card header  -->
                <div class="card-header nav-line-bottom bg-white py-4">
                    <h4 class="mb-0">{{ __('Edit page')}} </h4>
                </div>
                <form action="{{ route('pages.edit', $page->id) }}" method="POST" class="p-4">
                    @csrf

                    @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <input type="hidden" name="idUpdate" value="{{ $page->id }}">
                    <!-- Input -->
                    <div class="mb-3">
                        <label class="form-label" for="title">{{ __('Title') }}</label>
                        <input type="text" id="title" class="form-control" name="title" value="{{ $page->title }}">
                        @error('title')
                        <div class="text-danger font-weight-normal mt-1 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Page Slug') }}</label>
                        <div class="input-group mb-3">
                            <label class="input-group-text d-block" for="slug">{{ route('show.page', '') }}/</label>
                            <input type="text" class="form-control" name="slug" id="slug" value="{{ $page->slug }}">
                        </div>
                        @error('slug')
                        <div class="text-danger font-weight-normal mt-1 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="content">{{ __('Content') }}</label>
                        <textarea name="content" class="form-control" id="content" rows="4">{{ $page->content }}</textarea>
                        @error('content')
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

@section('scripts')
<script>
    "use scrict";
    CKEDITOR.replace("content");
</script>
@endsection