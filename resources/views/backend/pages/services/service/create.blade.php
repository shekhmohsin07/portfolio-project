@extends('backend.layouts.master')

@section('content')

<div class="container-fluid py-4">

    <!-- Header -->
    <div class="row align-items-center mb-4" style="margin-top: 60px;">

        <div class="col-md-6">

            <h2 class="fw-bold mb-1 text-dark">
                Create Service
            </h2>

            <p class="text-muted mb-0">
                Add a new service for your website.
            </p>

        </div>

        <div class="col-md-6 text-md-end mt-3 mt-md-0">

            <a href="{{ route('services.index') }}"
               class="btn btn-dark rounded-4 px-4 py-2 fw-semibold shadow-sm">

                <i class="fas fa-arrow-left me-2"></i>
                Back

            </a>

        </div>

    </div>

    <!-- Form Card -->
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <form action="{{ route('services.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <!-- Category -->
                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold text-dark">
                            Category
                        </label>

                        <select name="service_category_id"
                                class="form-select rounded-4 shadow-sm">

                            <option value="">
                                Select Category
                            </option>

                            @foreach($categories as $category)

                                <option value="{{ $category->id }}"
                                    {{ old('service_category_id') == $category->id ? 'selected' : '' }}>

                                    {{ $category->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- Status -->
                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold text-dark">
                            Status
                        </label>

                        <select name="status"
                                class="form-select rounded-4 shadow-sm">

                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>

                        </select>

                    </div>

                    <!-- Title -->
                    <div class="col-md-12 mb-4">

                        <label class="form-label fw-semibold text-dark">
                            Service Title
                        </label>

                        <input type="text"
                               name="title"
                               class="form-control rounded-4 shadow-sm"
                               placeholder="Enter service title"
                               value="{{ old('title') }}"
                               style="height:50px;">

                    </div>

                    <!-- Short Description -->
                    <div class="col-md-12 mb-4">

                        <label class="form-label fw-semibold text-dark">
                            Short Description
                        </label>

                        <textarea name="short_description"
                                  rows="3"
                                  class="form-control rounded-4 shadow-sm"
                                  placeholder="Enter short description">{{ old('short_description') }}</textarea>

                    </div>

                    <!-- Description -->
                    <div class="col-md-12 mb-4">

                        <label class="form-label fw-semibold text-dark">
                            Description
                        </label>

                        <textarea name="description"
                                  rows="6"
                                  class="form-control rounded-4 shadow-sm"
                                  placeholder="Enter full description">{{ old('description') }}</textarea>

                    </div>

                    <!-- Image -->
                    <div class="col-md-12 mb-4">

                        <label class="form-label fw-semibold text-dark">
                            Service Image
                        </label>

                        <input type="file"
                               name="image"
                               class="form-control rounded-4 shadow-sm"
                               style="height:50px;">

                    </div>

                    <!-- Submit -->
                    <div class="col-md-12">

                        <button type="submit"
                                class="btn btn-primary rounded-4 px-5 py-2 fw-semibold shadow-sm">

                            <i class="fas fa-save me-2"></i>
                            Save Service

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection