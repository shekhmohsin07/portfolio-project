@extends('backend.layouts.master')

@section('content')

<div class="container-fluid py-4">

    <!-- Header -->
    <div class="row align-items-center mb-4" style="margin-top: 60px;">

        <div class="col-md-6">

            <h2 class="fw-bold mb-1 text-dark">
                Edit Service
            </h2>

            <p class="text-muted mb-0">
                Update service information.
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

            <form action="{{ route('services.update', $service->slug) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row">

                    <!-- Category -->
                    <div class="col-md-6 mb-4">

                        <label class="form-label fw-semibold text-dark">
                            Category
                        </label>

                        <select name="service_category_id"
                                class="form-select rounded-4 shadow-sm">

                            @foreach($categories as $category)

                                <option value="{{ $category->id }}"
                                    {{ $service->service_category_id == $category->id ? 'selected' : '' }}>

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

                            <option value="active"
                                {{ $service->status == 'active' ? 'selected' : '' }}>

                                Active

                            </option>

                            <option value="inactive"
                                {{ $service->status == 'inactive' ? 'selected' : '' }}>

                                Inactive

                            </option>

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
                               value="{{ old('title', $service->title) }}"
                               style="height:50px;">

                    </div>

                    <!-- Short Description -->
                    <div class="col-md-12 mb-4">

                        <label class="form-label fw-semibold text-dark">
                            Short Description
                        </label>

                        <textarea name="short_description"
                                  rows="3"
                                  class="form-control rounded-4 shadow-sm">{{ old('short_description', $service->short_description) }}</textarea>

                    </div>

                    <!-- Description -->
                    <div class="col-md-12 mb-4">

                        <label class="form-label fw-semibold text-dark">
                            Description
                        </label>

                        <textarea name="description"
                                  rows="6"
                                  class="form-control rounded-4 shadow-sm">{{ old('description', $service->description) }}</textarea>

                    </div>

                    <!-- Current Image -->
                    <div class="col-md-12 mb-3">

                        <label class="form-label fw-semibold text-dark">
                            Current Image
                        </label>

                        <div>

                            @if($service->image)

                                <img src="{{ asset('uploads/services/' . $service->image) }}"
                                     alt=""
                                     class="rounded-4 shadow-sm"
                                     width="120">

                            @else

                                <p class="text-muted">
                                    No image uploaded
                                </p>

                            @endif

                        </div>

                    </div>

                    <!-- New Image -->
                    <div class="col-md-12 mb-4">

                        <label class="form-label fw-semibold text-dark">
                            Change Image
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
                            Update Service

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection