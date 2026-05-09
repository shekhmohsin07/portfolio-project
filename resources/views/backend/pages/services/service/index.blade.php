@extends('backend.layouts.master')

@section('content')

<div class="container-fluid py-4">

    <!-- Header -->
    <div class="row align-items-center mb-4" style="margin-top: 60px;">

        <div class="col-md-6">

            <h2 class="fw-bold mb-1 text-dark">
                Services
            </h2>

            <p class="text-muted mb-0">
                Manage all your services easily.
            </p>

        </div>

        <div class="col-md-6 text-md-end mt-3 mt-md-0">

            <a href="{{ route('services.create') }}"
               class="btn btn-primary rounded-4 px-4 py-2 fw-semibold shadow-sm">

                <i class="fas fa-plus me-2"></i>
                Add New Service

            </a>

        </div>

    </div>

    <!-- Table -->
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table align-middle mb-0">

                    <thead class="bg-light">

                        <tr>

                            <th class="ps-4 py-3">SL</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th class="text-end pe-4">Actions</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($services as $key => $service)

                        <tr>

                            <!-- SL -->
                            <td class="ps-4 fw-semibold">
                                {{ $key + 1 }}
                            </td>

                            <!-- Image -->
                            <td>

                                @if($service->image)

                                    <img src="{{ asset('uploads/services/' . $service->image) }}"
                                         alt=""
                                         class="rounded-3 object-fit-cover"
                                         width="60"
                                         height="60">

                                @else

                                    <div class="bg-light rounded-3 d-flex align-items-center justify-content-center"
                                         style="width:60px;height:60px;">

                                        <i class="fas fa-image text-muted"></i>

                                    </div>

                                @endif

                            </td>

                            <!-- Title -->
                            <td>

                                <div class="fw-semibold text-dark">
                                    {{ $service->title }}
                                </div>

                                <small class="text-muted">
                                    {{ $service->slug }}
                                </small>

                            </td>

                            <!-- Category -->
                            <td>

                                <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">

                                    {{ $service->category->name ?? 'N/A' }}

                                </span>

                            </td>

                            <!-- Status -->
                            <td>

                                @if($service->status == 'active')

                                    <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">
                                        Active
                                    </span>

                                @else

                                    <span class="badge bg-danger-subtle text-danger px-3 py-2 rounded-pill">
                                        Inactive
                                    </span>

                                @endif

                            </td>

                            <!-- Actions -->
                            <td class="text-end pe-4">

                                <div class="d-flex align-items-center justify-content-end gap-2">

                                    <!-- Edit -->
                                    <a href="{{ route('services.edit', $service->slug) }}"
                                       class="btn btn-sm shadow-sm d-flex align-items-center justify-content-center"
                                       style="width: 32px; height: 32px; border-radius: 6px; background-color: #0dcaf0; color: #fff; border: none;">

                                        <i class="fas fa-pencil-alt" style="font-size: 12px;"></i>

                                    </a>

                                    <!-- Delete -->
                                    <form action="{{ route('services.destroy', $service->slug) }}"
                                          method="POST"
                                          onsubmit="return confirm('Delete this service?');"
                                          class="m-0 d-inline-block">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-sm shadow-sm d-flex align-items-center justify-content-center"
                                                style="width: 32px; height: 32px; border-radius: 6px; background-color: #ff4d4d; color: #fff; border: none;">

                                            <i class="fas fa-trash-alt" style="font-size: 12px;"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6" class="text-center py-5">

                                <div class="text-muted">

                                    <i class="fas fa-folder-open fs-1 mb-3"></i>

                                    <p class="mb-0">
                                        No services found.
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
        @if(method_exists($services, 'links'))

        <div class="card-footer bg-white border-0 py-3">

            {{ $services->links('pagination::bootstrap-5') }}

        </div>

        @endif

    </div>

</div>

@endsection