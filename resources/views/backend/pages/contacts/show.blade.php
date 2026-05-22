
@extends('backend.layouts.master')

@section('content')

<div class="container-fluid py-4">

    <!-- Header -->
    <div class="row align-items-center mb-4"
         style="margin-top:60px;">

        <div class="col-md-10">

            <h2 class="fw-bold text-dark mb-1">
                Contact Details
            </h2>

            <p class="text-muted mb-0">
                View contact message details
            </p>

        </div>

        <div class="col-md-2 text-md-end">

            <a href="{{ route('contacts.index') }}"
               class="btn btn-dark rounded-4 px-4 py-2">

                Back

            </a>

        </div>

    </div>

    <!-- Card -->
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <div class="row g-4">

                <!-- Name -->
                <div class="col-md-6">

                    <label class="fw-semibold text-muted mb-2">
                        Name
                    </label>

                    <div class="border rounded-3 p-3 bg-light">
                        {{ $contact->name }}
                    </div>

                </div>

                <!-- Email -->
                <div class="col-md-6">

                    <label class="fw-semibold text-muted mb-2">
                        Email
                    </label>

                    <div class="border rounded-3 p-3 bg-light">
                        {{ $contact->email }}
                    </div>

                </div>

                <!-- Phone -->
                <div class="col-md-6">

                    <label class="fw-semibold text-muted mb-2">
                        Phone
                    </label>

                    <div class="border rounded-3 p-3 bg-light">
                        {{ $contact->phone }}
                    </div>

                </div>

                <!-- Subject -->
                <div class="col-md-6">

                    <label class="fw-semibold text-muted mb-2">
                        Subject
                    </label>

                    <div class="border rounded-3 p-3 bg-light">
                        {{ $contact->subject }}
                    </div>

                </div>

                <!-- Date -->
                <div class="col-md-6">

                    <label class="fw-semibold text-muted mb-2">
                        Date
                    </label>

                    <div class="border rounded-3 p-3 bg-light">
                        {{ $contact->created_at->format('d M Y h:i A') }}
                    </div>

                </div>

                <!-- Message -->
                <div class="col-md-12">

                    <label class="fw-semibold text-muted mb-2">
                        Message
                    </label>

                    <div class="border rounded-3 p-4 bg-light"
                         style="min-height:150px; white-space:pre-line;">

                        {{ $contact->message }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

