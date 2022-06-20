<nav class="navbar-vertical navbar">
    <div class="nav-scroller">
        <!-- Brand logo -->
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/logo/logo.png') }}" alt="" />
        </a>
        <!-- Navbar nav -->
        <ul class="navbar-nav flex-column" id="sideNavbar">
            <li class="nav-item">
                <a class="nav-link has-arrow  active " href="{{ route('dashboard') }}">
                    <i data-feather="home" class="nav-icon icon-xs me-2"></i> {{ __('Dashboard') }}
                </a>
            </li>

            <!-- Nav item -->
            <li class="nav-item">
                <div class="navbar-heading">{{ __('Administration') }}</div>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('files.list') }}">
                    <i data-feather="upload-cloud" class="nav-icon icon-xs me-2">
                    </i>
                    {{ __('All Uploads') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('reports.list') }}">
                    <i data-feather="alert-triangle" class="nav-icon icon-xs me-2">
                    </i>
                    {{ __('Reports') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('ads') }}">
                    <i data-feather="code" class="nav-icon icon-xs me-2">
                    </i>
                    {{ __('Manage Ads') }}
                </a>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link has-arrow  collapsed " href="#!" data-bs-toggle="collapse" data-bs-target="#navFaqs" aria-expanded="false" aria-controls="navFaqs">
                    <i data-feather="copy" class="nav-icon icon-xs me-2">
                    </i> Faqs
                </a>
                <div id="navFaqs" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('faqs.add') }}"> {{ __('Add faq') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('faqs.list') }}"> {{ __('List faqs') }}</a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link has-arrow  collapsed " href="#!" data-bs-toggle="collapse" data-bs-target="#navExtensions" aria-expanded="false" aria-controls="navExtensions">
                    <i data-feather="aperture" class="nav-icon icon-xs me-2">
                    </i> Extensions
                </a>
                <div id="navExtensions" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('extensions.add') }}"> {{ __('Add icon') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('extensions.list') }}"> {{ __('List icons') }}</a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link has-arrow  collapsed " href="#!" data-bs-toggle="collapse" data-bs-target="#navPosts" aria-expanded="false" aria-controls="navPosts">
                    <i data-feather="file-text" class="nav-icon icon-xs me-2">
                    </i> Posts
                </a>
                <div id="navPosts" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('posts.add') }}"> {{ __('Add post') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('posts.list') }}"> {{ __('List posts') }}</a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link has-arrow  collapsed " href="#!" data-bs-toggle="collapse" data-bs-target="#navCategories" aria-expanded="false" aria-controls="navCategories">
                    <i data-feather="hash" class="nav-icon icon-xs me-2">
                    </i> Categories
                </a>
                <div id="navCategories" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categories.add') }}"> {{ __('Add category') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categories.list') }}"> {{ __('List categories') }}</a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link has-arrow collapsed " href="#!" data-bs-toggle="collapse" data-bs-target="#navPages" aria-expanded="false" aria-controls="navPages">
                    <i data-feather="layers" class="nav-icon icon-xs me-2">
                    </i> Pages
                </a>
                <div id="navPages" class="collapse" data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pages.add') }}"> {{ __('Add page') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pages.list') }}"> {{ __('List pages') }}</a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link has-arrow  collapsed " href="#!" data-bs-toggle="collapse" data-bs-target="#navUsers" aria-expanded="false" aria-controls="navUsers">
                    <i data-feather="users" class="nav-icon icon-xs me-2">
                    </i> Users
                </a>
                <div id="navUsers" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('users.add') }}"> {{ __('Add user') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " href="{{ route('users.list') }}"> {{ __('List users') }}</a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link has-arrow  collapsed " href="#!" data-bs-toggle="collapse" data-bs-target="#navTranslations" aria-expanded="false" aria-controls="navTranslations">
                    <i data-feather="repeat" class="nav-icon icon-xs me-2">
                    </i> {{ __('Translations') }}
                </a>
                <div id="navTranslations" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('translations.add') }}">{{ __('Add translation') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " href="{{ route('translations.list') }}">{{ __('List translation') }}</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link has-arrow  collapsed " href="#!" data-bs-toggle="collapse" data-bs-target="#navStorage" aria-expanded="false" aria-controls="navStorage">
                    <i data-feather="cloud" class="nav-icon icon-xs me-2">
                    </i> {{ __('Storage') }}
                </a>
                <div id="navStorage" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('settings.storage.amazon') }}">{{ __('Amazon S3') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " href="{{ route('settings.storage.wasabi') }}">{{ __('Wasabi') }}</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link has-arrow collapsed" href="#!" data-bs-toggle="collapse" data-bs-target="#navSettings" aria-expanded="false" aria-controls="navSettings">
                    <i data-feather="lock" class="nav-icon icon-xs me-2">
                    </i> Settings
                </a>
                <div id="navSettings" class="collapse" data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('settings.general') }}"> {{ __('General') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('settings.email') }}"> {{ __('Email (Smtp)') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('settings.appareance') }}"> {{ __('Appareance') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('settings.captcha') }}"> {{ __('Recaptcha') }} </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('settings.facebook.login.api') }}"> {{ __('Facebook Login Api') }} </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('settings.pages') }}"> {{ __('Privacy and Social link') }} </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>

    </div>
</nav>