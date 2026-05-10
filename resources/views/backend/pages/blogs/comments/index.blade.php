@extends('backend.layouts.master')

@section('content')

<div class="container-fluid py-4">

<div class="row mb-4"
     style="margin-top:60px;">

<div class="col-md-12">

<h2 class="fw-bold">
    Blog Comments
</h2>

<p class="text-muted">
    Manage all blog comments
</p>

</div>

</div>

<div class="card border-0 shadow-sm rounded-4">

<div class="card-body p-0">

<div class="table-responsive">

<table class="table align-middle mb-0">

<thead class="bg-light">

<tr>

<th class="ps-4">SL</th>
<th>Blog</th>
<th>Name</th>
<th>Email</th>
<th>Comment</th>
<th>Status</th>
<th class="text-end pe-4">Actions</th>

</tr>

</thead>

<tbody>

@forelse($comments as $key => $comment)

<tr>

<td class="ps-4">
    {{ $key + 1 }}
</td>

<td>
    {{ optional($comment->blog)->title }}
</td>

<td>
    {{ $comment->name }}
</td>

<td>
    {{ $comment->email }}
</td>

<td width="300">
    {{ Str::limit($comment->comment, 80) }}
</td>

<td>

@if($comment->status == 'approved')

<span class="badge bg-success">
    Approved
</span>

@elseif($comment->status == 'rejected')

<span class="badge bg-danger">
    Rejected
</span>

@else

<span class="badge bg-warning text-dark">
    Pending
</span>

@endif

</td>

<td class="text-end pe-4">

<div class="d-flex gap-2 justify-content-end">

<!-- Approve -->
<form action="{{ route('comments.approve', $comment->id) }}"
      method="POST">

@csrf
@method('PUT')

<button class="btn btn-success btn-sm">
    Approve
</button>

</form>

<!-- Reject -->
<form action="{{ route('comments.reject', $comment->id) }}"
      method="POST">

@csrf
@method('PUT')

<button class="btn btn-warning btn-sm">
    Reject
</button>

</form>

<!-- Pending -->
<form action="{{ route('comments.pending', $comment->id) }}"
      method="POST">

@csrf
@method('PUT')

<button class="btn btn-info btn-sm">
    Pending
</button>

</form>

<!-- Delete -->
<form action="{{ route('comments.destroy', $comment->id) }}"
      method="POST">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm"
        onclick="return confirm('Delete comment?')">

Delete

</button>

</form>

</div>

</td>

</tr>

@empty

<tr>

<td colspan="7" class="text-center py-5">

No comments found

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

<div class="card-footer bg-white">

{{ $comments->links('pagination::bootstrap-5') }}

</div>

</div>

</div>

@endsection