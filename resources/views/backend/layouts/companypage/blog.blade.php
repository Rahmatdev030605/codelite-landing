@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')

<div class="col-md-16">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-video">Blog</h3>
        </div>

        <div class="col-md-12 mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-video">Blog</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.blog-form-edit', ['id' => 1]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="hero_title">Before Blot Title</label>
                            <input type="text" name="blog_bef_title" class="form-control" required maxlength="255" value="{{ $blog->blog_bef_title }}">
                        </div>
                        <div class="form-group">
                            <label for="hero_title">Blog Title</label>
                            <input type="text" name="blog_title" class="form-control" required maxlength="255" value="{{ $blog->blog_title }}">
                        </div>

                        <div class="form-group">
                            <label for="about_desc">Blog Desc</label>
                            <textarea name="blog_desc" class="form-control" required>{{ $blog->blog_desc }}</textarea>
                        </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-12 mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-video">Leadership</h3>
                </div>
                <div class="card-body">
                        <div class="form-group">
                            <label for="hero_title">Before Featured Product Title</label>
                            <input type="text" name="featured_product_bef_title " class="form-control" required maxlength="255" value="{{ $blog->featured_product_bef_title }}">
                        </div>
                        <div class="form-group">
                            <label for="hero_title">Featured Product Title</label>
                            <input type="text" name="featured_product_title" class="form-control" required maxlength="255" value="{{ $blog->featured_product_title }}">
                        </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

@endsection
