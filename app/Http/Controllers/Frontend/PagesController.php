<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class PagesController extends Controller
{
    public function home()
    {

        $blogs = Blog::latest()->take(3)->get();

        return view('frontend.pages.index', compact('blogs'));
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function services()
    {
        return view('frontend.pages.services');
    }

    public function blogs()
    {
        return view('frontend.pages.blogs');
    }

    public function blogDetails(Blog $blog)
    {
        $blog->load([
            'comments' => function ($query) {
                $query->where('status', 'approved')
                    ->latest();
            },
            'category'
        ]);

        $latestBlogs = Blog::latest()
                        ->where('id', '!=', $blog->id)
                        ->take(3)
                        ->get();

        return view('frontend.pages.blog-details', compact(
            'blog',
            'latestBlogs'
        ));
    }

    public function projects()
    {
        return view('frontend.pages.projects');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }
}
