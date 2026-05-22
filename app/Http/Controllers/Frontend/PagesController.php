<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Project;
use App\Models\ProjectCategory;

class PagesController extends Controller
{
    public function home()
    {

        $blogs = Blog::latest()->take(3)->get();
        $projects = Project::latest()->take(4)->get();

        return view('frontend.pages.index', compact(
            'blogs',
            'projects'
        ));
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function services()
    {
        $services = Service::latest()->get();

        return view('frontend.pages.services', compact('services'));
    }

    public function serviceDetails(Service $service)
    {
        $categories = ServiceCategory::withCount('services')->get();

        return view('frontend.pages.service-details', compact('service', 'categories'));
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
        $projects = Project::with('category')->latest()->get();
        $projectCategories = ProjectCategory::withCount('projects')->get();

        return view('frontend.pages.projects', compact(
            'projects',
            'projectCategories'
        ));
    }

    public function projectDetails(Project $project)
    {
        $relatedProjects = Project::where('id', '!=', $project->id)
            ->where('project_category_id', $project->project_category_id)
            ->latest()
            ->take(4)
            ->get();

        return view('frontend.pages.project-details', compact(
            'project',
            'relatedProjects'
        ));
    }
    public function contact()
    {
        return view('frontend.pages.contact');
    }
}
