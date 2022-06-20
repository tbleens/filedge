@include('layouts.header', ['page_title' => __('Contact')])

<body class="antialiased bg-home">

    @include('layouts.main')

    <section class="page-banner-section pt-75 pb-75 img-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="banner-content">
                        <h1 class="text-white fw-bold text-center">Contact</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container my-6">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <!-- card body -->
                    <div class="card-body contact-shadow-box">
                        <form action="{{ route('contact') }}" method="POST">
                            @csrf

                            @if (Session::has('success'))
                            <div class="alert alert-success mb-2 mt-2" role="alert">
                                {{ Session::get('success') }}
                            </div>
                            @endif

                            <div class="mb-2">
                                <label for="name" class="col-sm-4 col-form-label form-label">{{ __('Name') }}</label>
                                <input type="text" class="form-control" name="name" placeholder="Name" id="name" required="">
                            </div>
                            <div class="mb-2">
                                <label for="email" class="col-sm-4 col-form-label form-label">{{ __('Email') }}</label>
                                <input type="text" class="form-control" name="email" placeholder="Email" id="email" required="">
                            </div>
                            <div class="mb-2">
                                <label for="subject" class="col-sm-4 col-form-label form-label">{{ __('Subject') }}</label>
                                <input type="text" class="form-control" name="subject" placeholder="Subject" id="subject" required="">
                            </div>
                            <div class="mb-2">
                                <label for="message" class="col-sm-4 col-form-label form-label">{{ __('Message') }}</label>
                                <textarea name="message" id="message" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="offset-md-4 col-md-8 col-12 mt-3">
                                <button type="submit" class="btn btn-primary">{{ __('Send Message') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')

</body>

</html>