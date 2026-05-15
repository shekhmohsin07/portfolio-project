@extends('frontend.layouts.master')
@section('content')

        <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h1 class="title split-collab">Blogs</h1>
                        <ul class="page-list">
                            <li class="tmp-breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="icon"><i class="fa-solid fa-angle-right"></i></li>
                            <li class="tmp-breadcrumb-item active">Blogs</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->
    <div class="blog-classic-area-wrapper tmp-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @forelse($blogs as $blog)
                    <div class="blog-classic-card tmp-scroll-trigger tmponhover tmp-fade-in animation-order-1">
                        <div class="img-box">
                            <a href="{{ route('blog.details', $blog->slug) }}">
                                <img class="img-primary hidden-on-mobile" src="{{ asset('uploads/blogs/'.$blog->image) }}" alt="{{ $blog->title }}">
                                <img class="img-secondary" src="{{ asset('uploads/blogs/'.$blog->image) }}" alt="{{ $blog->title }}">
                            </a>
                        </div>
                        <div class="blog-classic-content">
                            <div class="blog-classic-tag">
                                <ul>
                                    <li>
                                        <div class="tag-wrap">
                                            <i class="fa-solid fa-tag"></i>
                                            <h4 class="tag-title">{{ optional($blog->category)->name }}</h4>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tag-wrap">
                                            <i class="fa-regular fa-comment"></i>
                                            <h4 class="tag-title">Comments ({{ $blog->comments->count() }})</h4>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tag-wrap">
                                            <i class="fa-solid fa-calendar-day"></i>
                                            <h4 class="tag-title">{{ $blog->created_at->format('d M Y') }}</h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <h2 class="title"><a href="{{ route('blog.details', $blog->slug) }}">{{ $blog->title }}</a>
                            </h2>
                            <p class="para">{{ Str::limit($blog->short_description, 180) }}</p>


                            <div class="tmp-button-here">
                                <a class="tmp-btn hover-icon-reverse radius-round btn-border btn-md" href="{{ route('blog.details', $blog->slug) }}">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Read More</span>
                                    <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty

                    <div class="alert alert-warning"> No blogs found. </div> 
                    @endforelse
                    
                    {{-- Pagination --}}
                    @if ($blogs->hasPages())

                    <div class="tmp-pagination-button">

                        {{-- Previous Page --}}
                        @if ($blogs->onFirstPage())

                            <span class="pagination-btn disabled">
                                <i class="fa-sharp fa-regular fa-arrow-left"></i>
                            </span>

                        @else

                            <a href="{{ $blogs->previousPageUrl() }}"
                            class="pagination-btn">

                                <i class="fa-sharp fa-regular fa-arrow-left"></i>

                            </a>

                        @endif


                        {{-- Pagination Numbers --}}
                        @foreach ($blogs->links()->elements[0] ?? [] as $page => $url)

                            @if ($page == $blogs->currentPage())

                                <span class="pagination-btn active">
                                    {{ $page }}
                                </span>

                            @else

                                <a href="{{ $url }}"
                                class="pagination-btn">

                                    {{ $page }}

                                </a>

                            @endif

                        @endforeach


                        {{-- Next Page --}}
                        @if ($blogs->hasMorePages())

                            <a href="{{ $blogs->nextPageUrl() }}"
                            class="pagination-btn">

                                <i class="fa-sharp fa-regular fa-arrow-right"></i>

                            </a>

                        @else

                            <span class="pagination-btn disabled">
                                <i class="fa-sharp fa-regular fa-arrow-right"></i>
                            </span>
                            <h3 class="post-title"><a class="link" href="#">Technological Innovations: Shaping the Future</a>
                                        </h3>

                        @endif

                    </div>

                    @endif


                </div>
                <div class="col-lg-4">
                    <div class="tmp-sidebar">
                        <div class="signle-side-bar search-area tmponhover">
                            <div class="body">
                                <div class="search-area">
                                    <form action="{{ route('blogs') }}" method="GET" class="search-area">
                                        <input type="text" name="search" placeholder="Type here" value="{{ request('search') }}" required>
                                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="signle-side-bar recent-post-area tmponhover">
                            <div class="header">
                                <h3 class="title">Categories</h3>
                            </div>
                            <div class="body">
                                @foreach($categories as $category)
                                <a href="{{ route('blogs', ['category' => $category->slug]) }}" class="single-post">
                                    <span class="single-post-left">
                                    <i class="fa-solid fa-arrow-right"></i>
                                    
                                    <span class="post-title">{{ $category->name }}</span>
                                    </span>
                                    <span class="post-num"> ({{ $category->blogs_count }})</span>
                                </a>
                                 @endforeach
                                 
                                
                            </div>
                        </div>
                        <div class="signle-side-bar recent-post-area tmponhover">
                            <div class="header">
                                <h3 class="title">Recent Post</h3>
                            </div>
                            @foreach($latestBlogs as $recentBlog)
                            <div class="body">
                                <div class="single-post-card tmp-hover-link">
                                    <div class="single-post-card-img">
                                        <img src="{{ asset('uploads/blogs/'.$recentBlog->image) }}" alt="{{ $recentBlog->title }}">
                                    </div>
                                    <div class="single-post-right">
                                        <h3 class="post-title"><a class="link" href="{{ route('blog.details', $recentBlog->slug) }}">{{ Str::limit($recentBlog->title, 40) }}</a>
                                        </h3>
                                    </div>
                                   
                                </div>
                                 <h3 class="post-title"> </h3>
                            </div>
                            @endforeach
                        </div>
                        <div class="signle-side-bar tmponhover">
                            <div class="header">
                                <h3 class="title">About Me</h3>
                            </div>
                            <div class="body">
                                <div class="about-me-details">
                                    <div class="about-me-details-head">
                                        <div class="about-me-img">
                                            <img src="{{ asset('frontend-assets/images/blog/about-me-user-img.png') }}" alt="about-me-user-img">
                                        </div>
                                        <div class="about-me-right-content">
                                            <h3 class="title">Shekh Mohsin</h3>
                                            <p class="para">Full Stack Developer </p>
                                            <div class="social-link">
                                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="about-me-para" style="text-align: justify;">Passionate Web Designer & Developer specializing in modern, responsive, and user-friendly websites. Experienced in Laravel, WordPress and freelance web solutions that help businesses grow online.</p>
                                </div>
                            </div>
                        </div>
                        <div class="signle-side-bar tmponhover">
                            <div class="header">
                                <h3 class="title">Tags</h3>
                            </div>
                            <div class="body">
                                <div class="tags-wrapper">
                                    <a class="tag-link">All Project</a>
                                    <a class="tag-link">Web Design</a>
                                    <a class="tag-link">PHP</a>
                                    <a class="tag-link">Wordpress</a>
                                    <a class="tag-link">Laravel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection