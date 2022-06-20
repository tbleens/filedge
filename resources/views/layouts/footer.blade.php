<footer class="footer">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4 box d-flex align-items-center justify-content-center">
                <span class="copyright quick-links">{{ __('Copyright &copy; Your Website') }} <script>
                        document.write(new Date().getFullYear())
                    </script>
                </span>
            </div>
            <div class="col-md-4 box">
                <ul class="list-inline social-buttons">
                    <li class="list-inline-item">
                        <a href="{{ config('settings.twitter_link') }}">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{ config('settings.facebook_link') }}">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{ config('settings.linkedin_link') }}">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 box d-flex align-items-center justify-content-center">
                <ul class="list-inline quick-links">
                    <li class="list-inline-item">
                        <a href="{{ config('settings.privacy_policy_link') }}">{{ __('Privacy Policy') }}</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{ config('settings.term_service_link') }}">{{ __('Terms of Use') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script>
    var loc = window.location;
    
    $('.bg-home .navbar-nav').find('a').each(function() {
        $(this).toggleClass('active fw-bold', $(this).attr('href') == loc);
    });
</script>

