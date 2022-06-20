@include('layouts.header', ['page_title' => __('Contact')])

<body class="antialiased bg-home">

    @include('layouts.main')

    <section class="page-banner-section pt-75 pb-75 img-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="banner-content">
                        <h1 class="text-white fw-bold text-center">FAQ</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(!$faqs->isEmpty())
    <section class="faq-section pt-4 pb-8" id="faq">
        <div class="container mb-8" data-aos="fade-up">
            <header class="section-header">
                <h2>{{ __('Frequently Asked Questions') }}</h2>
            </header>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="accordion accordion-flush" id="faqlist1">
                        @foreach($faqs as $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-{{$faq->id}}">
                                    {{ $faq->question }}
                                </button>
                            </h2>
                            <div id="faq-content-{{$faq->id}}" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                                <div class="accordion-body">
                                    {{ $faq->answer }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    @include('layouts.footer')

</body>

</html>