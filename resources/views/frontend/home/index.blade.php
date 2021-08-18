<!DOCTYPE html>
<html
    dir="@if (session()->has('language_direction_from_dropdown')) @if(session()->get('language_direction_from_dropdown') == 1) {{ __('rtl') }} @else {{ __('ltr') }} @endif @else {{ __('ltr') }} @endif"
    lang="@if (session()->has('language_code_from_dropdown')){{ str_replace('_', '-', session()->get('language_code_from_dropdown')) }}@else{{ str_replace('_', '-',   $language->language_code) }}@endif">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="@if (isset($general_seo)){{ $general_seo->site_name }} @endif">
    <meta name="description" content="@if (isset($general_seo)){{ $general_seo->site_desc }} @endif">
    <meta name="keywords" content="@if (isset($general_seo)){{ $general_seo->site_keywords }} @endif">
    <meta name="author" content="simsiyeka">
    <meta property="fb:app_id" content="@if (isset($general_seo)){{ $general_seo->fb_app_id }} @endif">
    <meta property="og:title" content="@if (isset($general_seo)){{ $general_seo->site_name }} @endif">
    <meta property="og:url" content="@if (isset($general_seo)){{ url()->current() }} @endif">
    <meta property="og:description" content="@if (isset($general_seo)){{ $general_seo->site_desc }} @endif">
    <meta property="og:image"
          content="@if (!empty($general_site_image->favicon_image)){{ asset('uploads/img/general/'.$general_site_image->favicon_image) }} @endif">
    <meta itemprop="image"
          content="@if (!empty($general_site_image->favicon_image)){{ asset('uploads/img/general/'.$general_site_image->favicon_image) }} @endif">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image"
          content="@if (!empty($general_site_image->favicon_image)){{ asset('uploads/img/general/'.$general_site_image->favicon_image) }} @endif">
    <meta property="twitter:title" content="@if (isset($general_seo)){{ $general_seo->site_name }} @endif">
    <meta property="twitter:description" content="@if (isset($general_seo)){{ $general_seo->site_desc }} @endif">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{ __('frontend.home') }} @if (isset($general_seo)) - {{ $general_seo->site_name }} @endif</title>

@if (!empty($general_site_image->favicon_image))
    <!-- Favicon -->
        <link href="{{ asset('uplods/img/general/'.$general_site_image->favicon_image) }}" sizes="128x128"
              rel="shortcut icon" type="image/x-icon"/>
        <link href="{{ asset('uploads/img/general/'.$general_site_image->favicon_image) }}" sizes="128x128"
              rel="shortcut icon"/>
@else
    <!-- Favicon -->
        <link href="{{ asset('uplods/img/dummy/favicon.png') }}" sizes="128x128" rel="shortcut icon"
              type="image/x-icon"/>
        <link href="{{ asset('uploads/img/dummy/favicon.png') }}" sizes="128x128" rel="shortcut icon"/>
@endif


<!-- Theme Css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css') }}">

    <!-- Dynamic Css -->
    <style>
        @if (!empty($site_info->address) && empty($site_info->email))
            .header-top-area .header-top-left-part .address:after {
            display: none;
        }
        @endif
    </style>

@if (isset($google_analytic))
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async
                src="https://www.googletagmanager.com/gtag/js?id={{ $google_analytic->google_analytic }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }

            gtag('js', new Date());

            gtag('config', '{{ $google_analytic->google_analytic }}');
        </script>
    @endif

</head>
<body>

@if ($section_arr['preloader'] == 1)
    <!-- Preloader Start -->
    <div class="preloader"></div>
    <!-- Preloader End -->
@endif
<!-- header Start test -->
<header class="header-style-two" data-scroll-index="0">
    <div class="header-wrapper">
        <div class="header-top-area bg-gradient-color d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 header-top-left-part">
                        @if (!empty($site_info->address)) <span class="address" data-toggle="tooltip"
                                                                data-placement="top"
                                                                title="{{ $site_info->address }}"><i
                                class="webexflaticon flaticon-placeholder-1"></i> {{ \Illuminate\Support\Str::limit($site_info->address, 30, $end='...') }}</span> @endif
                        @if (!empty($site_info->email)) <span class="phone"><i class="webexflaticon flaticon-send"></i> {{ $site_info->email }}</span> @endif
                    </div>
                    <div class="col-lg-6 header-top-right-part text-right">
                        <ul class="social-links">
                            @foreach($socials as $social)
                                <li><a href="{{ $social->link }}" target="_blank"><i
                                            class="{{ $social->social_media }}"></i></a></li>
                            @endforeach
                        </ul>
                        @if (count($display_dropdowns) > 0)
                            <div class="language">
                                <a class="language-btn" href="#"><i class="webexflaticon flaticon-internet"></i>
                                    @if (session()->has('language_name_from_dropdown')) {{ session()->get('language_name_from_dropdown') }} @else {{ $language->language_name }} @endif
                                </a>
                                <ul class="language-dropdown">
                                    @foreach ($display_dropdowns as $display_dropdown)
                                        <li>
                                            <a href="{{ url('language/set-locale/'.$display_dropdown->id) }}">{{ $display_dropdown->language_name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="header-navigation-area two-layers-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <a class="navbar-brand logo f-left mrt-10 mrt-md-0" href="{{ url('/') }}">
                            @if (!empty($general_site_image->site_white_logo_image))
                                <img id="logo-image" class="img-center"
                                     src="{{ asset('uploads/img/general/'.$general_site_image->site_white_logo_image) }}"
                                     alt="logo image">
                            @else
                                <img id="logo-image" class="img-center"
                                     src="{{ asset('uploads/common_dummy/logo.png') }}" alt="logo image">
                            @endif
                        </a>
                        <div class="mobile-menu-right"></div>
                        <div class="header-searchbox-style-two d-none d-xl-block">
                            <div class="side-panel side-panel-trigger text-right d-none d-lg-block">
                                <span class="bar1"></span>
                                <span class="bar2"></span>
                                <span class="bar3"></span>
                            </div>

                            <div class="toggle-searchbox">
                                <form id="searchform-all" action="{{ route('blog-page.search') }}" method="POST">
                                    @csrf
                                    <div>
                                        <input type="text" id="s" class="form-control" name="search"
                                               placeholder="{{ __('frontend.search') }}" required>
                                        <div class="input-box">
                                            <button type="submit" id="searchsubmit"><i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="side-panel-content">
                            <div class="close-icon">
                                <button><i class="webex-icon-cross"></i></button>
                            </div>
                            <div class="side-panel-logo mrb-30">
                                <a href="{{ url('/') }}">
                                    @if (!empty($general_site_image->site_white_logo_image))
                                        <img
                                            src="{{ asset('uploads/img/general/'.$general_site_image->site_white_logo_image) }}"
                                            alt="logo image">
                                    @else
                                        <img src="{{ asset('uploads/common_dummy/logo.png') }}" alt="logo image"
                                             style="height: 72px;">
                                    @endif
                                </a>
                            </div>
                            <div class="side-info mrb-30">
                                <div class="side-panel-element mrb-25">
                                    <h4 class="mrb-10">{{ __('frontend.office_address') }}</h4>
                                    <ul class="list-items">
                                        @if (!empty($site_info->address))
                                            <li><span class="fa fa-map-marker-alt mrr-10 text-primary-color"></span><a
                                                    href="@if (!empty($site_info->address_map_link)) {{ $site_info->address_map_link }} @else # @endif">{{ $site_info->address }}</a>
                                            </li> @endif
                                        @if (!empty($site_info->email))
                                            <li><span
                                                    class="fas fa-envelope mrr-10 text-primary-color"></span>{{ $site_info->email }}
                                            </li> @endif
                                        @if (!empty($site_info->phone))
                                            <li><span
                                                    class="fas fa-phone-alt mrr-10 text-primary-color"></span>{{ $site_info->phone }}
                                            </li> @endif
                                    </ul>
                                </div>
                            </div>
                            <h4 class="mrb-15">{{ __('frontend.social_list') }}</h4>
                            <ul class="social-list">
                                @foreach ($socials as $social)
                                    <li><a href="@if (!empty($social->link)) {{ $social->link }} @else # @endif"><i
                                                class="{{ $social->social_media }}"></i></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="main-menu f-right">
                            <nav id="mobile-menu-right">
                                <ul class="one-pagenav">
                                    <li><a href="#home" data-scroll-nav="0" style="padding-left: 40px"><i
                                                class="fa fa-home"></i> {{ __('frontend.home') }}</a></li>
                                    @if ($section_arr['about_section'] == 1)
                                        <li><a href="#about" data-scroll-nav="1" style="padding-left: 40px"><i
                                                    class="fa fa-info-circle"></i> {{ __('frontend.about') }}</a>
                                        </li> @endif
                                    @if ($section_arr['contact_section'] == 1)
                                        <li><a href="#contact" data-scroll-nav="6" style="padding-left: 40px"><i
                                                    class="fa fa-at"></i> {{ __('frontend.contact') }}</a>
                                        </li> @endif

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header End -->


<!-- Home Slider Start -->
@if (count($sliders) > 0)
    <section id="home" class="banner-section">
        <div class="home-carousel owl-theme owl-carousel">
            @foreach ($sliders as $slider)
                <div class="slide-item">
                    <div class="image-layer"
                         data-background="{{ asset('uploads/img/sliders/'.$slider->slider_image) }}"></div>
                    <div class="auto-container">
                        <div class="row clearfix">
                            <div class="col-xl-8 col-lg-12 col-md-12 content-column">
                                <div class="content-box">
                                    <h1>{{ $slider->title }}</h1>
                                    <p>{{ $slider->desc }}</p>
                                    @if (!empty($slider->btn_name))
                                        <div class="btn-box">
                                            <a href="@if (!empty($slider->btn_link)) {{ $slider->btn_link }} @else # @endif"
                                               class="cs-btn-one btn-gradient-color">{{ $slider->btn_name }}</a>
                                        </div>
                                    @elseif (empty($slider->btn_name) && empty($slider->btn_link) && $section_arr['contact_section'] == 1)
                                        <div class="btn-box">
                                            <a href="#contact" data-scroll-nav="6"
                                               class="cs-btn-one btn-gradient-color">{{ __('frontend.contact_us') }}</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@else
    <section id="home" class="banner-section">
        <div class="home-carousel owl-theme owl-carousel">
            <div class="slide-item">
                <div class="image-layer" data-background="{{ asset('uploads/common_dummy/1920x1080.jpg') }}"></div>
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-xl-8 col-lg-12 col-md-12 content-column">
                            <div class="content-box">
                                <h1>Make a Good Plan & <br> Grow Your Business</h1>
                                <p>We have almost 35+ years of experience for <br>providing consulting services
                                    solutions</p>
                                <div class="btn-box">
                                    <a href="#" class="cs-btn-one btn-gradient-color">Get a Quote</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-item">
                <div class="image-layer" data-background="{{ asset('uploads/common_dummy/1920x1080.jpg') }}"></div>
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-xl-8 col-lg-12 col-md-12 content-column">
                            <div class="content-box">
                                <h1>Make a Good Plan & <br> Grow Your Business</h1>
                                <p>We have almost 35+ years of experience for <br>providing consulting services
                                    solutions</p>
                                <div class="btn-box">
                                    <a href="#" class="cs-btn-one btn-gradient-color">Get a Quote</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
<!-- Home Slider End -->

<!-- About Section Start -->
@if ($section_arr['about_section'] == 1)
    @if (isset($about))
        <section id="about" class="about-section anim-object pdt-110 pdb-110 pdb-lg-80" data-scroll-index="1">
            <div class="container">
                <div class="row align-items-center">
                    @if (!empty($about->about_image))
                        <div class="col-md-12 col-xl-6">
                            <div class="about-image-block mrb-lg-60">
                                <img class="img-full" src="{{ asset('uploads/img/about/'.$about->about_image) }}"
                                     alt="about image">
                            </div>
                        </div>
                    @endif
                    <div class="col-md-12 col-xl-6">
                        <h2 class="title-under-line mrb-70">{{ $about->title }}</h2>
                        <p>@php echo html_entity_decode($about->desc); @endphp</p>
                        @if (!empty($about->btn_name))
                            <a href="@if (!empty($about->btn_link)) {{ $about->btn_link }} @else # @endif"
                               class="cs-btn-one btn-gradient-color btn-lg">{{ $about->btn_name }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @else
        <section id="about" class="about-section anim-object pdt-110 pdb-110 pdb-lg-80" data-scroll-index="1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12 col-xl-6">
                        <div class="about-image-block mrb-lg-60">
                            <img class="img-full" src="{{ asset('uploads/common_dummy/575x645.jpg') }}"
                                 alt="about image">
                        </div>
                    </div>
                    <div class="col-md-12 col-xl-6">
                        <h2 class="title-under-line mrb-70">We have 32+ Years Business Experiences</h2>
                        <h5 class="mrb-30 text-primary-color">Trusted Business Consulting Service Provider</h5>
                        <p class="mrb-40">Distinctively exploit optimal alignments for intuitive. Quickly coordinate
                            business applications through revolutionary catalysts for chang the Seamlessly optimal
                            testing procedures whereas processes. Synerg stically evolve 2.0 technologies rather than
                            just in web & apps development optimal alignments for intuitive.</p>
                        <a href="#" class="cs-btn-one btn-gradient-color btn-lg">Read More</a>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endif
<!-- About Section End -->
<div class="row" style="padding-top: 200px;padding-bottom: 100px;padding-left: 250px;padding-right: 250px;">
    <div class="col-4 col-12-mobile">
        <article class="item">
            <a href="#" class="image fit">
                <img src="https://onlineanindakredin.com/images/bireysel-kredi.jpg" alt="">
            </a>
            <header>
                <h3><strong>Bireysel Kredi Hizmeti</strong></h3>
                <p>150.000 TL kadar 60 ay vade</p>
            </header>
        </article>
    </div>
    <div class="col-4 col-12-mobile">
        <article class="item">
            <a href="#" class="image fit">
                <img src="https://onlineanindakredin.com/images/kurumsal-kredi.jpg" alt="">
            </a>
            <header>
                <h3><strong>Kurumsal Kredi Hizmeti</strong></h3>
                <p>500.000 TL kadar 120 ay vade</p>
            </header>
        </article>
    </div>
    <div class="col-4 col-12-mobile">
        <article class="item">
            <a href="#" class="image fit">
                <img src="https://onlineanindakredin.com/images/konut-kredisi.jpg" alt="">
            </a>
            <header>
                <h3><strong>Konut ve Taşıt Kredisi</strong></h3>
                <p>Konut ve Taşıt Kredileri için iletişime geçin.</p>
            </header>
        </article>
    </div>
</div>
<div class="row" style="padding-left: 200px;padding-right: 200px;">
   <div class="col-12 col-12-mobile" style="padding-bottom: 100px;text-align:center; "><h2><strong>Hemen Başvuru Yapın Cazip Teklifler Alın!</strong></h2></div>
    <div class="col-4 col-12-mobile">
        <article class="item">
            <a href="#" class="image fit">
                <img src="https://onlineanindakredin.com/images/15-dakikada-ihtiyac-kredisi.jpg" alt="">
            </a>
            <header>
                <h3><strong>En Uygun Faiz Oranları</strong></h3>
            </header>
        </article>
    </div>
    <div class="col-4 col-12-mobile">
        <article class="item">
            <a href="#" class="image fit">
                <img src="https://onlineanindakredin.com/images/en-hizli-islem-sureci.jpg" alt="">
            </a>
            <header>
                <h3><strong>En Hızlı İşlem Süreci</strong></h3>
            </header>
        </article>
    </div>
    <div class="col-4 col-12-mobile">
        <article class="item">
            <a href="#" class="image fit">
                <img src="https://onlineanindakredin.com/images/en-uygun-kredi-kullanim-ucreti.jpg" alt="">
            </a>
            <header>
                <h3><strong>En Uygun Kredi Kullanım Ücreti</strong></h3>
            </header>
        </article>
    </div>
</div>




<!-- About Section End -->
@if ($section_arr['counter_section'] == 1)
    @if (count($counters) > 0)
        <section id="about" class="about-section minus-mrb-30">
            <div class="container">
                <div class="row mrt-0 mrb-110">
                    @foreach ($counters as $counter)
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="funfact mrb-30">
                                @if (!empty($counter->icon))
                                    <div class="icon">
                                        <span class="{{ $counter->icon }}"></span>
                                    </div>
                                @endif
                                <h2 class="counter">{{ $counter->timer }}</h2>
                                <h5 class="title">{{ $counter->desc }}</h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @else
        <section id="about" class="about-section minus-mrb-30">
            <div class="container">
            </div>
        </section>
    @endif
@endif
<!-- About Section End -->


<!-- Contact Section Start -->
@if ($section_arr['contact_section'] == 1)
    @if (isset($contact_section) || count($contacts) > 0)
        <section id="contact" class="contact-section pdt-110 pdb-95 pdb-lg-90"
                 data-background="" data-scroll-index="6">
            <div class="container">
                @if (count($contacts) > 0)
                    <div class="row mrb-40">
                        @foreach ($contacts as $contact)
                            <div class="col-lg-6 col-xl-4">
                                <div class="contact-block d-flex mrb-30">
                                    @if (!empty($contact->icon))
                                        <div class="contact-icon">
                                            <i class="{{ $contact->icon }}"></i>
                                        </div>
                                    @endif
                                    <div class="contact-details @if (empty($contact->icon)) mrl-30 @endif">
                                        @if (!empty($contact->title)) <h5
                                            class="icon-box-title mrb-10">{{ $contact->title }}</h5> @endif
                                        @if (!empty($contact->desc)) <p class="mrb-0">{{ $contact->desc }}</p> @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-5 col-xl-5">
                        @if (!empty($contact_section->top_title)) <h5
                            class="sub-title-side-line text-primary-color mrt-0 mrb-15">{{ $contact_section->top_title }}</h5> @endif
                        @if (!empty($contact_section->title)) <h2
                            class="faq-title mrb-30">{{ $contact_section->title }}</h2> @endif
                        @if (!empty($contact_section->desc)) <p class="mrb-40">{{ $contact_section->desc }}</p> @endif
                        <ul class="social-list list-lg list-primary-color list-flat mrb-md-60 clearfix">
                            @foreach($socials as $social)
                                <li><a href="{{ $social->link }}" target="_blank"><i
                                            class="{{ $social->social_media }}"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-7 col-xl-7">
                        <!-- Include Alert Blade -->
                        @include('admin.alert.alert')
                        <div class="`contact`-form">
                            <form action="{{ route('message.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mrb-25">
                                            <input type="text" name="name" id="name" class="form-control"
                                                   placeholder="Ad Soyad" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mrb-25">
                                            <input type="number" name="TC" id="TC" class="form-control"
                                                   placeholder="T.C.Kimlik Numarası" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mrb-25">
                                            <input type="date" name="date" id="date" class="form-control"
                                                   placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mrb-25">
                                            <input type="number" name="number" class="form-control"
                                                   placeholder="İletişim Numarası" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mrb-25">
                                            <input type="text" name="job" id="job" class="form-control"
                                                   placeholder="Meslek" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mrb-25">
                                            <input type="number" name="salary" id="salary" class="form-control"
                                                   placeholder="Aylık Net Gelir" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mrb-25">
                                            <textarea id="text" name="address" itemid="address" placeholder="adres"
                                                      rows="4" cols="37" style="border:1px solid grey;"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mrb-25">
                                            <input type="email" name="email" id="email" class="form-control"
                                                   placeholder="E-Posta" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <select class="form-select form-select-lg mb-12 col-lg-12"
                                                aria-label=".form-select-lg example"
                                                style="background-color: white;border:1px solid grey;" name="bank"
                                                id="bank">
                                            <option selected disabled>Kullandığınız Banka</option>
                                            <option value="Adabank">Adabank</option>
                                            <option value="Akbank">Akbank</option>
                                            <option value="Albaraka Türk Katılım Bankası">Albaraka Türk Katılım
                                                Bankası
                                            </option>
                                            <option value="Alternatif Bank">Alternatif Bank</option>
                                            <option value="Anadolubank">Anadolubank</option>
                                            <option value="Arap Türk Bankası">Arap Türk Bankası</option>
                                            <option value="Bank Asya">Bank Asya</option>
                                            <option value="Bank Mellat">Bank Mellat</option>
                                            <option value="Bank of Tokyo-Mitsubishi UFJ Turkey">Bank of Tokyo-Mitsubishi
                                                UFJ Turkey
                                            </option>
                                            <option value="Birleşik Fon Bankası">Birleşik Fon Bankası</option>
                                            <option value="Burgan Bank">Burgan Bank</option>
                                            <option value="Citibank">Citibank</option>
                                            <option value="Denizbank">Denizbank</option>
                                            <option value="Deutsche Bank">Deutsche Bank</option>
                                            <option value="Fibabanka">Fibabanka</option>
                                            <option value="Finans Bank">Finans Bank</option>
                                            <option value="Habib Bank Limited">Habib Bank Limited</option>
                                            <option value="HSBC">HSBC</option>
                                            <option value="ING Bank">ING Bank</option>
                                            <option value="Intesa Sanpaolo">Intesa Sanpaolo</option>
                                            <option value="JP Morgan Chase Bank">JP Morgan Chase Bank</option>
                                            <option value="Kuveyt Türk Katılım Bankası">Kuveyt Türk Katılım Bankası
                                            </option>
                                            <option value="Odeabank">Odeabank</option>
                                            <option value="Rabobank">Rabobank</option>
                                            <option value="Société Générale">Société Générale</option>
                                            <option value="T-Bank">T-Bank</option>
                                            <option value="Tekstilbank">Tekstilbank</option>
                                            <option value="The Royal Bank of Scotland">The Royal Bank of Scotland
                                            </option>
                                            <option value="Turkish Bank">Turkish Bank</option>
                                            <option value="Türk Ekonomi Bankası">Türk Ekonomi Bankası</option>
                                            <option value="Türkiye Cumhuriyeti Ziraat Bankası">Türkiye Cumhuriyeti
                                                Ziraat Bankası
                                            </option>
                                            <option value="Türkiye Finans Katılım Bankası">Türkiye Finans Katılım
                                                Bankası
                                            </option>
                                            <option value="Türkiye Garanti Bankası">Türkiye Garanti Bankası</option>
                                            <option value="Türkiye Halk Bankası">Türkiye Halk Bankası</option>
                                            <option value="Türkiye İş Bankası">Türkiye İş Bankası</option>
                                            <option value="Türkiye Vakıflar Bankası">Türkiye Vakıflar Bankası</option>
                                            <option value="Yapı ve Kredi Bankası">Yapı ve Kredi Bankası</option>
                                            <option value="Şekerbank">Şekerbank</option>
                                        </select>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-lg-6">
                                        <div class="form-group mrb-25">
                                            <input type="number" name="kredi" id="kredi" class="form-control"
                                                   placeholder="Kredi Miktarı" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="number" name="iban" id="iban" class="form-control"
                                               placeholder="Kredinin Aktarılacağı Iban" required>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-lg-12">
                                        <select class="form-select form-select-lg mb-12 col-lg-12"
                                                aria-label=".form-select-lg example"
                                                style="background-color: white;border:1px solid grey;" name="aytaksit"
                                                id="aytaksit">
                                            <option selected disabled>Vade ay</option>
                                            <option value="60">60 ay</option>
                                            <option value="59">59 ay</option>
                                            <option value="58">58 ay</option>
                                            <option value="57">57 ay</option>
                                            <option value="56">56 ay</option>
                                            <option value="55">55 ay</option>
                                            <option value="54">54 ay</option>
                                            <option value="53">53 ay</option>
                                            <option value="52">52 ay</option>
                                            <option value="51">51 ay</option>
                                            <option value="50">50 ay</option>
                                            <option value="49">49 ay</option>
                                            <option value="48">48 ay</option>
                                            <option value="47">47 ay</option>
                                            <option value="46">46 ay</option>
                                            <option value="45">45 ay</option>
                                            <option value="44">44 ay</option>
                                            <option value="43">43 ay</option>
                                            <option value="42">42 ay</option>
                                            <option value="41">41 ay</option>
                                            <option value="40">40 ay</option>
                                            <option value="39">39 ay</option>
                                            <option value="38">38 ay</option>
                                            <option value="37">37 ay</option>
                                            <option value="36">36 ay</option>
                                            <option value="35">35 ay</option>
                                            <option value="34">34 ay</option>
                                            <option value="33">33 ay</option>
                                            <option value="32">32 ay</option>
                                            <option value="31">31 ay</option>
                                            <option value="30">30 ay</option>
                                            <option value="29">29 ay</option>
                                            <option value="28">28 ay</option>
                                            <option value="27">27 ay</option>
                                            <option value="26">26 ay</option>
                                            <option value="25">25 ay</option>
                                            <option value="24">24 ay</option>
                                            <option value="23">23 ay</option>
                                            <option value="22">22 ay</option>
                                            <option value="21">21 ay</option>
                                            <option value="20">20 ay</option>
                                            <option value="19">19 ay</option>
                                            <option value="18">18 ay</option>
                                            <option value="17">17 ay</option>
                                            <option value="16">16 ay</option>
                                            <option value="15">15 ay</option>
                                            <option value="14">14 ay</option>
                                            <option value="13">13 ay</option>
                                            <option value="12">12 ay</option>
                                            <option value="11">11 ay</option>
                                            <option value="10">10 ay</option>
                                            <option value="9">9 ay</option>
                                            <option value="8">8 ay</option>
                                            <option value="7">7 ay</option>
                                            <option value="6">6 ay</option>
                                            <option value="5">5 ay</option>
                                            <option value="4">4 ay</option>
                                            <option value="3">3 ay</option>
                                            <option value="2">2 ay</option>
                                            <option value="1">1 ay</option>
                                        </select>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="text" name="faiz" id="faiz" disabled=""
                                               value="Aylık Faiz Oranı = 0.79" placeholder="Aylık Faiz Oranı 0.79">
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="col-lg-12">
                                        <select class="form-select form-select-lg mb-12 col-lg-12"
                                                aria-label=".form-select-lg example"
                                                style="background-color: white;border:1px solid grey;" name="CreditType"
                                                id="CreditType">
                                            <option disabled selected>Kredi Türü</option>
                                            <option value="İhtiyaç Kredisi">İhtiyaç Kredisi</option>
                                            <option value="Kount Kredisi">Kount Kredisi</option>
                                            <option value="Taşıt Kredisi ">Taşıt Kredisi</option>
                                            <option value="Kobi Kredisi">Kobi Kredisi</option>
                                        </select>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="col-lg-12">
                                        <a href="/text">Sözleşmeyi</a><em> okudum, onaylıyorum.</em><input
                                            type="checkbox" name="OK" id="OK">
                                        <div/>
                                        <div class="col-lg-12">
                                            <div class="form-group mrb-25" hidden>
                                            <textarea rows="4" name="message" class="form-control"
                                                      placeholder="{{ __('frontend.message') }}" required>1</textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <br>

                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <button type="submit"
                                                        class="cs-btn-one btn-md btn-round btn-primary-color element-shadow">{{ __('frontend.submit_now') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="contact-section">

        </div>
    @endif
@endif
<!-- Contact Section End -->

<!-- Footer Area Start -->
@if ($section_arr['footer_section'] == 1)
    @if (isset($site_info) || count($socials) > 0 || count($pages) > 0 || count($contacts) > 0)
        <footer class="footer">
            <div class="container">
                <div class="row" style="background-color: #dce3e2 ;padding-bottom:70px">


                    <div data-ux="GridCell" data-aid="CONTACT_SECTION_INFO_REND"
                         class="col-md-12 col-xl-12 x-el x-el-div c1-1 c1-2 c1-4y c1-14 c1-5d c1-3z c1-1p c1-5g c1-5h c1-7i c1-5j c1-53 c1-1q c1-62 c1-b c1-c c1-5k c1-5l c1-80 c1-5n c1-d c1-e c1-f c1-g x-d-ux x-d-aid"
                         style="justify-content: center; background-color: rgb(69, 90, 100);">
                        <a tccltracking="click" style="justify-content: center;" typography="ButtonAlpha" rel="noopener"
                           data-ux="Button" href="https://wa.me/+905382832712" target="_blank"
                           data-aid="CONTACT_INFO_WHATS_APP_REND" data-route="whatsApp"
                           data-tccl="ux2.contact.whatsapp.click,click"
                           class="x-el x-el-a c1-7m c1-3j c1-ay c1-az c1-4v c1-4w c1-b0 c1-b1 c1-b2 c1-62 c1-2q c1-22 c1-2s c1-2r c1-1p c1-29 c1-9a c1-53 c1-2u c1-2v c1-2w c1-2x c1-c c1-b3 c1-b4 c1-b5 c1-b6 c1-b7 c1-b c1-37 c1-39 c1-4n c1-b8 c1-ap c1-a1 c1-b9 c1-ba c1-bb c1-ar c1-as c1-bc c1-bd c1-at c1-d c1-be c1-bf c1-e c1-bg c1-bh c1-f c1-g x-d-ux x-d-aid x-d-route x-d-tccl">
                            <svg viewBox="0 0 24 24" fill="currentColor" width="32px" height="32px" data-ux="Icon"
                                 class="x-el x-el-svg c1-1 c1-2 c1-5s c1-2i c1-21 c1-bi c1-b c1-c c1-d c1-e c1-f c1-g x-d-ux">
                                <svg viewBox="0 0 496 497">
                                    <defs>
                                        <linearGradient id="a" x1="247.32" x2="247.32" y1="446.09" y2="39.9"
                                                        gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#20b038"></stop>
                                            <stop offset="1" stop-color="#60d66a"></stop>
                                        </linearGradient>
                                        <linearGradient id="b" x1="247.32" x2="247.32" y1="453.37" y2="32.61"
                                                        gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#f9f9f9"></stop>
                                            <stop offset="1" stop-color="#fff"></stop>
                                        </linearGradient>
                                    </defs>
                                    <path
                                        d="M37.88 453.37l29.59-108A208 208 0 0 1 39.63 241.1c0-115 93.6-208.49 208.56-208.49a208.57 208.57 0 0 1 208.57 208.66c-.05 115-93.62 208.49-208.57 208.49h-.08a208.41 208.41 0 0 1-99.67-25.38zm115.68-66.73l6.34 3.75a173.18 173.18 0 0 0 88.23 24.16h.06c95.55 0 173.31-77.75 173.35-173.3A173.34 173.34 0 0 0 248.26 67.83c-95.62 0-173.38 77.73-173.42 173.28a172.94 172.94 0 0 0 26.5 92.23l4.13 6.55L88 403.84z"></path>
                                    <path fill="url(#a)"
                                          d="M45.13 446.09l28.57-104.3a200.82 200.82 0 0 1-26.88-100.62c0-111 90.36-201.27 201.34-201.27A201.35 201.35 0 0 1 449.5 241.32c0 111-90.37 201.28-201.33 201.28h-.09a201.31 201.31 0 0 1-96.21-24.49z"></path>
                                    <path fill="url(#b)"
                                          d="M37.88 453.37l29.59-108A208 208 0 0 1 39.63 241.1c0-115 93.6-208.49 208.56-208.49a208.57 208.57 0 0 1 208.57 208.66c-.05 115-93.62 208.49-208.57 208.49h-.08a208.41 208.41 0 0 1-99.67-25.38zm115.68-66.73l6.34 3.75a173.18 173.18 0 0 0 88.23 24.16h.06c95.55 0 173.31-77.75 173.35-173.3A173.34 173.34 0 0 0 248.26 67.83c-95.62 0-173.38 77.73-173.42 173.28a172.94 172.94 0 0 0 26.5 92.23l4.13 6.55L88 403.84z"></path>
                                    <path fill="#fff"
                                          d="M196.07 153.94c-3.91-8.68-8-8.85-11.73-9-3-.14-6.51-.13-10-.13a19.15 19.15 0 0 0-13.89 6.52c-4.78 5.22-18.24 17.82-18.24 43.46s18.67 50.42 21.28 53.9 36.05 57.77 89 78.66c44 17.36 53 13.91 62.53 13s30.83-12.61 35.18-24.78 4.34-22.59 3-24.77-4.78-3.48-10-6.08-30.83-15.22-35.61-16.95-8.25-2.61-11.73 2.61-13.45 16.94-16.5 20.42-6.08 3.92-11.29 1.31-22-8.11-41.9-25.86c-15.5-13.82-26-30.87-29-36.09s-.32-8 2.29-10.63c2.34-2.34 5.21-6.09 7.82-9.13s3.47-5.21 5.21-8.69.87-6.52-.44-9.13-11.35-28.34-15.98-38.64z"></path>
                                </svg>
                            </svg>
                            <span
                                style="padding-left:400px ;jtext-transform:none;letter-spacing:normal;font-weight:900;font-size:20px;font-family:Helvetica Neue, Helvetica, Arial, sans-serif;max-width:88%">Bize WhatsApp Üzerinden Ulaşın</span></a>
                    </div>
                    <div class="col-md-12 col-xl-12" style="  text-align: center;"> Online Kredin Yatırım Menkul
                        Değerler A.Ş
                    </div>
                    <div class="col-md-12 col-xl-12" style="  text-align: center;">Ankara, Çankaya</div>
                    <div class="col-md-12 col-xl-12" style="  text-align: center;">info@onlineanindakredin.com</div>
                    <div class="col-md-12 col-xl-12" style="  text-align: center;">WhatsApp Destek Hattımız
                        +905382832712
                    </div>
                    <div class="col-md-12 col-xl-12" style="  text-align: center;" class="copyright">
                        <li style="  text-align: center;">
                            <strong>&copy; Online Anindakredin Yatırım Menkul Değerler A.Ş</strong>. Tüm Hakları
                            Saklıdır ®
                        </li>
                    </div>
                </div>
            </div>
            </div>

            </div>
            <div class="footer-bottom-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="text-center">

                                <span
                                    class="text-light-gray">@if (!empty($site_info->copyright)) {{ $site_info->copyright }} @endif</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </footer>
    @else
        <footer class="footer" style="background-color: #dce3e2!important;">
            <div class="footer-main-area" data-background="{{ asset('assets/frontend/images/footer-bg.png') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="widget footer-widget">
                                <img src="{{ asset('uploads/common_dummy/logo-white.png') }}" alt="footer image"
                                     class="mrb-20">
                                <address class="mrb-25">
                                    <p class="text-light-gray">32 Dora Creek, tuntable creek, New South Wales 2480,
                                        Australia</p>
                                    <div class="mrb-10"><a href="#" class="text-light-gray"><i
                                                class="fas fa-phone-alt mrr-10"></i>+088 234 432 15565</a></div>
                                    <div class="mrb-10"><a href="#" class="text-light-gray"><i
                                                class="fas fa-envelope mrr-10"></i>sample@yourdomain.com</a></div>
                                    <div class="mrb-0"><a href="#" class="text-light-gray"><i
                                                class="fas fa-globe mrr-10"></i>www.domainname.com</a></div>
                                </address>
                                <ul class="social-list">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-6 col-md-6">
                            <div class="widget footer-widget">
                                <h5 class="widget-title text-white mrb-30">Links</h5>
                                <ul class="footer-widget-list">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Team</a></li>
                                    <li><a href="#">Service</a></li>
                                    <li><a href="#">News</a></li>
                                    <li><a href="#">Policy</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-6 col-md-6">
                            <div class="widget footer-widget">
                                <h5 class="widget-title text-white mrb-30">Help</h5>
                                <ul class="footer-widget-list">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Team</a></li>
                                    <li><a href="#">Service</a></li>
                                    <li><a href="#">News</a></li>
                                    <li><a href="#">Policy</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="widget footer-widget">
                                <h5 class="widget-title text-white mrb-30">Contact Info</h5>
                                <div class="mrb-10"><a href="#" class="text-light-gray"><i
                                            class="fas fa-phone-alt mrr-10"></i>+088 234 432 15565</a></div>
                                <div class="mrb-10"><a href="#" class="text-light-gray"><i
                                            class="fas fa-envelope mrr-10"></i>sample@yourdomain.com</a></div>
                                <div class="mrb-0"><a href="#" class="text-light-gray"><i
                                            class="fas fa-globe mrr-10"></i>www.domainname.com</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="text-center">
                                <span class="text-light-gray">Copyright © 2020 by <a class="text-primary-color"
                                                                                     target="_blank"
                                                                                     href="https://themeforest.net/user/simsiyeka"> Simsiyeka</a> | All rights reserved </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    @endif
@endif
<!-- Footer Area End -->

<!-- BACK TO TOP SECTION -->
<div class="back-to-top bg-gradient-color">
    <i class="fab fa-angle-up"></i>
</div>


<!-- Scripts -->
<script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/scroll.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery-core-plugins.js') }}"></script>
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>

<!-- Soft scrolling -->
<script>
    $.scrollIt({
        upKey: 38,                // key code to navigate to the next section
        downKey: 40,              // the easing function for animation
        scrollTime: 800,          // how long (in ms) the animation takes
        activeClass: 'active',    // class given to the active nav element
        onPageChange: null,       // function(pageIndex) that is called when page is changed
        topOffset: -80            // offste (in px) for fixed top navigation
    });
</script>

</body>
</html>
