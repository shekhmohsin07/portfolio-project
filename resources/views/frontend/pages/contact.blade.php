@extends('frontend.layouts.master')
@section('content')

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h1 class="title split-collab">Contact</h1>
                        <ul class="page-list">
                            <li class="tmp-breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="icon"><i class="fa-solid fa-angle-right"></i></li>
                            <li class="tmp-breadcrumb-item active">Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->
    <div class="contact-area-wrapper tmp-section-gap">
        <div class="container">
            <div class="contact-info-wrap">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-info tmp-scroll-trigger tmponhover tmp-fade-in animation-order-1">
                            <div class="contact-icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <h3 class="title">Address</h3>
                            <p class="para">Road-2, Block-B, Section-13</p>
                            <p class="para">Mirpur, Dhaka - 1216</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-info tmp-scroll-trigger tmponhover tmp-fade-in animation-order-2">
                            <div class="contact-icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <h3 class="title">E-mail</h3>
                            <a href="mailto:shekhmohammadmohsin@gmail.com">
                                <p class="para">shekhmohammadmohsin@gmail.com</p>
                            </a>
                            <a href="mailto:contact@shekhmohsin.com">
                                <p class="para">contact@shekhmohsin.com</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-info tmp-scroll-trigger tmponhover tmp-fade-in animation-order-3">
                            <div class="contact-icon">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <h3 class="title">Call Me</h3>
                            <p class="para">+880 1858-012033</p>
                            <p class="para">+880 1639-657052</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tpm Get In touch start -->
        <section class="get-in-touch-area tmp-section-gapTop">
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

    </div>

@endsection