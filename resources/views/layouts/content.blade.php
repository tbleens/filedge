@include('layouts.header')

<body>

    <div id="db-wrapper">

        @include('layouts.sidebar')

        <div id="page-content">

            @include('layouts.navbar')

            @yield('content')

        </div>

    </div>

    <!-- Scripts -->
    <!-- Libs JS -->
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/dist/feather.min.js') }}"></script>
    <script src="{{ asset('assets/libs/prismjs/components/prism-core.min.js') }}"></script>
    <script src="{{ asset('assets/libs/prismjs/components/prism-markup.min.js') }}"></script>
    <script src="{{ asset('assets/libs/prismjs/plugins/line-numbers/prism-line-numbers.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/libs/checkeditor/ckeditor.js') }}"></script>

    <!-- clipboard -->
    <script src="{{ asset('assets/js/clipboard.min.js') }}"></script>

    <!-- Theme JS -->
    <script src="{{ asset('assets/js/theme.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @yield('scripts')

</body>

</html>