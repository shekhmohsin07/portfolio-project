@extends('backend.layouts.master')

@section('content')

<div class="container-fluid py-4">

    <!-- Header -->
    <div class="row align-items-center mb-4"
         style="margin-top:60px;">

        <div class="col-md-10">

            <h2 class="fw-bold text-dark mb-1">
                Projects
            </h2>

            <p class="text-muted mb-0">
                Manage all projects
            </p>

        </div>

        <div class="col-md-2 text-md-end">

            <a href="{{ route('projects.create') }}"
               class="btn btn-primary rounded-4 px-4 py-2 fw-semibold shadow-sm">

                + Add Project

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

                            <th class="ps-4">
                                SL
                            </th>

                            <th>
                                Image
                            </th>

                            <th>
                                Title
                            </th>

                            <th>
                                Category
                            </th>

                            <th>
                                Status
                            </th>

                            <th class="text-end pe-4">
                                Actions
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($projects as $key => $project)

                        <tr>

                            <!-- SL -->
                            <td class="ps-4">

                                {{ $key + 1 }}

                            </td>

                            <!-- Image -->
                            <td>

                                <img src="{{ asset('uploads/projects/'.$project->image) }}"
                                     width="60"
                                     height="60"
                                     style="object-fit:cover; border-radius:8px;">

                            </td>

                            <!-- Title -->
                            <td>

                                <div class="fw-semibold">

                                    {{ $project->title }}

                                </div>

                            </td>

                            <!-- Category -->
                            <td>

                                {{ optional($project->category)->name }}

                            </td>

                            <!-- Status -->
                            <td>

                                @if($project->status == 'active')

                                <span class="badge bg-success">
                                    Active
                                </span>

                                @else

                                <span class="badge bg-danger">
                                    Inactive
                                </span>

                                @endif

                            </td>

                            <!-- Actions -->
                            <td class="text-end pe-4">

                                <div class="d-flex gap-2 justify-content-end">

                                    <!-- Edit -->
                                    <a href="{{ route('projects.edit', $project->slug) }}"
                                       class="btn btn-info btn-sm">

                                        Edit

                                    </a>

                                    <!-- Delete -->
                                    <form action="{{ route('projects.destroy', $project->slug) }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Delete this project?')">

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6"
                                class="text-center py-5">

                                No projects found

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <!-- Pagination -->
        <div class="card-footer bg-white">

            {{ $projects->links('pagination::bootstrap-5') }}

        </div>

    </div>

</div>

@endsection