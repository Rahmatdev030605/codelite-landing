@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')


<div class="col-md-16">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-video"><strong>PAGE TYPES</strong></h3>
        </div>
        <div class="card-body">
            <div class="container">
                <!-- Bagian Search Form -->
                <div class="mt-3">
                    <form action="{{ route('admin.show-page-type') }}" method="GET">
                        <div class="input-group" style="width: 100%;">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                            <a data-toggle="modal" data-target="#addModal" class="btn btn-success ml-2 btnadd" style="color: white; width: 15%;">+ New</a>
                        </div>
                    </form>
                </div>

                <!-- Bagian Sort Form -->
                <form action="{{ route('admin.show-page-type') }}" class="w-50 mt-3" method="GET">
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

                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="row content-grid mx-auto">
                            @foreach($types as $type)
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title text-bold">{{ $type->name }}</h3>
                                        <div class="btn-group">
                                            <button class="btn btn-sm btn-primary edit-btn" data-type-id="{{ $type->id }}" data-toggle="modal" data-target="#editModal{{ $type->id }}">Edit</button>
                                            <button class="btn btn-sm btn-danger delete-btn" data-type-id="{{ $type->id }}" data-toggle="modal" data-target="#deleteModal{{ $type->id }}">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mx-auto">
                            {{ $types->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>


                <!-- Modal Add -->
                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-m">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addModalLabel">Add Page Type Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.store-page-type') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mt-4">
                                        <label for="name">Page Name</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Edit-->
                @foreach($types as $type)
                <div class="modal fade" id="editModal{{ $type->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-m">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Page Type</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="type" action="{{ route('admin.update-page-type' , $type->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group mt-4">
                                        <label for="name">Name Page</label>
                                        <input type="text" class="form-control" id="name" name="name" required value="{{ $type->name }}">
                                    </div>
                                    <input type="hidden" name="id" id="pageType" value="{{ $type->id }}">
                                    <button type="submit" class="btn btn-success">Edit</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- Modal Delete-->
                @foreach($types as $type)
                <div class="modal fade" id="deleteModal{{ $type->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-m">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Delete Page Type</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <form id="delete" method="POST" action="{{ route('admin.delete-page-type', $type->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <p>Are you sure you want to delete <strong id="pageType">{{ $type->name }}</strong>?</p>
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
