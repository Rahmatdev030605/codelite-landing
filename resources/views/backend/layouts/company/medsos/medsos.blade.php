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
</div>

<div class="col-md-16">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-video"><strong>Media Sosial</strong></h3>
        </div>
        <div class="card-body">
            <div class="container">
                <!-- Bagian Search Form -->
                <div class="mt-3">
                    <form action="{{ route('admin.medsos') }}" method="GET">
                        <div class="input-group" style="width: 100%;">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                            <a data-toggle="modal" data-target="#addMedsosModal" class="btn btn-success ml-5 btnadd" style="color: white;">Add Media Sosial Data</a>
                        </div>
                    </form>
                </div>

                <!-- Bagian Sort Form -->
                <form action="{{ route('admin.medsos') }}" class="w-50 mt-3" method="GET">
                    @csrf
                    <select name="sort" id="sort" class="btn btn-outline-secondary text-left ml-2 btn-sort">
                        <option selected>Sort By</option>
                        <option value="ascending" {{ $sort == "ascending" ? 'selected' : '' }}>A-Z</option>
                        <option value="descending" {{ $sort == "descending" ? 'selected' : '' }}>Z-A</option>
                        <option value="newest" {{ $sort == "newest" ? 'selected' : '' }}>Newest</option>
                        <option value="oldest" {{ $sort == "oldest" ? 'selected' : '' }}>Oldest</option>
                    </select>
                    <button type="submit" class="btn btn-info ml-2 btninfo">Apply</button>
                </form>

                <!-- Bagian Tampilan -->
                <div class="row mt-3">
                    <div class="content-grid mx-auto">
                        @foreach($medsos as $medsosData)
                            <div class="card mx-3">
                                <div class="card-header mx-auto d-flex justify-content-center align-items-center" style="margin-top: 16px;">
                                    <img class="card-img-top medsos-img pt-2 px-2" src="{{ asset($medsosData->medsos_image) }}" alt="Media Sosial Image" class="img-fluid">
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center mb-4">
                                        <h3 class="card-title text-bold">{{ $medsosData->medsos_name }}</h3>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-primary edit-btn" data-medsos-id="{{ $medsosData->id }}" data-toggle="modal" data-target="#editMedsosModal{{ $medsosData->id }}">Edit</button>
                                        <button class="btn btn-sm btn-danger delete-btn" data-medsos-id="{{ $medsosData->id }}" data-toggle="modal" data-target="#deleteMedsosModal{{ $medsosData->id }}">Delete</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mx-auto">
                    {{ $medsos->links('pagination::bootstrap-4') }}
                </div>
            </div>

            <!-- Modal Add -->
            <div class="modal fade" id="addMedsosModal" tabindex="-1" aria-labelledby="addMedsosModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-m">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addMedsosModalLabel">Add Media Sosial Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.medsos-store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="medsos_image">Media Sosial Image</label>
                                    <input type="file" class="form-control" accept="image/*" name="medsos_image" id="medsos_image" required>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="medsos_name">Medsos Sosial Account</label>
                                    <input type="text" class="form-control" id="medsos_name" name="medsos_name" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Add</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Edit-->
@foreach($medsos as $medsosData)
    <div class="modal fade" id="editMedsosModal{{ $medsosData->id }}" tabindex="-1" aria-labelledby="editMedsosModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-m">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editMedsosModalLabel">Edit Media</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="medsos-edit" action="{{ route('admin.medsos-update' , $medsosData->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div class="mx-auto">
                                <img class="medsos-img medsos-img-modal" src="{{ $medsosData->medsos_image }}" alt="Media Image" style="max-width: 100%; height: auto;">
                            </div>
                            <label for="image">Media Sosial Image</label>
                            <input type="file" class="form-control" accept="image/*" name="medsos_image" id="medsos_image">
                        </div>
                        <div class="form-group mt-4">
                            <label for="name">Media Sosial Account</label>
                            <input type="text" class="form-control" id="name" name="medsos_name" required value="{{ $medsosData->medsos_name }}">
                        </div>
                        <input type="hidden" name="medsos_id" id="medsos-id-edit" value="{{ $medsosData->id }}">
                        <button type="submit" class="btn btn-success">Edit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

<!-- Modal Delete-->
@foreach($medsos as $medsosData)
    <div class="modal fade" id="deleteMedsosModal{{ $medsosData->id }}" tabindex="-1" aria-labelledby="deleteMedsosModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-m">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteMedsosModalLabel">Delete Media</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <form id="medsos-delete" method="POST" action="{{ route('admin.medsos-destroy', $medsosData->id) }}">
                        @csrf
                        @method('DELETE')
                        <p>Are you sure you want to delete <strong id="medsos-name">{{ $medsosData->medsos_name }}</strong>?</p>
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
        </div>
    </div>
</div>
@endsection
