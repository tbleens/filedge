@include('layouts.header', ['home_title' => config('settings.home_title')])

<body class="antialiased bg-home">

    @include('layouts.main')

    <div class="container">
        <div class="row my-8 py-6">
            <div class="col-md text-center text-md-left">
                <h1 class="fw-bold">
                    {{ __('Upload & Sharing your Images, videos, music and docs') }}
                </h1>
                <p class="lead">
                    {{ __('Upload or sharing files for') }} <span class="font-weight-bold position-relative d-inline-block">{{ __('free') }}<span class="underline"></span></span>
                </p>

                <div class="mt-4 mt-md-5 mb-2 mb-md-3 mb-lg-5">
                    <div class="home-start-sample position-relative mx-auto">
                        <div class="position-relative" data-controller="animation-demo">
                            <div class="position-absolute animation-demo-image" data-target="animation-demo.transparent">
                                <img class="img-fluid position-relative z-index-12" data-target="animation-demo.transparentInner" ondragstart="return false;" src="{{ asset('assets/images/svg/undraw_my_files_swob.svg') }}">
                                <div class="animation-demo-image transparency-grid position-absolute animation-demo-image-hidden" data-target="animation-demo.grid"></div>
                            </div>

                            <div class="position-relative animation-demo-image animation-demo-image-hidden z-index-10" data-target="animation-demo.original">
                                <img class="img-fluid" ondragstart="return false;" src="{{ asset('assets/images/svg/undraw_my_files_swob.svg') }}">
                            </div>
                        </div>

                        <div class="sprite-mobile-small sprite sprite-triangle-equi"></div>
                        <div class="sprite-mobile-small sprite sprite-circle"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-1 d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="88.209" height="98.922" viewBox="0 0 88.209 98.922" class="home-start-upload-arrow sprite sprite-arrow">
                    <path d="M79.79,93.774l-2.981,1.17-1.641.6-3.195,1.112c-4.176,1.41-8,2.525-11.282,3.3-6.561,1.548-10.941,1.733-11.585.189s2.569-4.527,8.285-8.1c2.425-1.516,5.322-3.141,8.544-4.8A57.408,57.408,0,0,1,48.179,81.8,60.135,60.135,0,0,1,38.5,75.7,58.62,58.62,0,0,1,29.7,67.015,61.125,61.125,0,0,1,18.809,46.249a68.736,68.736,0,0,1-3.02-18.388A53.086,53.086,0,0,1,15.95,20.8c.086-1.034.147-1.993.287-2.873s.3-1.682.466-2.4c.65-2.878,1.407-4.432,2.244-4.431s1.676,1.547,2.473,4.275c.2.682.4,1.438.589,2.264l.7,2.662c.488,1.9.9,4.068,1.571,6.4a110.967,110.967,0,0,0,5.058,15.825,66.468,66.468,0,0,0,9.768,16.843,60.866,60.866,0,0,0,6.913,7.144,67.012,67.012,0,0,0,7.545,5.506,78,78,0,0,0,14.7,6.927c.152.054.3.1.446.155-2.663-3.208-4.966-6.216-6.789-8.867-3.819-5.554-5.579-9.57-4.372-10.73s5.15.754,10.551,4.788c2.7,2.017,5.765,4.563,9.034,7.52L79.622,74.1l1.268,1.2,2.267,2.26c3.354,3.371,6.86,6.955,10.378,10.614C88.855,90.127,84.209,92.018,79.79,93.774Z" transform="translate(-16.963 0.383) rotate(-7)" fill="currentColor"></path>
                </svg>
            </div>
            <div class="col-md d-flex">
                <div class="pl-md-1n position-relative min-with-100">

                    <div id="uploadArea" class="upload-area">
                        <div class="upload-area__header">
                            <h1 class="upload-area__title">{{ __('Upload your file') }}</h1>
                            <p class="upload-area__paragraph">
                                {{ __('Your file must not exceed') }} {{ formatBytes(config('settings.max_file_size')) }}
                            </p>
                        </div>

                        <div class="dropzone dropzone-queue upload-area__drop-zoon border-0n mb-2" id="kt_dropzonejs_file">
                            <!--begin::Controls-->
                            <div class="drop-zoon__icon">
                                <i class="bi bi-file-earmark-arrow-up-fill"></i>
                            </div>
                            <!--end::Controls-->

                        </div>
                        <!--begin::Items-->
                        <div class="dropzone-items wm-200px mt-3">
                            <div class="dropzone-item my-4" style="display:none">
                                <!--begin::File-->
                                <div class="dropzone-file mb-2">
                                    <div class="dropzone-filename">
                                        <span data-dz-name class="text-overflow"></span>
                                        <strong></strong>
                                        <span class="dropzone-delete" data-dz-remove><i class="bi bi-x"></i></span>
                                    </div>

                                    <div class="dropzone-error alert alert-danger d-none" data-dz-errormessage></div>
                                </div>
                                <!--end::File-->

                                <!--begin::Progress-->
                                <div class="dropzone-progress">
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Progress-->

                                <div class="mt-3 copy-download text-start" style="display: none">
                                    <label class="form-label" for="share">{{ __('Share link') }}</label>
                                    <div class="input-group">
                                        <input type="text" id="share" class="form-control sharing_input" value="">
                                        <button type="button" class="btn btn-primary copy-btn" data-clipboard-target="#share">
                                            <i class="bi bi-clipboard"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--end::Items-->
                    </div>

                </div>
            </div>
        </div>
    </div>

    <section class="home-section pb-5">
        <div class="container">
            @if(config('settings.home_top_ads'))
            <div class="row justify-content-center mt-5 mb-6rem">
                <div class="col-md-12 text-center">
                    {!! config('settings.home_top_ads') !!}
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-md d-flex align-items-center">
                    <div class="home-section-content">
                        <h2 class="mb-4">
                            {{ __('Multiple uploads & Unlimited storage') }}
                        </h2>
                        <div class="lead">
                            <p><span class="">{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec libero at tellus gravida luctus. Nunc congue eros diam, nec eleifend lorem porttitor eu.') }}</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <img class="img-fluid mb-3 mb-md-0" src="{{ asset('assets/images/svg/undraw_going_up_ttm5.svg') }}">
                </div>
            </div>
        </div>
    </section>
    <section class="home-section py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <img class="img-fluid mb-3 mb-md-0" src="{{ asset('assets/images/svg/undraw_uploading_go67.svg') }}">
                </div>
                <div class="col-md d-flex align-items-center">
                    <div class="home-section-content">
                        <h2 class="mb-4">
                            {{ __('Manage files & Share anywhere') }}
                        </h2>
                        <div class="lead">
                            <p><span class="">{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nec libero at tellus gravida luctus. Nunc congue eros diam, nec eleifend lorem porttitor eu.') }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section_get_started">
        <h1>{{ __('Upload or sharing files for free') }}</h1>
        <a href="{{ route('register') }}" class="btn btn-light">{{ __('Get started today') }}</a>
    </section>

    @if(!$posts->isEmpty())
    <section class="container py-5 my-5">
        <h1 class="section-title">{{ __('Our blog') }}</h1>
        <div class="title-line"></div>
        <div class="row">
            @foreach($posts as $post)
            <article class="col-md-4 mb-40">
                <div class="post-card-1 border-radius-10 hover-up shadow-box">
                    <div class="post-thumb thumb-overlay img-hover-slide position-relative" style="background-image: url({{ asset('assets/posts/'.$post->image) }})">
                        <a class="img-link" href="{{ route('view.blog.post', $post->id) }}"></a>
                    </div>
                    <div class="post-content p-30">
                        <div class="post-card-content">
                            <div class="entry-meta meta-1 float-left font-md mb-10">
                                <span class="post-on has-dot">{{ $post->created_at }}</span>
                            </div>
                            <h5 class="post-title font-md">
                                <a href="{{ route('view.blog.post', $post->id) }}">{{ getLimitContent($post->title, 40) }}</a>
                            </h5>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </section>
    @endif

    @if(config('settings.home_bottom_ads'))
    <div class="container">
        <div class="row justify-content-center mt-5 mb-6rem">
            <div class="col-md-12 text-center">
                {!! config('settings.home_bottom_ads') !!}
            </div>
        </div>
    </div>
    @endif

    @include('layouts.footer')
    <!-- clipboard -->
    <script src="{{ asset('assets/js/clipboard.min.js') }}"></script>

    <script>
        "use scrict";
        const SITE_URL = "{{ url('/') }}";
        const max_file_size = "{{ formatBytesWithOutText(config('settings.max_file_size')) }}";
        const format_max_file_size = "{{ formatBytes(config('settings.max_file_size')) }}";
        // UploadListener();
        var o = new Clipboard('.copy-btn');
        // $(document).ready(function() {
        // });
    </script>

    <script src="{{ asset('assets/libs/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>