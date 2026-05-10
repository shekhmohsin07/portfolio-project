<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with('category')->latest()->paginate(10);

        return view('backend.pages.blogs.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::all();

        return view('backend.pages.blogs.blog.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'blog_category_id' => 'required',
            'title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/blogs'), $imageName);
        }

        Blog::create([
            'blog_category_id' => $request->blog_category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'image' => $imageName,
            'short_description' => $request->short_description,
            'description' => $request->description,
        ]);

        return redirect()->route('blogs.index')->with('success','Blog created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = BlogCategory::all();

        return view('backend.pages.blogs.blog.edit', compact('blog','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'blog_category_id' => 'required',
            'title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'image' => 'nullable|image',
        ]);

        $imageName = $blog->image;

        if ($request->hasFile('image')) {

            if ($blog->image && file_exists(public_path('uploads/blogs/'.$blog->image))) {
                unlink(public_path('uploads/blogs/'.$blog->image));
            }

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/blogs'), $imageName);
        }

        $blog->update([
            'blog_category_id' => $request->blog_category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'image' => $imageName,
            'short_description' => $request->short_description,
            'description' => $request->description,
        ]);

        return redirect()->route('blogs.index')->with('success','Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if ($blog->image && file_exists(public_path('uploads/blogs/'.$blog->image))) {
            unlink(public_path('uploads/blogs/'.$blog->image));
        }

        $blog->delete();

        return back()->with('success','Deleted');
    }
}
