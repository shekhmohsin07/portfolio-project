@extends('backend.layouts.master')

@section('content')

<div class="container-fluid py-4">

    <!-- Header -->
    <div class="row align-items-center mb-4"
         style="margin-top: 60px;">

        <div class="col-md-6">

            <h2 class="fw-bold mb-1 text-dark">
                Edit Project Category
            </h2>

            <p class="text-muted mb-0">
                Update project category information.
            </p>

        </div>

        <div class="col-md-6 text-md-end mt-3 mt-md-0">

            <a href="{{ route('project-categories.index') }}"
               class="btn btn-dark rounded-4 px-4 py-2 fw-semibold shadow-sm">

                <i class="fas fa-arrow-left me-2"></i>
                Back

            </a>

        </div>

    </div>

    <!-- Form -->
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <form action="{{ route('project-categories.update', $projectCategory->slug) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="row">

                    <!-- Name -->
                    <div class="col-md-12 mb-4">

                        <label class="form-label fw-semibold text-dark">

                            Category Name
                            <span class="text-danger">*</span>

                        </label>

                        <input type="text"
                               name="name"
                               class="form-control rounded-4 shadow-sm @error('name') is-invalid @enderror"
                               value="{{ old('name', $projectCategory->name) }}"
                               placeholder="Enter category name"
                               style="height: 50px;">

                        @error('name')

                        <div class="invalid-feedback">

                            {{ $message }}

                        </div>

                        @enderror

                    </div>

                    <!-- Button -->
                    <div class="col-md-12">

                        <button type="submit"
                                class="btn btn-primary rounded-4 px-5 py-2 fw-semibold shadow-sm">

                            <i class="fas fa-save me-2"></i>
                            Update Category

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection