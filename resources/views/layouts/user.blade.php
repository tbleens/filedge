@include('layouts.header')

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white" aria-label="Main navigation">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand">
                <img src="{{ asset('assets/logo/'.config('settings.logo')) }}" alt="logo" width="50">
            </a>
            <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" data-bs-target="#navbarSideCollapseLink" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbarsExampleDefault">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse" id="navbarSideCollapseLink">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item me-4"><a href="{{ route('home') }}/" class="nav-link">{{ __('Home') }}</a></li>
                    @if(!$composerPages->isEmpty())
                    <li class="menu-item-has-children me-4">
                        <a href="#" class="nav-link">{{ __('Pages') }}</a>
                        <ul class="sub-menu">
                            @foreach($composerPages as $page)
                            <li>
                                <a href="{{ route('show.page', $page->slug) }}">{{ $page->title }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @endif
                    <li class="nav-item me-4"><a href="{{ route('blog') }}" class="nav-link">{{ __('Blog') }}</a></li>
                    <li class="nav-item me-4"><a href="{{ route('faq') }}" class="nav-link">{{ __('Faq') }}</a></li>
                    <li class="nav-item me-4"><a href="{{ route('contact') }}" class="nav-link">{{ __('Contact') }}</a></li>
                </ul>
                @guest
                <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">{{ __('Login') }}</a>
                <a href="{{ route('register') }}" class="btn btn-outline-dark">{{ __('Register') }}</a>
                @endguest
                @auth
                <ul class="navbar-nav navbar-right-wrap d-flex nav-top-wrap">
                    <!-- List -->
                    <li class="dropdown ms-2">
                        <a class="rounded-circle" href="#" role="button" id="dropdownUser" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-md avatar-indicators avatar-online">
                                <img alt="avatar" src="{{ asset('assets/images/avatar/myavatar.svg') }}" class="rounded-circle">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                            <div class="px-4 pb-0 pt-2">

                                <div class="lh-1 ">
                                    <h5 class="mb-1">{{ Auth::user()->name }}</h5>
                                </div>
                                <div class=" dropdown-divider mt-3 mb-2"></div>
                            </div>

                            <ul class="list-unstyled">
                                @if(Auth::user()->role)
                                <li>
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home me-2 icon-xxs dropdown-item-icon">
                                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                        </svg> {{ __('Admin') }}
                                    </a>
                                </li>
                                @endif
                                <li>
                                    <a class="dropdown-item" href="{{ route('user.files.list') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text me-2 icon-xxs dropdown-item-icon">
                                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                            <polyline points="14 2 14 8 20 8"></polyline>
                                            <line x1="16" y1="13" x2="8" y2="13"></line>
                                            <line x1="16" y1="17" x2="8" y2="17"></line>
                                            <polyline points="10 9 9 9 8 9"></polyline>
                                        </svg> {{ __('My Files') }}
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('user.account') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings me-2 icon-xxs dropdown-item-icon">
                                            <circle cx="12" cy="12" r="3"></circle>
                                            <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                        </svg> {{ __('Account Settings') }}
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-power me-2 icon-xxs dropdown-item-icon">
                                            <path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path>
                                            <line x1="12" y1="2" x2="12" y2="12"></line>
                                        </svg>{{ __('Sign Out') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                @endauth
            </div>
        </div>
    </nav>


    @yield('content')

    <!-- Scripts -->
    <!-- Libs JS -->
    <script src="{{ asset('assets/libs/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/dist/feather.min.js') }}"></script>
    <script src="{{ asset('assets/libs/prismjs/components/prism-core.min.js') }}"></script>
    <script src="{{ asset('assets/libs/prismjs/components/prism-markup.min.js') }}"></script>
    <script src="{{ asset('assets/libs/prismjs/plugins/line-numbers/prism-line-numbers.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>

    <!-- clipboard -->
    <script src="{{ asset('assets/js/clipboard.min.js') }}"></script>

    <!-- Theme JS -->
    <script src="{{ asset('assets/js/theme.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>


</body>

</html>