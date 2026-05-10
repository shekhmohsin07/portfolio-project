@extends('backend.layouts.master')
@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4 mt-5">
        <div>
            <h2 class="fw-bold">Media Library</h2>
            <p class="text-muted">Upload and manage media files.</p>
        </div>
    </div>
    <!-- Upload Area -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body">
            <form id="uploadForm"
                  enctype="multipart/form-data">
                @csrf
                <div class="border border-2 border-dashed rounded-4 p-5 text
center bg-light">
                    <input type="file"
                           name="image"
                           id="imageInput" class="form-control mb-3">
                    <button type="button"
                            id="uploadBtn"
                            class="btn btn-primary rounded-pill px-4">
                        Upload Image
                    </button>
                </div>
            </form>
        </div>
    </div>

     <!-- Gallery -->
    <div class="row" id="galleryArea">
        @foreach($media as $item)
        <div class="col-md-2 mb-4 media-card-{{ $item->id }}">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <img src="{{ asset('uploads/media/' . $item->file) }}"
                     class="img-fluid"
                     style="height:180px;object-fit:cover;">
                <div class="card-body text-center">
                    <button class="btn btn-sm btn-danger rounded-pill delete
media"
                            data-id="{{ $item->id }}">
                        Delete
                    </button>
                </div>
            </div>
        </div>
        @endforeach 
    </div>
</div>
@endsection



@section('scripts')
<script>
    // Upload AJAX
    document.getElementById('uploadBtn').addEventListener('click', function () {
        let formData = new FormData(document.getElementById('uploadForm'));
        fetch("{{ route('media.store') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if(data.success){
                location.reload();
            }
        });
    });

     // Delete Media
    document.querySelectorAll('.delete-media').forEach(button => {
        button.addEventListener('click', function () {
            let id = this.dataset.id;
            if(confirm('Delete this media?')){
                fetch('/media/' + id, {
                    method: 'DELETE',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    if(data.success){
                        document.querySelector('.media-card-' + id).remove();
                    }
                });
            }
        });
    });
</script>
@endsection