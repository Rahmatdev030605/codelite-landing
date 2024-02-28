@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')

<div class="col-md-16">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-video"><strong>Product Category List</strong></h3>
        </div>
        <div class="card-body">
            <div class="container">

                <!-- Bagian Search Form -->
                <div class="mt-3">
                    <form action="{{ route('admin.productCategory') }}" method="GET">
                        <div class="input-group" style="width: 100%;">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                            <a data-toggle="modal" data-target="#addProductCategoryModal" class="btn btn-success ml-5 btnadd" style="color: white;">Add Product Category</a>
                        </div>
                    </form>
                </div>

                <!-- Bagian Sort Form -->
                <form action="{{ route('admin.productCategory') }}" class="w-50 mt-3" method="GET">
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

                <!-- Bagian Tampilan Product Categories -->
                <div class="row mt-3">
                    <div class="product-category-grid mx-auto">
                        @foreach($categories as $productCategory)
                            <div class="card mx-3">
                                <div class="card-body">
                                    <div class="row justify-content-center mb-4">
                                        <h3 class="card-title text-bold">{{ $productCategory->name }}</h3>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-primary edit-btn" data-category-id="{{ $productCategory->id }}" data-toggle="modal" data-target="#editProductCategoryModal{{ $productCategory->id }}">Edit</button>
                                        <button class="btn btn-sm btn-danger delete-btn" data-category-id="{{ $productCategory->id }}" data-toggle="modal" data-target="#deleteProductCategoryModal{{ $productCategory->id }}">Delete</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mx-auto">
                    {{ $categories->links('pagination::bootstrap-4') }}
                </div>
            </div>

            <!-- Modal Add Product Category -->
            <div class="modal fade" id="addProductCategoryModal" tabindex="-1" aria-labelledby="addProductCategoryModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-m">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addProductCategoryModalLabel">Add Product Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.productCategory-store') }}" method="POST">
                                @csrf
                                <div class="form-group mt-4">
                                    <label for="name">Product Category Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Add</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @foreach($categories as $productCategory)
                <div class="modal fade" id="editProductCategoryModal{{ $productCategory->id }}" tabindex="-1" aria-labelledby="editProductCategoryModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-m">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editProductCategoryModalLabel">Edit Product Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('admin.productCategory-update' , $productCategory->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group mt-4">
                                        <label for="name">Product Category Name</label>
                                        <input type="text" class="form-control" id="name" name="name" required value="{{ $productCategory->name }}">
                                    </div>
                                    <button type="submit" class="btn btn-success">Edit</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Modal Delete Product Category -->
            @foreach($categories as $productCategory)
                <div class="modal fade" id="deleteProductCategoryModal{{ $productCategory->id }}" tabindex="-1" aria-labelledby="deleteProductCategoryModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-m">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteProductCategoryModalLabel">Delete Product Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <form method="POST" action="{{ route('admin.productCategory-destroy', $productCategory->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <p>Are you sure you want to delete <strong id="name">{{ $productCategory->name }}</strong>?</p>
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
