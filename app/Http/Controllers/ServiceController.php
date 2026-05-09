<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::with('category')->latest()->paginate(10);

        return view('backend.pages.services.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ServiceCategory::where('status', 'active')->get();

        return view('backend.pages.services.service.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_category_id' => 'required|exists:service_categories,id',
            'title' => 'required|max:255',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'status' => 'required|in:active,inactive',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads/services'), $imageName);
        }

        Service::create([
            'service_category_id' => $validated['service_category_id'],
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'short_description' => $validated['short_description'],
            'description' => $validated['description'],
            'image' => $imageName,
            'status' => $validated['status'],
        ]);

        return redirect()
            ->route('services.index')
            ->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $categories = ServiceCategory::where('status', 'active')->get();

        return view('backend.pages.services.service.edit', compact('service', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'service_category_id' => 'required|exists:service_categories,id',
            'title' => 'required|max:255',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'status' => 'required|in:active,inactive',
        ]);

        $imageName = $service->image;

        if ($request->hasFile('image')) {

            if ($service->image && file_exists(public_path('uploads/services/' . $service->image))) {

                unlink(public_path('uploads/services/' . $service->image));
            }

            $image = $request->file('image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads/services'), $imageName);
        }

        $service->update([
            'service_category_id' => $validated['service_category_id'],
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'short_description' => $validated['short_description'],
            'description' => $validated['description'],
            'image' => $imageName,
            'status' => $validated['status'],
        ]);

        return redirect()
            ->route('services.index')
            ->with('success', 'Service updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        if ($service->image && file_exists(public_path('uploads/services/' . $service->image))) {

            unlink(public_path('uploads/services/' . $service->image));
        }

        $service->delete();

        return redirect()
            ->route('services.index')
            ->with('success', 'Service deleted successfully.');
    }

}
