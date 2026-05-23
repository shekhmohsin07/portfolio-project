@extends('frontend.layouts.master')   
@section('content')
   
 <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h1 class="title split-collab">Project Details</h1>
                        <ul class="page-list">
                            <li class="tmp-breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="icon"><i class="fa-solid fa-angle-right"></i></li>
                            <li class="tmp-breadcrumb-item active">Project Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->


    <div class="project-details-area-wrapper tmp-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="project-details-thumnail-wrap">
                        <img src="{{ asset('uploads/projects/'.$project->image) }}" alt="{{ $project->title }}">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="project-details-content-wrap">
                        <h2 class="title">{{ $project->title }}</h2>
                        <p class="docs">{{ $project->short_description }}</p>
                        <div class="check-box-wrap">
                            <ul>
                                <li>
                                    <h4 class="check-box-item"><span><i
                                                class="fa-solid fa-circle-check"></i></span>Ui/visual Design</h4>
                                </li>
                                <li>
                                    <h4 class="check-box-item"><span><i
                                                class="fa-solid fa-circle-check"></i></span>App Development</h4>
                                </li>
                                <li>
                                    <h4 class="check-box-item"><span><i
                                                class="fa-solid fa-circle-check"></i></span>Software Developer</h4>
                                </li>
                            </ul>
                        </div>
                        <p class="docs">{!! $project->description !!}</p>

                        
                        <div class="project-details-swiper-wrapper">
                            {{-- Project Gallery --}} 
                            @if($project->gallery && count(json_decode($project->gallery)) > 0) 
                            <div class="project-details-swiper-wrapper mt-5"> 
                                <div class="swiper project-details-swiper"> 
                                    <div class="swiper-wrapper"> 
                                        @foreach(json_decode($project->gallery) as $gallery) 
                                        <div class="swiper-slide"> 
                                            <div class="project-details-img"> 
                                                <img src="{{ asset('uploads/projects/gallery/'.$gallery) }}" alt="gallery"> 
                                            </div> 
                                        </div> 
                                        @endforeach 
                                    </div> 
                                </div>
                            </div>
                        
                            <div class="project-details-swiper-btn">
                                <div class="project-swiper-button-prev"><span><i
                                            class="fa-solid fa-arrow-left"></i></span>Previous</div>
                                <div class="project-swiper-button-next">Next <span><i
                                            class="fa-solid fa-arrow-right"></i></span></div>
                            </div>

                            @endif
                        </div>
                    </div>
                    <!-- Tpm Get In touch start -->
                    <section class="get-in-touch-area pt--80">
                        <div class="container p-0">
                            <div class="contact-get-in-touch-wrap">
                                <div class="get-in-touch-wrapper tmponhover">
                                    <div class="row g-5 align-items-center">
                                        <div class="col-lg-12">
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
                <div class="col-lg-4">
                    <div class="signle-side-bar project-details-area tmponhover">
                        <div class="header">
                            <h3 class="title">Project Details</h3>
                        </div>
                        <div class="body">
                            <div class="project-details-info">Name: <span>{{ $project->category->name ?? '' }}</span></div>
                            <div class="project-details-info">Author: <span>{{ $project->client_name ?? 'Admin' }}</span></div>
                            <div class="project-details-info">Date: <span>{{ $project->created_at->format('d F, Y') }}</span></div>
                            @if($project->project_url) 
                            <div class="project-details-info"> Project URL: 
                                <span><a href="{{ $project->project_url }}" target="_blank" class="text-primary">{{ $project->project_url }} </a></span> 
                            </div> 
                            @endif
                            @if($project->tags) 
                            <div class="project-details-info"> Tags: <span>{{ $project->tags }}</span> </div> 
                            @endif
                            <div class="project-details-info">Tags: <span>Host Web Design</span></div>
                        </div>
                    </div>


                    {{-- Related Projects --}} 
                    @if($relatedProjects->count() > 0) 
                    <div class="signle-side-bar recent-post-area tmponhover mt-4"> 
                        <div class="header"> 
                            <h3 class="title"> Related Projects </h3> 
                        </div> 
                        <div class="body"> 
                            @foreach($relatedProjects as $related) 
                            <a href="{{ route('project.details', $related->slug) }}" class="single-post mb-3"> 
                                <span class="single-post-left"> 
                                    <span class="single-post-card-img"> 
                                        <img src="{{ asset('uploads/projects/'.$related->image) }}" width="60" style="border-radius:8px;" alt="{{ $related->title }}"> 
                                    </span> 
                                    <span class="post-title ms-2"> {{ $related->title }} </span> 
                                </span> 
                            </a> 
                            @endforeach 
                        </div> 
                    </div> 
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection