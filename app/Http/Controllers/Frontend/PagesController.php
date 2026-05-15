<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;

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

    public function blogs(Request $request)
    {
        $blogs = Blog::with(['category', 'comments']) 
                        ->when($request->search, function ($query) use ($request) { 
                        $query->where('title', 'like', '%' . $request->search . '%') 
                        ->orWhere('short_description', 'like', '%' . $request->search . '%'); }) 
                        ->latest() ->paginate(3);
        $categories = BlogCategory::withCount('blogs')
                    ->having('blogs_count', '>', 0)
                    ->get();
        $latestBlogs = Blog::take(4)
                        ->get();
        return view('frontend.pages.blogs', compact(
            'blogs',
            'latestBlogs',
            'categories'
            ));
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
                        ->take(4)
                        ->get();
        $categories = BlogCategory::withCount('blogs')
                    ->having('blogs_count', '>', 0)
                    ->get();

        return view('frontend.pages.blog-details', compact(
            'blog',
            'latestBlogs',
            'categories'
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
