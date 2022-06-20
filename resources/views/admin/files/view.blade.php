@extends('layouts.content')

@section('title', __('Uploads'))

@section('content')
<!-- Container fluid -->
<div class="container-fluid px-6">
    <!-- row  -->
    <div class="row my-6">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div class="border-bottom pb-4 mb-4 d-flex align-items-center
                  justify-content-between">
                <div class="mb-2 mb-lg-0">
                    <h3 class="mb-0 fw-bold">{{ __('Uploads') }}</h3>
                </div>
                <div>
                    <a href="{{ route('files.list') }}" class="btn btn-primary">{{ __('Back') }}</a>
                </div>
            </div>
        </div>
        <!-- card  -->
        <div class="col-xl-6 col-lg-6 col-md-12 col-12 mx-auto">
            <div class="card py-4">
                <!-- card header  -->
                <div class="card-header nav-line-bottom bg-white text-center py-6">
                    <h3 class="mb-0 fw-bold">{{ __('File information')}} </h3>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item py-2"><span class="fw-bold">{{ __('User name') }} </span> : @if($upload->user) {{ $upload->user->name }} @else {{ __('Anonymous') }} @endif</li>
                    <li class="list-group-item py-2"><span class="fw-bold">{{ __('File name') }} </span> : {{ $upload->original_filename }}</li>
                    <li class="list-group-item py-2"><span class="fw-bold">{{ __('File ID') }} </span> : {{ $upload->file_id }}</li>
                    <li class="list-group-item py-2"><span class="fw-bold">{{ __('File size') }} </span> : {{ formatBytes($upload->file_size) }}</li>
                    <li class="list-group-item py-2"><span class="fw-bold">{{ __('Downloads') }} </span> : {{ $upload->downloads }}</li>
                    <li class="list-group-item py-2"><span class="fw-bold">{{ __('Uploaded at') }} </span> : {{ $upload->updated_at }}</li>
                </ul>
            </div>
            <div class="d-grid gap-2 d-md-block mt-4 text-center">
                <a href="{{ route('files.download', $upload->file_id) }}" class="btn btn-primary">{{ __('Download File') }}</a>
                <a href="{{ route('files.delete', $upload->file_id) }}" class="btn btn-danger">{{ __('Delete File') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection