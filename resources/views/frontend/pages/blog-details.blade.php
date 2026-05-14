@extends('frontend.layouts.master')
@section('content')

        <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h1 class="title split-collab">Blog Details</h1>
                        <ul class="page-list">
                            <li class="tmp-breadcrumb-item"><a href="https://inversweb.com/">Home</a></li>
                            <li class="icon"><i class="fa-solid fa-angle-right"></i></li>
                            <li class="tmp-breadcrumb-item active">Blog Details</li>
                        </ul>
                        <!-- <div class="circle-1"></div> -->
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
                    <div class="blog-details-left-area">
                        <div class="thumbnail-top">
                            <img src="{{ asset('uploads/blogs/'.$blog->image) }}" alt="Corporate_business">
                        </div>
                        <div class="blog-details-discription">
                            <div class="blog-classic-tag">
                                <h4 class="title">By Admin</h4>
                                <ul>
                                    <li>
                                        <div class="tag-wrap">
                                            <i class="fa-solid fa-tag"></i>
                                            <h4 class="tag-title">{{ optional($blog->category)->name }}</h4>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="tag-wrap">
                                            <i class="fa-solid fa-calendar-day"></i>
                                            <h4 class="tag-title">Comments ({{ $blog->comments->count() }})</h4>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="title split-collab">{{ $blog->title }}</h3>
                            <p class="disc">
                                {{ $blog->short_description }}
                            </p>
                            <p class="disc">
                                {!! $blog->description !!}
                            </p>
                        </div>
                        
                        <div class="blog-details-discription">
                            @php
                                $previousPost = \App\Models\Blog::where('id', '<', $blog->id)->latest('id')->first();
                                $nextPost = \App\Models\Blog::where('id', '>', $blog->id)->oldest('id')->first();
                            @endphp

                            <div class="our-portfolio-swiper">                      
                                <div class="our-portfolio-swiper-btn-wrap">
                                     <!-- Previous Post -->
                                    @if($previousPost)
                                    <a href="{{ route('blog.details', $previousPost->slug) }}" class="prev-btn">
                                        <div class="tmp-arrow-btn">
                                            <i class="fa-solid fa-arrow-left"></i>
                                        </div>
                                        <div class="btn-content">
                                            <span class="para">Previous post</span>
                                            <h4 class="title">{{ Str::limit($previousPost->title, 35) }}</h4>
                                        </div>
                                    </a>
                                     @endif

                                     <!-- Next Post -->
                                    @if($nextPost)
                                    <a href="{{ route('blog.details', $nextPost->slug) }}" class="next-btn">
                                        <div class="btn-content">
                                            <span class="para">Next post</span>
                                            <h4 class="title">{{ Str::limit($nextPost->title, 35) }}</h4>
                                        </div>
                                        <div class="tmp-arrow-btn">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </div>
                                    </a>
                                     @endif

                                </div>
                            </div>

                            <div class="blog-details-navigation">
                                <div class="navigation-tags">
                                    <h3 class="tag-title">Keyword:</h3>
                                    <ul>
                                        <li>
                                            <p class="tag">Website Design</a></p>
                                        </li>
                                        <li>
                                            <p class="tag">Business Website</a></p>
                                        </li>
                                        <li>
                                            <p class="tag">Website Development</a></p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="social-link footer">
                                    <a href="https://facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                                        target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->fullUrl()) }}"
                                        target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($blog->title) }}"
                                        target="_blank"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="https://api.whatsapp.com/send?text={{ urlencode($blog->title.' '.request()->fullUrl()) }}"
                                        target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
                                </div>
                            </div>
                            <!-- Comment Area Main Wrapper Start -->
                            <div class="comment-area-main-wrapper mt--30">
                                <h3 class="title">Comments ({{ $blog->comments->count() }})</h3>

                                @forelse($blog->comments->whereNull('parent_id') as $comment)
                                <div class="single-comment-audience">
                                    <div class="author-image tmponhover">
                                        <img src="{{ asset('frontend-assets/images/blog/comments-img-1.png') }}" alt="Corporate_business">
                                    </div>
                                    <div class="right-area-commnet">
                                        <div class="top-area-comment">
                                            <div class="left">
                                                <h6 class="title">{{ $comment->name }}</h6>
                                                <span>{{ $comment->created_at->format('F d, Y') }}</span>
                                            </div>
                                            {{-- <div class="social-link-inner">
                                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                            </div> --}}
                                        </div>
                                        <p class="disc">
                                            {{ $comment->comment }}
                                        </p>
                                        <a href="javascript:void(0)" class="reply-btn" onclick="openReplyForm({{ $comment->id }})">
                                            Reply
                                        </a>
                                        
                                        <!-- Replies -->
                                        @foreach($comment->replies as $reply)

                                        <div style="margin-left:80px; margin-top:15px;">

                                            <strong>{{ $reply->name }}</strong>

                                            <p>{{ $reply->comment }}</p>

                                        </div>

                                        @endforeach
                                    </div>
                                </div>
                                 @empty
                                 <p>
                                    No comments found.
                                </p>

                                @endforelse

                                
                                
                            </div>
                            <!-- Comment Area Main Wrapper End -->

                            <!-- Blog Details Form Wrapper Start -->
                            <div class="blog-details-form-wrapper tmponhover" id="main-comment-form">
                                <h4 class="title">Leave a comment</h4>
                                <span class="subtitle">By using form u agree with the message sorage, you can contact us directly
                                    now</span>
                                <form action="{{ route('comments.store') }}"  method="POST" class="blog-details-form">
                                    @csrf
                                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                    <div class="single-input">
                                        <label>Your Name</label>
                                        <input type="text" name="name" placeholder="Name">
                                    </div>
                                    <div class="single-input">
                                        <label>Your Email</label>
                                        <input type="text" name="email" placeholder="Email">
                                    </div>
                                    <label>Message</label>
                                    <textarea name="comment" placeholder="Message here.."></textarea>

                                    <div class="blog-submit-btn mt--40">
                                        <div class="tmp-button-here">
                                            <a class="tmp-btn hover-icon-reverse radius-round w-100" href="blog-details.html">
                                                <span class="icon-reverse-wrapper">
                                                    <span class="btn-text">Submit Now</span>
                                                <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                                <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>

                                </form>
                    
                            </div>

                            <div class="blog-details-form-wrapper tmponhover" id="reply-form" Style="display:none;">
                                <h4 class="title">Leave a Reply</h4>
                                <span class="subtitle">By using form u agree with the message sorage, you can contact us directly
                                    now</span>
                                <form action="{{ route('comments.store') }}"  method="POST" class="blog-details-form">
                                    @csrf
                                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                    <input type="hidden" name="parent_id" id="reply-parent-id">
                                    <div class="single-input">
                                        <label>Your Name</label>
                                        <input type="text" name="name" placeholder="Name">
                                    </div>
                                    <div class="single-input">
                                        <label>Your Email</label>
                                        <input type="text" name="email" placeholder="Email">
                                    </div>
                                    <label>Message</label>
                                    <textarea name="comment" placeholder="Message here.."></textarea>

                                    <div class="blog-submit-btn mt--40">
                                        <div class="tmp-button-here">
                                            <a class="tmp-btn hover-icon-reverse radius-round w-100" href="blog-details.html">
                                                <span class="icon-reverse-wrapper">
                                                    <span class="btn-text">Submit Now</span>
                                                <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                                <span class="btn-icon"><i class="fa-sharp fa-regular fa-arrow-right"></i></span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="blog-submit-btn mt--20">
                                        <div class="tmp-button-here">

                                            <button type="button"
                                                    class="tmp-btn hover-icon-reverse radius-round w-100"
                                                    onclick="closeReplyForm()">

                                                <span class="icon-reverse-wrapper">

                                                    <span class="btn-text">Cancel</span>

                                                    <span class="btn-icon">
                                                        <i class="fa-sharp fa-regular fa-xmark"></i>
                                                    </span>

                                                    <span class="btn-icon">
                                                        <i class="fa-sharp fa-regular fa-xmark"></i>
                                                    </span>

                                                </span>
                                            </button>

                                        </div>
                                    </div>

                                    

                                </form>
                            
                            </div>
                            <!-- Blog Details Form Wrapper End -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="tmp-sidebar">
                        <div class="signle-side-bar search-area tmponhover">
                            <div class="body">
                                <div class="search-area">
                                    <input type="text" placeholder="Type here" required>
                                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="signle-side-bar recent-post-area tmponhover">
                            <div class="header">
                                <h3 class="title">Recent Post</h3>
                            </div>
                            <div class="body">
                                <a href="#" class="single-post">
                                    <span class="single-post-left">
                    <i class="fa-solid fa-arrow-right"></i>
                    <span class="post-title">Business Solution</span>
                                    </span>
                                    <span class="post-num">(01)</span>
                                </a>
                                <a href="#" class="single-post">
                                    <span class="single-post-left">
                    <i class="fa-solid fa-arrow-right"></i>
                    <span class="post-title">Web Development Wizardry</span>
                                    </span>
                                    <span class="post-num">(08)</span>
                                </a>
                                <a href="#" class="single-post">
                                    <span class="single-post-left">
                    <i class="fa-solid fa-arrow-right"></i>
                    <span class="post-title">Content Creation and Strategy</span>
                                    </span>
                                    <span class="post-num">(05)</span>
                                </a>
                                <a href="#" class="single-post">
                                    <span class="single-post-left">
                    <i class="fa-solid fa-arrow-right"></i>
                    <span class="post-title">UI/UX Design Innovation</span>
                                    </span>
                                    <span class="post-num">(05)</span>
                                </a>
                            </div>
                        </div>
                        <div class="signle-side-bar recent-post-area tmponhover">
                            <div class="header">
                                <h3 class="title">Recent Post</h3>
                            </div>
                            <div class="body">
                                <div class="single-post-card tmp-hover-link">
                                    <div class="single-post-card-img">
                                        <img src="assets/images/blog/single-post-card-img-1.png" alt="">
                                    </div>
                                    <div class="single-post-right">
                                        <div class="single-post-top">
                                            <i class="fa-regular fa-folder-open"></i>
                                            <p class="post-title">Category</p>
                                        </div>
                                        <h3 class="post-title"><a class="link" href="#">Sustainable Solutions: Designing for Tomorrow</a>
                                        </h3>
                                    </div>
                                </div>
                                <div class="single-post-card tmp-hover-link">
                                    <div class="single-post-card-img">
                                        <img src="assets/images/blog/single-post-card-img-2.png" alt="">
                                    </div>
                                    <div class="single-post-right">
                                        <div class="single-post-top">
                                            <i class="fa-regular fa-folder-open"></i>
                                            <p class="post-title">Category</p>
                                        </div>
                                        <h3 class="post-title"><a class="link" href="#">Technological Innovations: Shaping the Future</a>
                                        </h3>
                                    </div>
                                </div>
                                <div class="single-post-card tmp-hover-link">
                                    <div class="single-post-card-img">
                                        <img src="assets/images/blog/single-post-card-img-3.png" alt="">
                                    </div>
                                    <div class="single-post-right">
                                        <div class="single-post-top">
                                            <i class="fa-regular fa-folder-open"></i>
                                            <p class="post-title">Category</p>
                                        </div>
                                        <h3 class="post-title"><a class="link" href="#">Adventure Awaits Exploring the Great Outdoors</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="signle-side-bar tmponhover">
                            <div class="header">
                                <h3 class="title">About Me</h3>
                            </div>
                            <div class="body">
                                <div class="about-me-details">
                                    <div class="about-me-details-head">
                                        <div class="about-me-img">
                                            <img src="assets/images/blog/about-me-user-img.png" alt="about-me-user-img">
                                        </div>
                                        <div class="about-me-right-content">
                                            <h3 class="title">Fatima Afrafy</h3>
                                            <p class="para">UI/UX Designer </p>
                                            <div class="social-link">
                                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="about-me-para">Aliquam eros justo, posuere loborti viverra ullamcorper posuere
                                        viverra .Aliquam eros justo, posuere justo, posuere.</p>
                                </div>
                            </div>
                        </div>
                        <div class="signle-side-bar tmponhover">
                            <div class="header">
                                <h3 class="title">Tags</h3>
                            </div>
                            <div class="body">
                                <div class="tags-wrapper">
                                    <a href="#" class="tag-link">All Project</a>
                                    <a href="#" class="tag-link">Resume</a>
                                    <a href="#" class="tag-link">Graphics</a>
                                    <a href="#" class="tag-link">Web Design</a>
                                    <a href="#" class="tag-link">CV</a>
                                    <a href="#" class="tag-link">Starts</a>
                                    <a href="#" class="tag-link">Creative Portfolio</a>
                                    <a href="#" class="tag-link">Portfolio</a>
                                    <a href="#" class="tag-link">CV Card</a>
                                    <a href="#" class="tag-link">Start shape</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script>
        function openReplyForm(commentId) {

            const mainForm = document.getElementById('main-comment-form');
            const replyForm = document.getElementById('reply-form');
            const parentId = document.getElementById('reply-parent-id');

            if (!mainForm || !replyForm || !parentId) return;

            // hide main form
            mainForm.style.display = 'none';

            // show reply form
            replyForm.style.display = 'block';

            // set parent id
            parentId.value = commentId;

            // 👇 smooth scroll to reply form
            replyForm.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
        }

        function closeReplyForm() {

            const mainForm = document.getElementById('main-comment-form');
            const replyForm = document.getElementById('reply-form');
            const parentId = document.getElementById('reply-parent-id');

            if (!mainForm || !replyForm || !parentId) return;

            // show main form only
            mainForm.style.display = 'block';

            // hide reply form
            replyForm.style.display = 'none';

            // clear parent id
            parentId.value = '';

            // optional: scroll to main form
            mainForm.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    </script>

@endsection


