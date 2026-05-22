<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('category')
                    ->latest()
                    ->paginate(10);

        return view('backend.pages.projects.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ProjectCategory::latest()->get();

        return view('backend.pages.projects.project.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_category_id' => 'required',
            'title' => 'required',
            'image' => 'nullable|image',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {

            $imageName = time().'.'.$request->image->extension();

            $request->image->move(
                public_path('uploads/projects'),
                $imageName
            );
        }
        Project::create([

            'project_category_id' => $request->project_category_id,

            'title' => $request->title,

            'slug' => Str::slug($request->title),

            'image' => $imageName,

            'short_description' => $request->short_description,

            'description' => $request->description,

            'client_name' => $request->client_name,

            'project_url' => $request->project_url,

            'project_date' => $request->project_date,

            'status' => $request->status,
        ]);

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $categories = ProjectCategory::latest()->get();

        return view('backend.pages.projects.project.edit', compact('project', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'project_category_id' => 'required',
            'title' => 'required',
        ]);

        $imageName = $project->image;

        if ($request->hasFile('image')) {

            if ($project->image &&
                file_exists(public_path('uploads/projects/'.$project->image))) {

                unlink(public_path('uploads/projects/'.$project->image));
            }

            $imageName = time().'.'.$request->image->extension();

            $request->image->move(
                public_path('uploads/projects'),
                $imageName
            );
        }

        $project->update([

            'project_category_id' => $request->project_category_id,

            'title' => $request->title,

            'slug' => Str::slug($request->title),

            'image' => $imageName,

            'short_description' => $request->short_description,

            'description' => $request->description,

            'client_name' => $request->client_name,

            'project_url' => $request->project_url,

            'project_date' => $request->project_date,

            'status' => $request->status,
        ]);

        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->image &&
            file_exists(public_path('uploads/projects/'.$project->image))) {

            unlink(public_path('uploads/projects/'.$project->image));
        }

        $project->delete();

        return back();
    }
}
