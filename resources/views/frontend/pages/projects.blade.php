@extends('frontend.layouts.master')
@section('content')

        <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h1 class="title split-collab">My Project</h1>
                        <ul class="page-list">
                            <li class="tmp-breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="icon"><i class="fa-solid fa-angle-right"></i></li>
                            <li class="tmp-breadcrumb-item active">My All Project</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->


    <!-- tmp Latest Portfolio Start -->
    <section class="latest-portfolio-area custom-column-grid tmp-section-gap">
        <div class="container">
            <div class="latest-portfolio-tabs-area">
                <nav>
                    <ul class="nav nav-tabs" id="nav-tab" role="tablist">
                        <li>
                            <button class="nav-link active" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all" type="button" role="tab" aria-controls="nav-all" aria-selected="true">All</button>
                        </li>

                        @foreach($projectCategories as $category)
                        <li>
                            <button class="nav-link" id="nav-{{ $category->slug }}-tab" data-bs-toggle="tab" data-bs-target="#nav-{{ $category->slug }}" type="button" role="tab">
                                {{ $category->name }}
                            </button>
                        </li>
                        @endforeach
                    </ul>
                </nav>
                <div class="tab-content bg-blur-style-one" id="nav-tabContent">
                    {{-- All project --}}
                    <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab" tabindex="0">
                        <div class="row">
                             @foreach($projects as $project)
                            <div class="col-lg-6">
                                <div class="latest-portfolio-card-style-two image-box-hover tmp-scroll-trigger tmp-fade-in">
                                    <div class="portfoli-card-img">
                                        <div class="img-box v2">
                                            <a class="tmp-scroll-trigger tmp-zoom-in" href="{{ route('project.details', $project->slug) }}">
                                                <img class="w-100" src="{{ asset('uploads/projects/'.$project->image) }}" alt="{{ $project->title }}">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <h3 class="portfolio-card-title" style="margin-top: -50px;"><a href="{{ route('project.details', $project->slug) }}">{{ $project->title }}</a>
                                            </h3>
                                            <div class="tag-items">
                                                <ul>
                                                    <li>
                                                        <a href="#" class="tag-item">{{ $project->category->name ?? '' }}</a>
                                                    </li>
                                                     <li>
                                                        <a href="#" class="tag-item">{{ $project->category->name ?? '' }}</a>
                                                    </li>
                                                     <li>
                                                        <a href="#" class="tag-item">{{ $project->category->name ?? '' }}</a>
                                                    </li>
                                                     <li>
                                                        <a href="#" class="tag-item">{{ $project->category->name ?? '' }}</a>
                                                    </li>
                                                     <li>
                                                        <a href="#" class="tag-item">{{ $project->category->name ?? '' }}</a>
                                                    </li>
                                        
                                                </ul>
                                            </div>
                                        </div>

                                        <a class="tmp-btn hover-icon-reverse radius-round btn-border btn-md" href="{{ route('project.details', $project->slug) }}">
                                            <span class="icon-reverse-wrapper">
                                                <span class="btn-text">View Project</span>
                                            <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                            <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>


                    {{-- Category Wise Projects --}}
                    @foreach($projectCategories as $category)
                    <div class="tab-pane fade" id="nav-{{ Str::slug($category->name) }}" role="tabpanel" aria-labelledby="nav-{{ Str::slug($category->name) }}-tab" tabindex="0">
                        <div class="row">
                            @foreach($category->projects as $project)
                            <div class="col-lg-6">
                                <div class="latest-portfolio-card-style-two image-box-hover tmp-scroll-trigger tmp-fade-in animation-order-1">
                                    <div class="portfoli-card-img">
                                        <div class="img-box v2">
                                            <a class="tmp-scroll-trigger tmp-zoom-in animation-order-1" href="{{ route('project.details', $project->slug) }}">
                                                <img class="w-100" src="{{ asset('uploads/projects/'.$project->image) }}" alt="{{ $project->title }}">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="portfolio-card-content-wrap">
                                        <div class="content-left">
                                            <h3 class="portfolio-card-title"><a href="{{ route('project.details', $project->slug) }}">{{ $project->title }}</a></h3>
                                            <div class="tag-items">
                                                <ul>
                                                    <li>
                                                        <a href="#" class="tag-item">{{ $category->name }}</a>
                                                    </li>
                                
                                                </ul>
                                            </div>
                                        </div>
                                        <a class="tmp-btn hover-icon-reverse radius-round btn-border btn-md" href="{{ route('project.details', $project->slug) }}">
                                            <span class="icon-reverse-wrapper">
                                            <span class="btn-text">View Project</span>
                                            <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                            <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>
    <!-- tmp Latest Portfolio end -->

@endsection