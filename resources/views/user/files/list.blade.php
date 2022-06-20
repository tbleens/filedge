@extends('layouts.user')

@section('title', __('Files'))

@section('content')

<div class="page">
    <div class="container mt-8">
        <form action="#" method="GET" class="mb-5">
            <div class="input-icon">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="10" cy="10" r="7"></circle>
                        <line x1="21" y1="21" x2="15" y2="15"></line>
                    </svg>
                </span>
                <input type="text" name="file_name" class="form-control" placeholder="Search on your file…" aria-label="Search in my files">
            </div>
        </form>
        <div class="row">
            @if(!$uploads->isEmpty())
            @foreach($uploads as $upload)
            <div class="col-lg-3 col-xl-2">
                <div class="file-box file-shadow-box">
                    <a href="#" id="deleteFile" data-file-id="{{ $upload->id }}" class="file-close" data-bs-toggle="modal" data-bs-target="#modal-delete"><i class="fa fa-times-circle"></i></a>
                    <a href="#" data-link="{{ route('download', $upload->file_id) }}" class="file-view" data-bs-toggle="modal" data-bs-target="#modal-share"><i class="bi bi-share-fill"></i></a>
                    <div class="file-img-box">
                        @if($upload->extension)
                        <img src="{{ asset('assets/images/icons/'.$upload->extension->file_icon) }}" alt="icon">
                        @else
                        <img src="{{ asset('assets/images/icons/unknown.png') }}" alt="icon">
                        @endif
                    </div>
                    <a href="{{ route('user.files.download', $upload->file_id) }}" class="file-download">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                            <polyline points="7 11 12 16 17 11"></polyline>
                            <line x1="12" y1="4" x2="12" y2="16"></line>
                        </svg>
                    </a>
                    <div class="file-title">
                        <h5 class="mb-0 text-overflow" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $upload->original_filename }}">{{ $upload->original_filename }}</h5>
                        <p class="mb-0"><small>{{ formatBytes($upload->file_size) }}</small></p>
                    </div>
                    <div class="file-data">
                        <small>{{ __('Downloads') }} : {{ $upload->downloads }}</small>
                    </div>
    
                </div>
            </div>
            @endforeach
            @else
            <div class="col-md-4 mx-auto mt-10">
                <img class="img-fluid mb-3 mb-md-0" src="{{ asset('assets/images/svg/undraw_Empty_re_opql.svg') }}">
                <p class="nothing-title text-center mt-4">{{ __('No files uploaded') }}</p>
            </div>
            @endif
        </div>
    </div>
</div>

@include('user.files.delete-modal')
@include('user.files.share')
@include('layouts.footer')

@endsection
