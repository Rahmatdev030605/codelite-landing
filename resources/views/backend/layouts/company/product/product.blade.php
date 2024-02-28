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
            <h3 class="card-video"><strong>Product Data</strong></h3>
        </div>
        <div class="card-body">
            <div class="container">
                <!-- Bagian Search Form -->
                <div class="mt-3">
                    <form action="{{ route('admin.product') }}" method="GET">
                        <div class="input-group" style="width: 100%;">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                            <a data-toggle="modal" data-target="#addProductModal" class="btn btn-success ml-5 btnadd" style="color: white;">Add Product Data</a>
                        </div>
                    </form>
                </div>

                <!-- Bagian Sort Form -->
                <form action="{{ route('admin.product') }}" class="w-50 mt-3" method="GET">
                    @csrf
                    <select name="sort" id="sort" class="btn btn-outline-secondary text-left ml-2 btn-sort">
                        <option value="all" {{ $sort == 'all' ? 'selected' : '' }}>All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $sort == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-info ml-2 btninfo">Apply</button>
                </form>


                <!-- Bagian Tampilan -->
                <div class="row mt-3">
                        <div class="product-grid mx-auto">
                            @foreach($products as $productData)
                            @if($sort == 'all' || $productData->category->id == $sort)
                                <div class="card mx-3">
                                    <div class="card-header mx-auto d-flex justify-content-center align-items-center" style="margin-top: 16px;">
                                        <img class="card-img-top product-img pt-2 px-2" src="{{ asset($productData->image) }}" alt="Product Image" class="img-fluid" >
                                    </div>
                                    <div class="card-body">
                                        <div class="row justify-content-center mb-2">
                                            <h3 class="card-title text-bold">{{ $productData->title }}</h3>
                                        </div>
                                        <div class="row justify-content-center">
                                            <h3 class="card-title text-bold">{{ $productData->button_link }}</h3>
                                        </div>
                                        <div class="row justify-content-center mb-4">
                                        <p class="card-title2">{{ $productData->category->name }}</p>
                                        </div>
                                        <div class="btn-group">
                                        <button class="btn btn-sm btn-primary edit-btn" data-toggle="modal" data-target="#editProductModal{{ $productData->id }}">Edit</button>
                                        <button type="button" class="btn btn-sm btn-danger delete-btn" data-toggle="modal" data-target="#deleteProductModal{{ $productData->id }}">Delete</button>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="mx-auto">
                    {{ $products->appends(['sort' => $sort])->links('pagination::bootstrap-4') }}
                    </div>
                </div>

                     <!-- Modal Add -->
            <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-m">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addProductModalLabel">Add Product Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.product-store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="category_id" value="{{ $sort }}">
                                <div class="form-group">
                                    <label for="image">Product Image</label>
                                    <input type="file" class="form-control" accept="image/*" name="image" id="image" required>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="title">Product Title</label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>
                                <div class="form-group mt-4">
                                    <label for="button_link">Button Link</label>
                                    <input type="text" class="form-control" id="button_link" name="button_link" required>
                                </div>
                                <div class="form-group mt-4">
                                        <label for="category_id">Category</label>
                                        <select class="form-control" id="category_id" name="category_id" required>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $productData->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                <button type="submit" class="btn btn-primary">Add</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Edit-->
            @foreach($products as $productData)
    <div class="modal fade" id="editProductModal{{ $productData->id }}" tabindex="-1" aria-labelledby="editProductModalLabel{{ $productData->id }}" aria-hidden="true">
        <div class="modal-dialog modal-m">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="product-edit" action="{{ route('admin.product-update', $productData->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="category_id" value="{{ $sort }}">
                                    <div class="form-group">
                                        <div class="mx-auto">
                                            <img class="product-img product-img-modal" src="{{ asset($productData->image) }}" alt="Product Image" style="max-width: 100%; height: auto;">
                                        </div>
                                        <label for="image">Product Image</label>
                                        <input type="file" class="form-control" accept="image/*" name="image" id="image">
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="title">Product Title</label>
                                        <input type="text" class="form-control" id="title" name="title" required value="{{ $productData->title }}">
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="button_link">Button Link</label>
                                        <input type="text" class="form-control" id="button_link" name="button_link" required value="{{ $productData->button_link }}">
                                    </div>
                                    <div class="form-group mt-4">
                                        <label for="category_id">Category</label>
                                        <select class="form-control" id="category_id" name="category_id" required>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $productData->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" name="product_id" id="product-id-edit" value="{{ $productData->id }}">
                                    <button type="submit" class="btn btn-success">Edit</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

                <!-- Modal Delete-->
                @foreach($products as $productData)
    <div class="modal fade" id="deleteProductModal{{ $productData->id }}" tabindex="-1" aria-labelledby="deleteProductModalLabel{{ $productData->id }}" aria-hidden="true">
        <div class="modal-dialog modal-m">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteProductModalLabel">Delete Product</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    <form id="product-delete" method="POST" action="{{ route('admin.product-destroy', $productData->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <p>Are you sure you want to delete <strong id="product-title">{{ $productData->title }}</strong>?</p>
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
