@extends('backend.layouts.master')

@section('content')

<div class="container-fluid py-4">

    <!-- Header -->
    <div class="d-flex flex-wrap justify-content-between mb-4"
         style="margin-top: 60px !important;">

        <div class="row w-100">

            <!-- Title -->
            <div class="col-md-9 mb-3 mb-md-0">

                <h2 class="fw-bold mb-1 text-dark">
                    Blog Categories
                </h2>

                <p class="text-muted mb-0">
                    Manage all your blog categories easily.
                </p>

            </div>

            <!-- Add Button -->
            <div class="col-md-3 text-md-end">

                <a href="{{ route('blog-categories.create') }}"
                   class="btn btn-primary rounded-4 px-4 py-2 fw-semibold shadow-sm">

                    <i class="bi bi-plus-lg me-2"></i>

                    Add New Category

                </a>

            </div>

        </div>

    </div>

    <!-- Table -->
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table align-middle mb-0">

                    <thead class="bg-light">

                        <tr>

                            <th class="ps-4 py-3 small fw-bold">
                                SL
                            </th>

                            <th class="py-3 small fw-bold">
                                Category Name
                            </th>

                            <th class="py-3 small fw-bold">
                                Slug
                            </th>

                            <th class="py-3 small fw-bold">
                                Status
                            </th>

                            <th class="py-3 text-end pe-4 small fw-bold">
                                Actions
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($categories as $key => $category)

                        <tr>

                            <!-- SL -->
                            <td class="ps-4">

                                <div class="text-primary fw-bold rounded-circle d-flex align-items-center justify-content-center"
                                     style="width:40px; height:40px;">

                                    {{ $key + 1 }}

                                </div>

                            </td>

                            <!-- Category Name -->
                            <td>

                                <div class="fw-bold text-dark">

                                    {{ $category->name }}

                                </div>

                            </td>

                            <!-- Slug -->
                            <td>

                                <span class="text-muted">

                                    {{ $category->slug }}

                                </span>

                            </td>

                            <!-- Status -->
                            <td>

                                <span class="badge rounded-pill bg-success text-light px-3 py-2">

                                    Active

                                </span>

                            </td>

                            <!-- Actions -->
                            <td class="text-end pe-4">

                                <div class="d-flex align-items-center justify-content-end gap-2">

                                    <!-- Edit -->
                                    <a href="{{ route('blog-categories.edit', $category->id) }}"
                                       class="btn btn-sm shadow-sm d-inline-flex align-items-center justify-content-center"
                                       style="width: 32px; height: 32px; border-radius: 6px; background-color: #0dcaf0; color: #fff; border: none;"
                                       title="Edit">

                                        <i class="fas fa-pencil-alt"
                                           style="font-size: 12px;"></i>

                                    </a>

                                    <!-- Delete -->
                                    <form action="{{ route('blog-categories.destroy', $category->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Delete this category?');"
                                          class="d-inline-block m-0">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-sm shadow-sm d-inline-flex align-items-center justify-content-center"
                                                style="width: 32px; height: 32px; border-radius: 6px; background-color: #ff4d4d; color: #fff; border: none;"
                                                title="Delete">

                                            <i class="fas fa-trash-alt"
                                               style="font-size: 12px;"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5" class="text-center py-5">

                                <div class="text-muted">

                                    <i class="bi bi-folder-x display-5"></i>

                                    <p class="mt-3 mb-0">
                                        No blog categories found.
                                    </p>

                                </div>

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <!-- Pagination -->
        @if(method_exists($categories, 'links'))

        <div class="card-footer bg-white border-0 py-3">

            {{ $categories->links('pagination::bootstrap-5') }}

        </div>

        @endif

    </div>

</div>

@endsection