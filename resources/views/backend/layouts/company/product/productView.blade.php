@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title mt-2"><strong>Product</strong></h3>
    </div>

    <div class="card-body">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="partner-grid mx-auto">
                                <div class="image-container">
                                    <img class="blog-img" src="{{ asset('img/product/product1.jpg') }}" style="width: 100%; height: 200px; object-fit: cover;">
                                </div>
                                <div class="blog-head mb-2">
                                    <h6 class="blog-category">Product Data</h6>
                                </div>
                                <div class="btn-group">
                                    <a href="{{ route('admin.product') }}" type="button" class="btn btn-info">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="partner-grid mx-auto">
                                <div class="image-container">
                                    <img class="blog-img" src="{{ asset('img/product/product2.jpg') }}" style="width: 100%; height: 200px; object-fit: cover;">
                                </div>
                                <div class="blog-head mb-2">
                                    <h6 class="blog-category">Product Category</h6>
                                </div>
                                <div class="btn-group">
                                    <a href="{{ route('admin.productCategory') }}" type="button" class="btn btn-info">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
