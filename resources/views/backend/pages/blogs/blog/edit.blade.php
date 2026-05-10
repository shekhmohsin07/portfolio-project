@extends('backend.layouts.master')

@section('content')

<div class="container-fluid py-4">

<div style="margin-top:60px;">

<h2>Edit Blog</h2>

</div>

<div class="card shadow-sm border-0 rounded-4">

<div class="card-body p-4">

<form action="{{ route('blogs.update',$blog->id) }}"
      method="POST"
      enctype="multipart/form-data">

@csrf
@method('PUT')

<select name="blog_category_id" class="form-control mb-3">

@foreach($categories as $cat)

<option value="{{ $cat->id }}"
{{ $blog->blog_category_id == $cat->id ? 'selected' : '' }}>

{{ $cat->name }}

</option>

@endforeach

</select>

<input type="text"
       name="title"
       value="{{ $blog->title }}"
       class="form-control mb-3">

<img src="{{ asset('uploads/blogs/'.$blog->image) }}"
     width="100"
     class="mb-3">

<input type="file"
       name="image"
       class="form-control mb-3">

<textarea name="short_description"
          class="form-control mb-3">{{ $blog->short_description }}</textarea>

<textarea name="description"
          class="form-control mb-3"
          rows="5">{{ $blog->description }}</textarea>

<button class="btn btn-success">
    Update
</button>

</form>

</div>

</div>

</div>

@endsection