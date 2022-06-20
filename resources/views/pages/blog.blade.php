@include('layouts.header', ['page_title' => __('Blog')])

<body class="antialiased bg-home">

    @include('layouts.main')

    <section class="page-banner-section pt-75 pb-75 img-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="banner-content">
                        <h1 class="text-white fw-bold">{{ __('Latest Blog') }}</h1>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}" class="text-white">{{ __('Home') }}</a></li>
                                    <li class="breadcrumb-item text-white active" aria-current="page">{{ __('Blog') }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-8">
        @if(config('settings.blog_top_ads'))
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-md-12 text-center">
                {!! config('settings.blog_top_ads') !!}
            </div>
        </div>
        @endif
        <form action="{{ route('blog') }}" method="GET" class="mb-5">
            <div class="input-icon">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="10" cy="10" r="7"></circle>
                        <line x1="21" y1="21" x2="15" y2="15"></line>
                    </svg>
                </span>
                <input type="text" name="title" class="form-control" placeholder="Search on blog…" aria-label="Search in website">
            </div>
        </form>
        <div class="row">
            @foreach($posts as $post)
            <article class="col-md-4 mb-40" >
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


        @if(config('settings.blog_bottom_ads'))
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-md-12 text-center">
                {!! config('settings.blog_bottom_ads') !!}
            </div>
        </div>
        @endif
    </div>

    @include('layouts.footer')

</body>

</html>