@include('layouts.header', ['page_title' => __('Blog')])

<body class="antialiased bg-home">

    @include('layouts.main')

    <main>
        <div class="entry-header entry-header-style-2 pb-80 pt-80 mb-50 text-white" style="background-image: url({{ asset('assets/posts/'.$post->image) }});">
            <div class="entry-header-content">
                <h1 class="entry-title mb-50 fw-700">
                    {{ $post->title }}
                </h1>
                <div class="post-meta-1 mb-20">
                    <span class="fw-bold ms-2">{{ __('Date') }} : </span>
                    <span class="post-date text-white font-md">{{ $post->created_at }}</span>
                </div>
            </div>
        </div>

        <div class="container single-content">
            <div class="row">
                <div class="col-lg-8">
                    <!--figure-->
                    <article class="entry-wraper mb-50">

                        <div class="entry-main-content">
                            {!! $post->content !!}
                        </div>
                        <div class="entry-bottom mb-30 mt-4">
                            <div class="single-social-share clearfix mb-15 wn-50 w-sm-100">
                                <ul class="header-social-network d-inline-block list-inline float-md-right mt-md-0 mt-4">
                                    <li class="list-inline-item text-muted"><span>{{ __('Share this :') }} </span></li>
                                    <li class="list-inline-item"><a href="https://twitter.com/intent/tweet?text=Twitter Text&url={{ url()->current() }}"><i class="fab fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="list-inline-item"><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&title=LinkedIn%20Title&summary=LinkedIn%20Summary&source={{ url('/') }}"><i class="fab fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>

                    </article>
                </div>
                <div class="col-lg-4 primary-sidebar sticky-sidebar mb-5">

                    <div class="sidebar">
                        <div class="sidebar-widget widget-popular-posts mb-50">
                            <div class="widget-header-1 position-relative mb-30">
                                <h5 class="mt-5 mb-30">{{ __('Most popular') }}</h5>
                            </div>
                            <div class="post-block-list post-module-1">
                                <ul class="list-post">
                                    @foreach($mostPopularPosts as $mostPopularPost)
                                    <li >
                                        <div class="d-flex latest-small-thumb">
                                            <div class="post-thumb d-flex mr-15 border-radius-10 img-hover-scale overflow-hidden">
                                                <a class="color-white" href="{{ route('view.blog.post', $mostPopularPost->id) }}" tabindex="0">
                                                    <img src="{{ asset('assets/posts/'.$mostPopularPost->image) }}" alt="{{ $mostPopularPost->title }}">
                                                </a>
                                            </div>
                                            <div class="post-content media-body align-self-center">
                                                <h5 class="post-title mb-15 text-limit-3-row font-medium">
                                                    <a href="{{ route('view.blog.post', $mostPopularPost->id) }}">{{ getLimitContent($mostPopularPost->title, 40) }}</a>
                                                </h5>
                                                <div class="entry-meta meta-1 float-left font-sm">
                                                    <span class="post-on has-dot">{{ $mostPopularPost->created_at }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--container-->
        </div>
    </main>

    @include('layouts.footer')

</body>

</html>