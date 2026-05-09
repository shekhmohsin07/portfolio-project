@extends('backend.layouts.master')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">
                Media Library
            </h2>

            <p class="text-muted">
                Upload and manage all images.
            </p>

        </div>

    </div>

    <!-- Upload -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body">

            <form action="{{ route('media.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row align-items-center">

                    <div class="col-md-10">

                        <input type="file"
                               name="image"
                               class="form-control rounded-4">

                    </div>

                    <div class="col-md-2">

                        <button type="submit"
                                class="btn btn-primary w-100 rounded-4">

                            Upload

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <!-- Gallery -->
    <div class="row">

        @foreach($media as $item)

        <div class="col-md-2 mb-4">

            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                <img src="{{ asset('uploads/media/' . $item->file) }}"
                     class="img-fluid"
                     style="height:160px;object-fit:cover;">

                <div class="card-body p-2 text-center">

                    <button class="btn btn-sm btn-primary rounded-pill select-image"
                            data-image="{{ $item->file }}">

                        Select

                    </button>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection