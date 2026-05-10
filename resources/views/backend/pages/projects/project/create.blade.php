@extends('backend.layouts.master')

@section('content')

<div class="container-fluid py-4">

<div style="margin-top:60px;">

<h2 class="fw-bold">
    Create Project
</h2>

</div>

<div class="card border-0 shadow-sm rounded-4">

<div class="card-body p-4">

<form action="{{ route('projects.store') }}"
      method="POST"
      enctype="multipart/form-data">

@csrf

<div class="row">

<div class="col-md-6 mb-3">

<label class="form-label">
    Category
</label>

<select name="project_category_id"
        class="form-control">

<option value="">
    Select Category
</option>

@foreach($categories as $category)

<option value="{{ $category->id }}">

    {{ $category->name }}

</option>

@endforeach

</select>

</div>

<div class="col-md-6 mb-3">

<label class="form-label">
    Title
</label>

<input type="text"
       name="title"
       class="form-control">

</div>

<div class="col-md-6 mb-3">

<label class="form-label">
    Client Name
</label>

<input type="text"
       name="client_name"
       class="form-control">

</div>

<div class="col-md-6 mb-3">

<label class="form-label">
    Project URL
</label>

<input type="text"
       name="project_url"
       class="form-control">

</div>

<div class="col-md-6 mb-3">

<label class="form-label">
    Project Date
</label>

<input type="date"
       name="project_date"
       class="form-control">

</div>

<div class="col-md-6 mb-3">

<label class="form-label">
    Status
</label>

<select name="status"
        class="form-control">

<option value="active">
    Active
</option>

<option value="inactive">
    Inactive
</option>

</select>

</div>

<div class="col-md-12 mb-3">

<label class="form-label">
    Feature Image
</label>

<input type="file"
       name="image"
       class="form-control">

</div>

<div class="col-md-12 mb-3">

<label class="form-label">
    Short Description
</label>

<textarea name="short_description"
          class="form-control"
          rows="3"></textarea>

</div>

<div class="col-md-12 mb-3">

<label class="form-label">
    Description
</label>

<textarea name="description"
          id="editor"
          class="form-control"
          rows="8"></textarea>

</div>

<div class="col-md-12">

<button class="btn btn-primary">
    Save Project
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