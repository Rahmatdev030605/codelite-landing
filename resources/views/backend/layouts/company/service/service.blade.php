@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')

<div class="col-md-16">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-video"><strong>Service</strong></h3>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="mt-3">
                    <form action="" method="GET">
                        <div class="input-group" style="width: 100%;">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                            <a data-toggle="modal" data-target="#addPartnerModal" class="btn btn-success ml-5 btnadd" style="color: white;">Add Service</a>
                        </div>
                    </form>
                </div>

                <form action="{{ route('admin.show-service') }}" class="w-50 mt-3" method="GET">
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
                    <div class="partner-grid mx-auto">
                        @foreach($services as $service)
                        <div class="card mx-3">
                            <div class="card-header mx-auto d-flex justify-content-center align-items-center" style="margin-top: 16px;">
                                <img class="card-img-top partner-img pt-2 px-2" src="{{ $service->service_image }}" alt="image of partner">
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-center mb-4">
                                    <h3 class="card-title text-bold">{{$service->service_name}}</h3>
                                    <h3 class="card-title text-bold ml-2">{{$service->service_desc}}</h3>
                                    <h3 class="card-title text-bold">{{$service->created_at}}</h3>
                                </div>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-primary edit-btn" data-partner="{{$service->id}}" data-toggle="modal" data-target="#editServiceModal{{ $service->id }}">Edit</button>
                                    <button class="btn btn-sm btn-danger delete-btn" data-partner-for-del="{{$service->id}}" data-toggle="modal" data-target="#deletePartnerModal{{ $service->id }}">Delete</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="mx-auto">
                    {{$services->links('pagination::bootstrap-4')}}
                </div>
                <!-- Modal Add Partner -->
                <div class="modal fade" id="addPartnerModal" tabindex="-1" aria-labelledby="addPartnerModal" aria-hidden="true">
                    <div class="modal-dialog modal-m">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewPortofolioModalLabel">Add Service</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.service-store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="mx-auto">
                                            <img class="partner-img service-img-modal" src="" alt="Service Image">
                                        </div>
                                        <label for="image">Service Image</label>
                                        <input type="file" class="form-control" accept="image/*" name="service_image" id="image" required>
                                    </div>

                                    <div class="form-group mt-4">
                                        <label for="name">Service Name</label>
                                        <input type="text" class="form-control" id="name" name="service_name" required>
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="desc">Service Desc</label>
                                        <input type="text" class="form-control" id="desc" name="service_desc" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @foreach($services as $service)
            <div class="modal fade" id="editServiceModal{{ $service->id }}" tabindex="-1" aria-labelledby="editServiceModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-m">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editServiceModalLabel">Edit Service</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="service-edit" action="{{ route('admin.service-update-new', $service->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <div class="mx-auto">
                                        <img class="partner-img partner-img-modal" src="{{ $service->service_image }}" alt="Service Image">
                                    </div>
                                    <label for="image">Service Image</label>
                                    <input type="file" class="form-control" accept="image/*" name="image" id="image">
                                </div>

                                <div class="form-group mt-4">
                                    <label for="name">Service Name</label>
                                    <input type="text" class="form-control" id="name" name="service_name" required value="{{ $service->service_name }}">
                                </div>
                                <div class="form-group mt-4">
                                    <label for="desc">Service Description</label>
                                    <input type="text" class="form-control" id="desc" name="service_desc" required value="{{ $service->service_desc }}">
                                </div>
                                <button type="submit" class="btn btn-success">Edit</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            @foreach($services as $service)
            <div class="modal fade" id="deletePartnerModal{{ $service->id }}" tabindex="-1" aria-labelledby="deletePartnerModal" aria-hidden="true">
                <div class="modal-dialog modal-m">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewPortofolioModalLabel">Delete Service</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center  ">
                            <form class="align-items-center mx-auto" id="partner-delete" action="{{ route('admin.service-destroy-new', $service->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="mx-auto">
                                    <img class="partner-img img-modal-delete" src="{{ $service->service_image }}" alt="Partner Image">
                                </div>
                                <p>are you sure you want to delete <strong>{{ $service->service_name }}</strong></p>
                                <button type="submit" class="btn btn-danger">Delete</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Akhir modal Delete Partner -->
    </div>
    @endsection
