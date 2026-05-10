<form action="{{ route('blog-categories.update', $blogCategory->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <input type="text"
           name="name"
           value="{{ $blogCategory->name }}">

    <button type="submit">
        Update
    </button>

</form>