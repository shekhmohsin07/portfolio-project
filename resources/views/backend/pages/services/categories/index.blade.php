@extends('backend.layouts.master')

@section('content')
<!-- Custom Styles to "Modernize" Bootstrap Defaults -->
<style>
    .card { border-radius: 1rem; border: none; box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.05); }
    .btn-primary { border-radius: 0.75rem; padding: 0.6rem 1.5rem; font-weight: 600; background-color: #4e73df; border: none; }
    .btn-primary:hover { background-color: #2e59d9; transform: translateY(-1px); }
    .table thead th { background-color: #f8f9fc; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.05em; color: #858796; border-top: none; }
    .avatar-circle { width: 40px; height: 40px; background-color: #eef2ff; color: #4e73df; display: flex; align-items: center; justify-content: center; border-radius: 50%; font-weight: bold; }
    .action-btn { transition: all 0.2s; color: #d1d3e2; }
    .action-btn:hover { transform: scale(1.1); }
</style>

<div class="container-fluid py-4">
    <!-- Header Section -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800 fw-bold">Service Categories</h1>
            <p class="text-muted small">Manage your application's service offerings.</p>
        </div>
        <a href="{{ route('service-categories.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-lg me-2"></i>Add New Category
        </a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th class="ps-4 py-3">Category</th>
                                    <th class="py-3">Description</th>
                                    <th class="py-3">Status</th>
                                    <th class="py-3 text-end pe-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $category)
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex align-items-center">
                                            {{-- <div class="avatar-circle me-3">
                                                {{ strtoupper(substr($category->name, 0, 1)) }}
                                            </div> --}}
                                            <div class="fw-bold text-dark">{{ $category->name }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-muted small text-truncate d-inline-block" style="max-width: 250px;">
                                            {{ $category->description ?? 'No description available' }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge rounded-pill bg-success-soft text-success border border-success" style="background-color: #e1f6eb;">
                                            Active
                                        </span>
                                    </td>
                                    <td class="text-end pe-4">
                                        <div class="d-flex justify-content-end gap-2">
                                            <!-- Edit -->
                                            <a href="{{ route('service-categories.edit', $category->id) }}" class="btn btn-light btn-sm action-btn text-primary">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            
                                            <!-- Delete -->
                                            <form action="{{ route('service-categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Delete this category?');" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-light btn-sm action-btn text-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5">
                                        <div class="text-muted">
                                            <i class="bi bi-folder-x display-4"></i>
                                            <p class="mt-2">No categories found in the database.</p>
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
                <div class="card-footer bg-white border-top-0 py-3">
                    {{ $categories->links('pagination::bootstrap-5') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection