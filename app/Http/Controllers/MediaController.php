<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $media = Media::latest()->paginate(18); 

        return view('backend.pages.media.index', compact('media'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp'
        ]);

        $image = $request->file('image');

        $imageName = time() . '_' . rand(1111,9999) . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('uploads/media'), $imageName);

        $media = Media::create([
            'file' => $imageName,
            'type' => $image->getClientMimeType(),
        ]);

        return response()->json([
            'success' => true,
            'media' => $media,
            'url' => asset('uploads/media/' . $imageName)
        ]);

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $medium)
    {
        if ($medium->file && file_exists(public_path('uploads/media/' . $medium->file))) {
            unlink(public_path('uploads/media/' . $medium->file));
        }

        $medium->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
