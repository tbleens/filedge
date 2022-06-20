@include('layouts.header')

<body>
    <!-- Error page -->
    <div class="container min-vh-100 d-flex justify-content-center
      align-items-center">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-12">
                <!-- content -->
                <div class="text-center">
                    <div class="mb-3">
                        <!-- img -->
                        <img src="{{ asset('assets/images/error/404-error-img.png') }}" alt="" class="img-fluid">
                    </div>
                    <!-- text -->
                    <h1 class="display-4 fw-bold">{{ __('Oops! the page not found.') }}</h1>
                    <p class="mb-4">{{ __('Or simply leverage the expertise of our consultation team.') }}</p>
                    <!-- button -->
                    <a href="{{ route('home') }}" class="btn btn-primary">{{ __('Go Home') }}</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>