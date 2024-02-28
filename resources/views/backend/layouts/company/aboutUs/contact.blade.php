@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')


<!-- Bagian Success dan Error Messages -->
<div id="success-message" class="mt-3">
     @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</div>

<div id="error-message" class="mt-3">
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
<div class="col-md-16">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-header">COMPANY CONTACT</h3>
        </div>
        <div class="card-body">

        @forelse ($contact as $contactData)
            <form method="POST" action="{{ route('admin.contact-update', ['id' => $contactData->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="no_telp_company">Nomor Telepon Company</label>
                    <input type="text" name="no_telp_company" class="form-control" required maxlength="15" value="{{ $contactData->no_telp_company }}">
                </div>

                <div class="form-group">
                    <label for="email_company">Email Company</label>
                    <input type="text" name="email_company" class="form-control" required maxlength="255" value="{{ $contactData->email_company }}">
                </div>

                <div class="form-group">
                    <label for="location_company">Location Company</label>
                    <textarea name="location_company" class="form-control" required>{{ $contactData->location_company }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        @empty
            <p>No contact data available.</p>   
        @endforelse
        </div>
    </div>
</div>
@endsection