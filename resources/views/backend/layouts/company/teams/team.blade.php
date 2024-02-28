@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')

<div class="col-md-16">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-video"><strong>Team</strong></h3>
        </div>
        <div class="card-body">
            <div class="container">
                <!-- Bagian Search Form -->
                <div class="mt-3">
                    <form action="{{ route('admin.show-team') }}" method="GET">
                        <div class="input-group" style="width: 100%;">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                            <a href="{{ route('admin.new-team') }}" data-target="#addPartnerModal" class="btn btn-success ml-5 btnadd" style="color: white;">New Team</a>
                        </div>
                    </form>
                </div>

                <!-- Bagian Sort Form -->
                <form action="{{ route('admin.show-team') }}" class="w-50 mt-3" method="GET">
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
                        @foreach($teams as $team)
                        <div class="card mx-3">
                            <div class="card-header mx-auto d-flex justify-content-center align-items-center" style="margin-top: 16px;">
                                <img class="card-img-top partner-img pt-2 px-2" src="{{ $team->profile_img ? asset($team->profile_img) : asset('storage/image/default-no-image.jpg') }}" alt="No Image" class="img-fluid">
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-center mb-4">
                                    <h3 class="card-title text-bold">{{ $team->name }}</h3>
                                </div>
                                <div class="btn-group">
                                    <a href="{{ route('admin.edit-team', ['id' => $team->id]) }}" class="btn btn-sm btn-primary edit-btn">Edit</a>
                                    <button class="btn btn-sm btn-danger delete-btn" data-partner-id="{{ $team->id }}" data-toggle="modal" data-target="#deletePartnerModal{{ $team->id }}">Delete</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="mx-auto">
                    {{ $teams->links('pagination::bootstrap-4') }}
                </div>
            </div>

            <!-- Modal Delete Partner -->
            @foreach($teams as $team)
            <div class="modal fade" id="deletePartnerModal{{ $team->id }}" tabindex="-1" aria-labelledby="deletePartnerModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-m">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deletePartnerModalLabel">Delete Team</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <form id="partner-delete" method="POST" action="{{ route('admin.delete-team', $team->id) }}">
                                @csrf
                                @method('DELETE')
                                <p>Are you sure you want to delete <strong id="partner-name">{{ $team->name }}</strong>?</p>
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
