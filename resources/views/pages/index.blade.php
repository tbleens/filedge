@extends('layouts.user')

@section('title', $page->title)

@section('content')

<section class="page-banner-section pt-75 pb-75 img-bg" style="background-image: url({{ asset('assets/images/svg/background_blog.svg') }});">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="banner-content">
                    <h1 class="text-white fw-bold text-center">{{ $page->title }}</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container-fluid px-6 py-4">
    <div class="row mt-6">
        <div class="offset-xl-2 col-xl-8 offset-lg-1 col-lg-10 col-md-12 col-12">
            <div class="row">
                <div class="col-12 mb-6">
                    <!-- card  -->
                    <div class="card">
                        <!-- card body  -->
                        <div class="card-body">
                            <p>{!! $page->content !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection