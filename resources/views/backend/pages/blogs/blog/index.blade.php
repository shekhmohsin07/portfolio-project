@extends('backend.layouts.master')

@section('content')

<div class="container-fluid py-4">

    <div class="row align-items-center mb-4" style="margin-top:60px;">

        <div class="col-md-10">

            <h2 class="fw-bold text-dark mb-1">
                Blogs
            </h2>

            <p class="text-muted mb-0">
                Manage all blogs
            </p>

        </div>

        <div class="col-md-2 text-md-end">

            <a href="{{ route('blogs.create') }}"
               class="btn btn-primary rounded-4 px-4 py-2 fw-semibold shadow-sm">

                + Add Blog

            </a>

        </div>

    </div>

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table align-middle mb-0">

                    <thead class="bg-light">

                        <tr>
                            <th class="ps-4">SL</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th class="text-end pe-4">Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($blogs as $key => $blog)

                        <tr>

                            <td class="ps-4">
                                {{ $key+1 }}
                            </td>

                            <td>

                                <img src="{{ asset('uploads/blogs/'.$blog->image) }}"
                                     width="60"
                                     height="60"
                                     style="object-fit:cover; border-radius:8px;">

                            </td>

                            <td>
                                {{ $blog->title }}
                            </td>

                            <td>
                                {{ $blog->category->name ?? '' }}
                            </td>

                            <td class="text-end pe-4">

                                <a href="{{ route('blogs.edit',$blog->slug) }}"
                                   class="btn btn-info btn-sm">

                                    Edit

                                </a>

                                <form action="{{ route('blogs.destroy',$blog->slug) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete?')">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection