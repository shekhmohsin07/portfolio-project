<a href="{{ route('blog-categories.create') }}">
    Add Category
</a>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Slug</th>
        <th>Action</th>
    </tr>

    @foreach($categories as $category)

    <tr>
        <td>{{ $category->id }}</td>

        <td>{{ $category->name }}</td>

        <td>{{ $category->slug }}</td>

        <td>

            <a href="{{ route('blog-categories.edit', $category->id) }}">
                Edit
            </a>

            <form action="{{ route('blog-categories.destroy', $category->id) }}"
                  method="POST">

                @csrf
                @method('DELETE')

                <button type="submit">
                    Delete
                </button>

            </form>

        </td>
    </tr>

    @endforeach

</table>

{{ $categories->links() }}