@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')

<div class="col-md-16">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-video"><strong>Partner List</strong></h3>
        </div>
        <div class="card-body">
            <div class="container">

                <!-- Bagian Search Form -->
                <div class="mt-3">
                    <form action="{{ route('admin.show-partnerList') }}" method="GET">
                        <div class="input-group" style="width: 100%;">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                            <a data-toggle="modal" data-target="#addPartnerListModal" class="btn btn-success ml-5 btnadd" style="color: white;">Add Partner List</a>
                        </div>
                    </form>
                </div>

                <!-- Bagian Sort Form -->
                <form action="{{ route('admin.show-partnerList') }}" class="w-50 mt-3" method="GET">
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


                <!-- Bagian Tampilan Partners -->
                <div class="row mt-3">
                    <div class="partner-grid mx-auto">
                        @foreach($partnerList as $partner)
                            <div class="card mx-3">
                                <div class="card-body">
                                    <div class="row justify-content-center mb-4">
                                        <h3 class="card-title text-bold">{{ $partner->partner_title }}</h3>
                                    </div>
                                    <div class="btn-group">
                                    <button class="btn btn-sm btn-primary edit-btn" data-partner-id="{{ $partner->id }}" data-toggle="modal" data-target="#editPartnerListModal{{ $partner->id }}">Edit</button>
                                        <button class="btn btn-sm btn-danger delete-btn" data-partner-id="{{ $partner->id }}" data-toggle="modal" data-target="#deletePartnerListModal{{ $partner->id }}">Delete</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mx-auto">
                    {{ $partnerList->links('pagination::bootstrap-4') }}
                </div>
            </div>

            <!-- Modal Add Partner -->
            <div class="modal fade" id="addPartnerListModal" tabindex="-1" aria-labelledby="addPartnerListModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-m">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addPartnerListModalLabel">Add Partner List</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ route('admin.partnerList-store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mt-4">
                                    <label for="partner_title">Partner List Title</label>
                                    <input type="text" class="form-control" id="partner_title" name="partner_title" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Add</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @foreach($partnerList as $partner)
                <div class="modal fade" id="editPartnerListModal{{ $partner->id }}" tabindex="-1" aria-labelledby="editPartnerListModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-m">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editPartnerListModalLabel">Edit Partner List</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="partner-edit" action="{{ route('admin.partnerList-update' , $partner->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group mt-4">
                                        <label for="name">Partner Name</label>
                                        <input type="text" class="form-control" id="name" name="partner_title" required value="{{ $partner->partner_title }}">
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
            @foreach($partnerList as $partner)
            <div class="modal fade" id="deletePartnerListModal{{ $partner->id }}" tabindex="-1" aria-labelledby="deletePartnerListModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-m">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deletePartnerListModalLabel">Delete Partner List</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <form id="partner-delete" method="POST" action="{{ route('admin.partnerList-destroy', $partner->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <p>Are you sure you want to delete <strong id="partner-title">{{ $partner->partner_title }}</strong>?</p>
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
