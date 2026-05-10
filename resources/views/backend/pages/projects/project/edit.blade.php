@extends('backend.layouts.master')

@section('content')

<div class="container-fluid py-4">

<div style="margin-top:60px;">

<h2 class="fw-bold">
    Edit Project
</h2>

</div>

<div class="card border-0 shadow-sm rounded-4">

<div class="card-body p-4">

<form action="{{ route('projects.update', $project->slug) }}"
      method="POST"
      enctype="multipart/form-data">

@csrf
@method('PUT')

<div class="row">

<!-- Category -->
<div class="col-md-6 mb-3">

<label class="form-label">
    Category
</label>

<select name="project_category_id"
        class="form-control">

@foreach($categories as $category)

<option value="{{ $category->id }}"
{{ $project->project_category_id == $category->id ? 'selected' : '' }}>

{{ $category->name }}

</option>

@endforeach

</select>

</div>

<!-- Title -->
<div class="col-md-6 mb-3">

<label class="form-label">
    Title
</label>

<input type="text"
       name="title"
       value="{{ $project->title }}"
       class="form-control">

</div>

<!-- Client -->
<div class="col-md-6 mb-3">

<label class="form-label">
    Client Name
</label>

<input type="text"
       name="client_name"
       value="{{ $project->client_name }}"
       class="form-control">

</div>

<!-- URL -->
<div class="col-md-6 mb-3">

<label class="form-label">
    Project URL
</label>

<input type="text"
       name="project_url"
       value="{{ $project->project_url }}"
       class="form-control">

</div>

<!-- Date -->
<div class="col-md-6 mb-3">

<label class="form-label">
    Project Date
</label>

<input type="date"
       name="project_date"
       value="{{ $project->project_date }}"
       class="form-control">

</div>

<!-- Status -->
<div class="col-md-6 mb-3">

<label class="form-label">
    Status
</label>

<select name="status"
        class="form-control">

<option value="active"
{{ $project->status == 'active' ? 'selected' : '' }}>

Active

</option>

<option value="inactive"
{{ $project->status == 'inactive' ? 'selected' : '' }}>

Inactive

</option>

</select>

</div>

<!-- Image -->
<div class="col-md-12 mb-3">

<label class="form-label">
    Feature Image
</label>

<br>

@if($project->image)

<img src="{{ asset('uploads/projects/'.$project->image) }}"
     width="120"
     class="mb-3 rounded">

@endif

<input type="file"
       name="image"
       class="form-control">

</div>

<!-- Short Description -->
<div class="col-md-12 mb-3">

<label class="form-label">
    Short Description
</label>

<textarea name="short_description"
          class="form-control"
          rows="3">{{ $project->short_description }}</textarea>

</div>

<!-- Description -->
<div class="col-md-12 mb-3">

<label class="form-label">
    Description
</label>

<textarea name="description"
          id="editor"
          class="form-control"
          rows="8">{{ $project->description }}</textarea>

</div>

<!-- Button -->
<div class="col-md-12">

<button class="btn btn-primary">
    Update Project
</button>

</div>

</div>

</form>

</div>

</div>

</div>

<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });
</script>

@endsection