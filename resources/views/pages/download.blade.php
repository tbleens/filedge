@include('layouts.header', ['page_title' => __('Download')])

<body class="antialiased bg-home">

    @include('layouts.main')

    <div class="container">
        <div class="row mt-8 download_page">
            @if(config('settings.download_top_ads'))
            <div class="download_top_ad d-none d-md-block mx-auto mb-3 with-728">
                <div class="col-auto d-none d-md-flex">
                    {!! config('settings.download_top_ads') !!}
                </div>
            </div>
            @endif
            <div class="col-md-12">
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
                @endif

                <div class="row bg-download-box py-4">
                    <div class="col-md-9 dfile d-flex">
                        <div class="me-2">
                            @if($uploadDetails->extension)
                            <img src="{{ asset('assets/images/icons/'.$uploadDetails->extension->file_icon) }}" width="60" height="60">
                            @else
                            <img src="{{ asset('assets/images/icons/unknown.png') }}" width="60" height="60">
                            @endif
                        </div>
                        <div class="d-flex flex-column justify-content-around">
                            <span class="filename">{{ getLimitContent($uploadDetails->original_filename, 100) }}</span>
                            <div class="upinfo">
                                <span class="report">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#reports" class="dl-reports">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-flag">
                                            <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path>
                                            <line x1="4" y1="22" x2="4" y2="15"></line>
                                        </svg> {{ __('Report abuse') }}
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 size d-flex align-items-center mt-max-md-1">
                        <div id="commonId" class="download_section">
                            <button type="button" id="downloadbtn" data-id="{{ $uploadDetails->file_id }}" class="downloadbtn btn btn-primary btn-block py-3">
                            {{ __('Download File') }} ({{ formatBytes($uploadDetails->file_size) }})
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row my-6">
                    <div class="col-md-6">
                        <ul class="list-group bg-white no-rounded">
                            <li class="list-group-item do-cap-link"><strong>{{ __('File name') }} :</strong><span class="float-end">{{ $uploadDetails->original_filename }}</span></li>
                            <li class="list-group-item do-cap-link"><strong>{{ __('File format') }} :</strong><span class="float-end">{{ $uploadDetails->file_type }}</span></li>
                            <li class="list-group-item do-cap-link"><strong>{{ __('Downloads') }} :</strong><span class="float-end">{{ $uploadDetails->downloads }}</span></li>
                            <li class="list-group-item do-cap-link"><strong>{{ __('Upload date') }} :</strong><span class="float-end">{{ $uploadDetails->updated_at }}</span></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <img class="img-fluid mb-3 mb-md-0" src="{{ asset('assets/images/svg/undraw_Data_report_re_p4so.svg') }}">
                    </div>
                    <div class="col-md-12">
                        <div class="download-link">
                            <div class="mb-3">
                                <h4 class="mb-2">{{ __('Share link') }}</h4>
                                <div class="input-group">
                                    <input type="text" id="share" class="form-control" value="{{ url()->current() }}">
                                    <button type="button" class="btn btn-primary copy-btn" data-clipboard-target="#share">
                                        <i class="bi bi-clipboard"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <h3 class="mb-4 fw-bolder">{{ __('Embed') }}</h3>
                                <h5>{{ __('HTML') }}</h5>
                                <textarea class="form-control" name="html" id="html" cols="30" rows="3" readonly="">&lt;a href="{{ url()->current() }}"&gt;Download&lt;/a&gt;</textarea>
                                <h5 class="mt-4">{{ __('BB Code') }}}</h5>
                                <textarea class="form-control sharelink" name="html" id="html" cols="30" rows="3" readonly="">[url={{ url()->current() }}]Download[/url] </textarea>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row mt-3 mb-6">
            <div class="col-md-8">
                <h4>What is Novashare ?</h4>
                <p>Novashare is a file hosting provider. We offer online storage/remote backup capacity, sophisticated uploading and downloading tools.
                    With Novashare you can host files, images, videos, audio and flash on the same place.</p>

                <br>

                <h4>Why should I use Novashare?</h4>
                <p>Whenever you need to send a file that is too large for e-mail, Novashare can help. If you need secure remote storage capacity for off-site backups, Novashare offers solutions for you. If you want to access personal data from a variety of computers and don't want to carry around a USB stick, Novashare is a perfect way of doing so. You can also share files with anyone you choose to, as well as keep it for yourself as a backup or to download from anywhere in the world.</p>
                <br><br>
            </div>

            @if(config('settings.download_right_ads'))
            <div class="col-lg-4">
                <div class="download_left_ad d-none d-md-block">
                    <div class="col-auto d-none d-md-flex">
                        {!! config('settings.download_right_ads') !!}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    @include('pages.reports-add', ['file_id' => $uploadDetails->file_id])

    @include('layouts.footer')

    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/libs/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!-- clipboard -->
    <script src="{{ asset('assets/js/clipboard.min.js') }}"></script>

    <script>
        "use scrict";
        const SITE_URL = "{{ url('/') }}";
        var o = new Clipboard('.copy-btn');
    </script>

</body>

</html>