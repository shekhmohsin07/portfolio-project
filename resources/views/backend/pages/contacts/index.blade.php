
@extends('backend.layouts.master')

@section('content')

<div class="container-fluid py-4">

    <!-- Header -->
    <div class="row align-items-center mb-4" style="margin-top:60px;">

        <div class="col-md-10">

            <h2 class="fw-bold text-dark mb-1">
                Contact Messages
            </h2>

            <p class="text-muted mb-0">
                Manage all contact messages
            </p>

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
                                Name
                            </th>

                            <th>
                                Email
                            </th>

                            <th>
                                Phone
                            </th>

                            <th>
                                Subject
                            </th>

                            <th>
                                Date
                            </th>

                            <th class="text-end pe-4">
                                Actions
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($contacts as $key => $contact)

                        <tr>

                            <!-- SL -->
                            <td class="ps-4">
                                {{ $key + 1 }}
                            </td>

                            <!-- Name -->
                            <td>
                                <div class="fw-semibold">
                                    {{ $contact->name }}
                                </div>
                            </td>

                            <!-- Email -->
                            <td>
                                {{ $contact->email }}
                            </td>

                            <!-- Phone -->
                            <td>
                                {{ $contact->phone }}
                            </td>

                            <!-- Subject -->
                            <td>
                                {{ $contact->subject }}
                            </td>

                            <!-- Date -->
                            <td>
                                {{ $contact->created_at->format('d M Y') }}
                            </td>

                            <!-- Actions -->
                            <td class="text-end pe-4">

                                <div class="d-flex gap-2 justify-content-end">

                                    <!-- View -->
                                    <a href="{{ route('contacts.show', $contact->id) }}"
                                       class="btn btn-info btn-sm">

                                        View

                                    </a>

                                    <!-- Delete -->
                                    <form action="{{ route('contacts.destroy', $contact->id) }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Delete this message?')">

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="7"
                                class="text-center py-5">

                                No messages found

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <!-- Pagination -->
        <div class="card-footer bg-white">

            {{ $contacts->links('pagination::bootstrap-5') }}

        </div>

    </div>

</div>

@endsection

