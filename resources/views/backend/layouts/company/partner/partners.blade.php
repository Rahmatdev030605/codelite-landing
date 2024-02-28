@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')

<div class="col-md-16">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-video"><strong>Partners</strong></h3>
        </div>
        <div class="card-body">
            <div class="container">
                <!-- Bagian Search Form -->
                <div class="mt-3">
                    <form action="{{ route('admin.show-partners') }}" method="GET">
                        <div class="input-group" style="width: 100%;">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                            <a data-toggle="modal" data-target="#addPartnerModal" class="btn btn-success ml-5 btnadd" style="color: white;">Add Partner</a>
                        </div>
                    </form>
                </div>

                <!-- Bagian Sort Form -->
                <form action="{{ route('admin.show-partners') }}" class="w-50 mt-3" method="GET">
                    @csrf
                    <select name="sort" id="sort" class="btn btn-outline-secondary text-left ml-2 btn-sort">
                        <option selected class="btn-sort">Sort By</option>
                        <option value="ascending" {{ $sort == "ascending" ? 'selected' : '' }}>A-Z</option>
                        <option value="descending" {{ $sort == "descending" ? 'selected' : '' }}>Z-A</option>
                        <option value="newest" {{ $sort == "newest" ? 'selected' : '' }}>Newest</option>
                        <option value="oldest" {{ $sort == "oldest" ? 'selected' : '' }}>Oldest</option>
                    </select>
                    <button type="submit" class="btn btn-info ml-2 btninfo">Apply</button>
                </form>


                <!-- Bagian Tampilan Partners -->
                <div class="row mt-3">
                    <div class="partner-grid mx-auto">
                        @foreach($partners as $partner)
                            <div class="card mx-3">
                                <div class="card-header mx-auto d-flex justify-content-center align-items-center" style="margin-top: 16px;">
                                    <img class="card-img-top partner-img pt-2 px-2" src="{{ asset($partner->partners_image) }}" alt="Partners Image" class="img-fluid">
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center mb-4">
                                        <h3 class="card-title text-bold">{{ $partner->partners_name }}</h3>
                                    </div>
                                    <div class="btn-group">
                                    <button class="btn btn-sm btn-primary edit-btn" data-partner-id="{{ $partner->id }}" data-toggle="modal" data-target="#editPartnerModal{{ $partner->id }}">Edit</button>
                                        <button class="btn btn-sm btn-danger delete-btn" data-partner-id="{{ $partner->id }}" data-toggle="modal" data-target="#deletePartnerModal{{ $partner->id }}">Delete</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mx-auto">
                    {{ $partners->links('pagination::bootstrap-4') }}
                </div>
            </div>

            <!-- Modal Add Partner -->
            <div class="modal fade" id="addPartnerModal" tabindex="-1" aria-labelledby="addPartnerModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-m">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addPartnerModalLabel">Add Partner</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.partner-store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="partners_image">Partner Image</label>
                                    <input type="file" class="form-control" accept="image/*" name="partners_image" id="partners_image" required>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="partners_name">Partner Name</label>
                                    <input type="text" class="form-control" id="partners_name" name="partners_name" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Add</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Edit Partner -->
            @foreach($partners as $partner)
                <div class="modal fade" id="editPartnerModal{{ $partner->id }}" tabindex="-1" aria-labelledby="editPartnerModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-m">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editPartnerModalLabel">Edit Partner</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="partner-edit" action="{{ route('admin.partner-update' , $partner->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <div class="mx-auto">
                                            <img class="partner-img partner-img-modal" src="{{ $partner->partners_image }}" alt="Partner Image" style="max-width: 100%; height: auto;">
                                        </div>
                                        <label for="image">Partner Image</label>
                                                <input type="file" class="form-control" accept="image/*" name="partners_image" id="partners_image">
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="name">Partner Name</label>
                                        <input type="text" class="form-control" id="name" name="partners_name" required value="{{ $partner->partners_name }}">
                                    </div>
                                    <input type="hidden" name="partner_id" id="partner-id-edit" value="{{ $partner->id }}">
                                    <button type="submit" class="btn btn-success">Edit</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Modal Delete Partner -->
            @foreach($partners as $partner)
            <div class="modal fade" id="deletePartnerModal{{ $partner->id }}" tabindex="-1" aria-labelledby="deletePartnerModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-m">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deletePartnerModalLabel">Delete Partner</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <form id="partner-delete" method="POST" action="{{ route('admin.partner-destroy', $partner->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <p>Are you sure you want to delete <strong id="partner-name">{{ $partner->partners_name }}</strong>?</p>
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
