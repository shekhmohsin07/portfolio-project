@extends('backend.layouts.master')

@section('content')

    <div class="container-fluid py-4">

        <div style="margin-top:60px;">

            <h2>Create Blog</h2>

        </div>

        <div class="card shadow-sm border-0 rounded-4">

            <div class="card-body p-4">

                <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">

                <select name="blog_category_id" class="form-control">

                    <option>Select Category</option>

                    @foreach($categories as $cat)

                    <option value="{{ $cat->id }}">
                        {{ $cat->name }}
                    </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <input type="text" name="title" class="form-control" placeholder="Title">

            </div>

            <div class="mb-3">
                <input type="file" name="image" class="form-control">
            </div>

            <div class="mb-3">
                <textarea name="short_description" class="form-control" placeholder="Short Description"></textarea>
            </div>

            <div class="mb-3">
                <textarea name="description" class="form-control" rows="5" placeholder="Description"></textarea>
            </div>

            <button class="btn btn-primary">
                Save
            </button>

            </form>

        </div>

    </div>

</div>

@endsection