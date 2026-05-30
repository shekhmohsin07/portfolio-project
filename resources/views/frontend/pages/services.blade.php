@extends('frontend.layouts.master')
@section('content')

        <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h1 class="title split-collab">My Service</h1>
                        <ul class="page-list">
                            <li class="tmp-breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="icon"><i class="fa-solid fa-angle-right"></i></li>
                            <li class="tmp-breadcrumb-item active">Services</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Latest Service Area Start -->
    <section class="latest-service-area tmp-section-gap">
        <div class="container">
            <div class="row">
                @foreach($services as $key => $service)
                <div class="col-lg-6 col-sm-6">
                    <a href="{{ route('service.details', $service->slug) }}" class="service-card-v2 tmponhover tmp-scroll-trigger tmp-fade-in animation-order-1">
                        <h2 class="service-card-num">
                            <span>{{ str_pad($key+1, 2, '0', STR_PAD_LEFT) }}.</span>
                            {{ $service->title }}
                        </h2>
                        <p class="service-para">{{ Str::limit($service->short_description, 200) }}</p>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Latest Service Area End -->

    <!-- Tpm My Price plan Start -->
    {{-- <section class="our-price-plan-area tmp-section-gapBottom">
        <div class="container">
            <div class="section-head mb--60">
                <div class="section-sub-title center-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                    <span class="subtitle">My Price plan</span>
                </div>
                <h2 class="title split-collab tmp-scroll-trigger tmp-fade-in animation-order-2">Enhancing Collaboration <br> between Remote</h2>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6">
                    <div class="price-plan-card tmponhover blur-style-two tmp-scroll-trigger tmp-fade-in animation-order-1">
                        <span class="price-sub-title">Starter</span>
                        <h3 class="main-price">$ 5.00</h3>
                        <p class="per-month">Per Month</p>
                        <div class="check-box">
                            <ul>
                                <li>
                                    <div class="check-box-item">
                                        <div class="box-icon">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <p class="box-para">5 Social Media Account</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="check-box-item">
                                        <div class="box-icon">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <p class="box-para">Free Platform Access</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="check-box-item">
                                        <div class="box-icon">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <p class="box-para">24/7 Customer Support</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="tmp-button-here">
                            <a class="tmp-btn hover-icon-reverse btn-border btn-md radius-round" href="contact.html">
                                <span class="icon-reverse-wrapper">
                    <span class="btn-text">Get Started</span>
                                <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 tmp-scroll-trigger tmp-fade-in animation-order-2">
                    <div class="price-plan-card tmponhover blur-style-two active">
                        <span class="price-sub-title">Basic</span>
                        <h3 class="main-price">$ 230.00</h3>
                        <p class="per-month">Per Month</p>
                        <div class="check-box">
                            <ul>
                                <li>
                                    <div class="check-box-item">
                                        <div class="box-icon">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <p class="box-para">5 Social Media Account</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="check-box-item">
                                        <div class="box-icon">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <p class="box-para">Free Platform Access</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="check-box-item">
                                        <div class="box-icon">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <p class="box-para">Marketing Platform</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="check-box-item">
                                        <div class="box-icon">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <p class="box-para">24/7 Customer Support</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="check-box-item">
                                        <div class="box-icon">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <p class="box-para">Life time support</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="tmp-button-here">
                            <a class="tmp-btn hover-icon-reverse btn-md radius-round" href="contact.html">
                                <span class="icon-reverse-wrapper">
                    <span class="btn-text">Get Started</span>
                                <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="price-plan-card tmponhover blur-style-two tmp-scroll-trigger tmp-fade-in animation-order-3">
                        <span class="price-sub-title">Premium</span>
                        <h3 class="main-price">$ 45.00</h3>
                        <p class="per-month">Per Month</p>
                        <div class="check-box">
                            <ul>
                                <li>
                                    <div class="check-box-item">
                                        <div class="box-icon">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <p class="box-para">5 Social Media Account</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="check-box-item">
                                        <div class="box-icon">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <p class="box-para">Free Platform Access</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="check-box-item">
                                        <div class="box-icon">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </div>
                                        <p class="box-para">24/7 Customer Support</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="tmp-button-here">
                            <a class="tmp-btn hover-icon-reverse btn-border btn-md radius-round" href="contact.html">
                                <span class="icon-reverse-wrapper">
                    <span class="btn-text">Get Started</span>
                                <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Tpm My Price plan End -->



    <!-- Tpm Get In touch start -->
    <section class="get-in-touch-area tmp-section-gapBottom">
        <div class="container">
            <div class="contact-get-in-touch-wrap">
                <div class="get-in-touch-wrapper tmponhover">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-5">
                            <div class="section-head text-align-left">
                                <div class="section-sub-title tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <span class="subtitle">GET IN TOUCH</span>
                                </div>
                                <h2 class="title split-collab tmp-scroll-trigger tmp-fade-in animation-order-2">Elevate your brand with Me </h2>
                                <p class="description tmp-scroll-trigger tmp-fade-in animation-order-3">ished fact that a reader will be
                                    distrol acted bioiiy desig
                                    ished fact that a reader will acted ished fact that a reader will be distrol
                                    acted </p>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="contact-inner">
                                <div class="contact-form">
                                
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if(session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif

                                    @if($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="mb-0">
                                                @foreach($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('contact.store') }}">
                                        @csrf
                                        <div class="contact-form-wrapper row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input class="input-field" name="name" placeholder="Your Name" type="text" value="{{ old('name') }}" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input class="input-field" name="phone" placeholder="Phone Number" type="tel" value="{{ old('phone') }}" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input class="input-field" name="email" placeholder="Your Email" type="email" value="{{ old('email') }}" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input class="input-field" type="text" name="subject" placeholder="Subject" value="{{ old('subject') }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <textarea class="input-field" placeholder="Your Message" name="message" required> {{ old('message') }} </textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="tmp-button-here">
                                                    <button class="tmp-btn hover-icon-reverse radius-round w-100" name="submit" type="submit">
                                                        <span class="icon-reverse-wrapper">
                                                            <span class="btn-text">Appointment Now</span>
                                                            <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                                            <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Tpm Get In touch End -->

@endsection

