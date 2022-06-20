@extends('layouts.content')

@section('title', __('Files'))

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
                        <h3 class="mb-0 fw-bold">{{ __('Manages Ads') }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- card  -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
            @endif
            <form action="{{ route('ads') }}" method="post">
                <div class="card">
                    <ul class="nav nav-line-bottom" id="pills-tab-navbar-only-logo" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-page-tab" data-bs-toggle="pill" href="#pills-home-page" role="tab" aria-controls="pills-navbar-only-logo-design" aria-selected="true">{{ __('Home Page') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-download-page-tab" data-bs-toggle="pill" href="#pills-download-page" role="tab" aria-controls="pills-navbar-only-logo-html" aria-selected="false">{{ __('Download Page') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-blog-page-tab" data-bs-toggle="pill" href="#pills-blog-page" role="tab" aria-controls="pills-navbar-only-logo-html" aria-selected="false">{{ __('Blog Page') }}</a>
                        </li>
                    </ul>

                    @csrf

                    <!-- Tab content -->
                    <div class="tab-content p-4" id="pills-tabContent-navbar-only-logo">
                        <div class="tab-pane tab-home-page fade show active" id="pills-home-page" role="tabpanel" aria-labelledby="pills-navbar-only-logo-design-tab">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>{{ __('Top Ads') }} :</label>
                                        <textarea name="home_top_ads" id="home_top_ads" rows="7" class="form-control">{{ config('settings.home_top_ads') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>{{ __('Bottom Ads') }} :</label>
                                        <textarea name="home_bottom_ads" id="home_bottom_ads" rows="7" class="form-control">{{ config('settings.home_bottom_ads') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane tab-download-page fade" id="pills-download-page" role="tabpanel" aria-labelledby="pills-navbar-only-logo-html-tab">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>{{ __('Top Ads') }} :</label>
                                        <textarea name="download_top_ads" id="download_top_ads" rows="7" class="form-control">{{ config('settings.download_top_ads') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>{{ __('Right Ads') }} :</label>
                                        <textarea name="download_right_ads" id="download_right_ads" rows="7" class="form-control">{{ config('settings.download_right_ads') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane tab-blog-page fade" id="pills-blog-page" role="tabpanel" aria-labelledby="pills-navbar-only-logo-html-tab">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>{{ __('Top Ads') }} :</label>
                                        <textarea name="blog_top_ads" id="blog_top_ads" rows="7" class="form-control">{{ config('settings.blog_top_ads') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>{{ __('Right Ads') }} :</label>
                                        <textarea name="blog_bottom_ads" id="blog_bottom_ads" rows="7" class="form-control">{{ config('settings.blog_bottom_ads') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2 col-6 mx-auto mt-4">
                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection