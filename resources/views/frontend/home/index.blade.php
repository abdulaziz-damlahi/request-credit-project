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
                            <div class="show-searchbox">
                                <a href="#"><i class="webex-icon-Search"></i></a>
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
                                    <li><a href="#home" data-scroll-nav="0"style="padding-left: 40px"><i class="fa fa-home" ></i>  {{ __('frontend.home') }}</a></li>
                                    @if ($section_arr['about_section'] == 1)
                                        <li><a href="#about" data-scroll-nav="1"style="padding-left: 40px"><i class="fa fa-info-circle"></i>  {{ __('frontend.about') }}</a>
                                        </li> @endif
                                    @if ($section_arr['contact_section'] == 1)
                                        <li><a href="#contact" data-scroll-nav="6"style="padding-left: 40px"><i class="fa fa-at" ></i>  {{ __('frontend.contact') }}</a>
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
                {{--                <div class="row mrt-0 mrb-110">--}}
                {{--                    <div class="col-md-6 col-lg-6 col-xl-3">--}}
                {{--                        <div class="funfact mrb-30">--}}
                {{--                            <div class="icon">--}}
                {{--                                <span class="webexflaticon flaticon-man-2"></span>--}}
                {{--                            </div>--}}
                {{--                            <h2 class="counter">1450</h2>--}}
                {{--                            <h5 class="title">Happy Customers</h5>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div class="col-md-6 col-lg-6 col-xl-3">--}}
                {{--                        <div class="funfact mrb-lg-30 mrb-60">--}}
                {{--                            <div class="icon">--}}
                {{--                                <span class="webexflaticon flaticon-like-3"></span>--}}
                {{--                            </div>--}}
                {{--                            <h2 class="counter">1864</h2>--}}
                {{--                            <h5 class="title">Peoples Likes</h5>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div class="col-md-6 col-lg-6 col-xl-3">--}}
                {{--                        <div class="funfact mrb-lg-30 mrb-60">--}}
                {{--                            <div class="icon">--}}
                {{--                                <span class="webexflaticon flaticon-trophy-1"></span>--}}
                {{--                            </div>--}}
                {{--                            <h2 class="counter">1280</h2>--}}
                {{--                            <h5 class="title">Awards Achieved</h5>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div class="col-md-6 col-lg-6 col-xl-3">--}}
                {{--                        <div class="funfact mrb-lg-30 mrb-60">--}}
                {{--                            <div class="icon">--}}
                {{--                                <span class="webexflaticon flaticon-briefcase-1"></span>--}}
                {{--                            </div>--}}
                {{--                            <h2 class="counter">32</h2>--}}
                {{--                            <h5 class="title">Experiences</h5>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
        </section>
    @endif
@endif
<!-- About Section End -->




<!-- Contact Section Start -->
@if ($section_arr['contact_section'] == 1)
    @if (isset($contact_section) || count($contacts) > 0)
        <section id="contact" class="contact-section pdt-110 pdb-95 pdb-lg-90"
                 data-background="{{ asset('assets/frontend/images/bg/abs-bg1.png') }}" data-scroll-index="6">
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
                        <div class="contact-form">
                            <form action="{{ route('message.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group mrb-25">
                                            <input type="text" name="name" class="form-control"
                                                   placeholder="{{ __('frontend.name') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mrb-25">
                                            <input type="email" name="email" class="form-control"
                                                   placeholder="{{ __('frontend.email') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mrb-25">
                                            <input type="text" name="subject" class="form-control"
                                                   placeholder="{{ __('frontend.subject') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mrb-25">
                                            <textarea rows="4" name="message" class="form-control"
                                                      placeholder="{{ __('frontend.message') }}" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <button type="submit"
                                                    class="cs-btn-one btn-md btn-round btn-primary-color element-shadow">{{ __('frontend.submit_now') }}</button>
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
            <div class="footer-main-area" data-background="{{ asset('assets/frontend/images/footer-bg.png') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="widget footer-widget">
                                @if (!empty($general_site_image->site_white_logo_image)) <img
                                    src="{{ asset('uploads/img/general/'.$general_site_image->site_colored_logo_image) }}"
                                    class="mrb-20" alt="footer image"> @endif
                                <address class="mrb-25">
                                    @if (!empty($site_info->short_desc)) <p
                                        class="text-light-gray">{{ $site_info->short_desc }}</p> @endif
                                </address>
                                <ul class="social-list">
                                    @foreach ($socials as $social)
                                        <li><a href="@if (!empty($social->link)) {{ $social->link }} @else # @endif"><i
                                                    class="{{ $social->social_media }}"></i></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="widget footer-widget">
                                <h5 class="widget-title text-white mrb-30">Links </h5>
                                <ul class="footer-widget-list">
                                    <li><a href="#home" data-scroll-nav="0">{{ __('frontend.home') }}</a></li>
                                    @if ($section_arr['about_section'] == 1)
                                        <li><a href="#about" data-scroll-nav="1">{{ __('frontend.about') }}</a>
                                        </li> @endif
                                    @if ($section_arr['contact_section'] == 1)
                                        <li><a href="#contact" data-scroll-nav="6">{{ __('frontend.contact') }}</a>
                                        </li> @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="widget footer-widget">
                                <h5 class="widget-title text-white mrb-30">{{ __('frontend.contact_info') }}</h5>
                                @foreach ($contacts as $contact)
                                    <div class="mrb-10"><a href="#" class="text-light-gray">@if (!empty($contact->icon))
                                                <i class="{{ $contact->icon }} mrr-10"></i> @endif {{ $contact->desc }}
                                        </a></div>
                                @endforeach
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
        <footer class="footer">
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
