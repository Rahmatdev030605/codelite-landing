@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')

<div class="col-md-16">
    <div class="card card-primary">
    <div class="card-header d-flex justify-content-between">
            <h3 class="card-video"><strong>LET'S GET STARTED</strong></h3>
            <a href="{{ route('admin.new-started') }}" class="btn btn-success" style="color: white; width: 10%;">New +</a>
        </div>

        <div class="card-body">
            <div class="container">
                <!-- Bagian Search Form -->
                <div class="container-fluid mb-3">
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <div class="table-responsive">
                                <form action="{{ route('admin.show-started') }}" method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm" name="search" placeholder="Search...">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary btn-sm" type="submit">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <form id="filterForm" action="{{ route('admin.show-started') }}" method="GET" class="filter">
                                @csrf
                                <div class="input-group input-group-sm">
                                    <select class="form-select form-select-sm" id="perPage" name="perPage" style="width: 10%;">
                                        <option value="10" {{ request()->query('perPage') == 10 ? 'selected' : '' }}>10</option>
                                        <option value="25" {{ request()->query('perPage') == 25 ? 'selected' : '' }}>25</option>
                                        <option value="50" {{ request()->query('perPage') == 50 ? 'selected' : '' }}>50</option>
                                        <option value="100" {{ request()->query('perPage') == 100 ? 'selected' : '' }}>100</option>
                                    </select>
                                    <select name="sort" id="sort" class="form-select form-select-sm ml-2">
                                        <option selected>Sort By</option>
                                        <option value="ascending" {{ $sort == "ascending" ? 'selected' : '' }}>A-Z</option>
                                        <option value="descending" {{ $sort == "descending" ? 'selected' : '' }}>Z-A</option>
                                        <option value="newest" {{ $sort == "newest" ? 'selected' : '' }}>Newest</option>
                                        <option value="oldest" {{ $sort == "oldest" ? 'selected' : '' }}>Oldest</option>
                                    </select>
                                    <select class="form-select form-select-sm ml-2" name="page_type_id" style="width: 15%;">
                                        <option value="">All Pages</option>
                                        @if(is_array($pageTypes) || is_object($pageTypes))
                                        @foreach($pageTypes as $pageType)
                                        <option value="{{ $pageType->id }}" {{ request()->query('page_type_id') == $pageType->id ? 'selected' : '' }}>
                                            {{ $pageType->name }}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                    <select class="form-select form-select-sm ml-2" name="status" style="width: 15%;">
                                        <option value="">All Status</option>
                                        <option value="active" {{ request()->query('status') == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="not active" {{ request()->query('status') == 'not active' ? 'selected' : '' }}>Not Active</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary btn-sm">Apply</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="table-responsive">
                        <table class="table table-transparent table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>
                                        Heading
                                    </th>

                                    <th>
                                        Sub Heading
                                    </th>

                                    <th style="font-size: 55%;">Create At</th>
                                    <th style="font-size: 55%;">Update At</th>
                                    <th>Status</th>
                                    <th colspan="2" class="action">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($started as $start)
                                <tr>
                                    <td>{{ $start->heading }}</td>
                                    <td>{{ $start->sub_heading }}</td>
                                    <td style="font-size: 12px;">{{ $start->created_at }}</td>
                                    <td style="font-size: 12px;">{{ $start->updated_at }}</td>
                                    <td style="text-align: center;">
                                        <span class="{{ $start->status == 'active' ? 'text-success' : 'text-danger' }}" style="font-size: 14px">
                                            @if($start->status == 'active')
                                            <i class="bi bi-check-circle-fill"></i>
                                            @else
                                            <i class="bi bi-x-circle-fill"></i>
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.edit-started', ['id' => $start->id]) }}" class=" btn-sm edit-btn btn-primary btn-animate">
                                            <i class="cil-pencil"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <button class="btn-sm btn-danger delete-btn" data-partner-id="{{ $start->id }}" data-toggle="modal" data-target="#deleteContent{{ $start->id }}">
                                            <i class="cil-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    {{ $started->links('pagination::bootstrap-4') }}
                </div>
                <div style="font-size: 13px">
                    <p>Total: {{ $totalStart }} data</p>
                </div>
            </div>

            @foreach($started as $start)
            <div class="modal fade" id="deleteContent{{ $start->id }}" tabindex="-1" aria-labelledby="deleteContentModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-m">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteContentModalLabel">Delete Hero</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <form id="content-delete" method="POST" action="{{ route('admin.delete-started', $start->id) }}">
                                @csrf
                                @method('DELETE')
                                <p>Are you sure you want to delete <strong id="partner-name">{{ $start->heading }}</strong>?</p>
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
