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
                        <h3 class="mb-0 fw-bold">{{ __('Posts') }}</h3>
                    </div>
                    <div>
                        <a href="{{ route('posts.list') }}" class="btn btn-primary">{{ __('Back') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- card  -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="card h-100">
                <!-- card header  -->
                <div class="card-header nav-line-bottom bg-white py-4">
                    <h4 class="mb-0">{{ __('Add post') }} </h4>
                </div>
                <form action="{{ route('posts.add') }}" method="POST" class="p-4" enctype="multipart/form-data">
                    @csrf

                    @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <!-- Input -->
                    <div class="mb-3">
                        <label class="form-label" for="title">{{ __('Title') }}</label>
                        <input type="text" id="title" class="form-control" name="title" value="{{ old('title') }}">
                        @error('title')
                        <div class="text-danger font-weight-normal mt-1 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Image') }}</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="image" id="image" accept="jpeg,png,bmp,gif,svg,webp">
                            <label class="input-group-text d-block" for="icon">{{ __('Upload') }}</label>
                        </div>
                        @error('image')
                        <div class="text-danger font-weight-normal mt-1 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="category">{{ __('Category') }}</label>
                        <select id="category" name="category" class="form-select">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <div class="text-danger font-weight-normal mt-1 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="short_description">{{ __('Short description') }}</label>
                        <textarea name="short_description" class="form-control" id="short_description" rows="4">{{ old('short_description') }}</textarea>
                        @error('short_description')
                        <div class="text-danger font-weight-normal mt-1 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="content">{{ __('Content') }}</label>
                        <textarea name="content" class="form-control" id="content" rows="4">{{ old('content') }}</textarea>
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