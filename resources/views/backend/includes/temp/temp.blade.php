@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')

<div class="col-md-16">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-video">Career</h3>
        </div>

        <div class="col-md-12 mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-video"></h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="hero_title"></label>
                            <input type="text" name="" class="form-control" required maxlength="255" value="">
                        </div>
                        <div class="form-group">
                            <label for="hero_title"></label>
                            <input type="text" name=" " class="form-control" required maxlength="255" value=""></textarea>
                        </div>
                        <div class="form-group">
                            <label for="about_desc"></label>
                            <textarea name="" class="form-control" required></textarea>
                        </div>
                </div>
            </div>
            <!-- /.card -->
        </div>

        <div class="col-md-12 mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-video"></h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="hero_image"></label><br>
                        <div id="image-view-pages">
                            <img id="imagePages" src="" alt="gagal">
                        </div>
                        <input type="file" name="" class="form-control mt-2" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="about_desc"></label>
                        <textarea name="" class="form-control" required></textarea>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>

        <div class="col-md-12 mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-video"></h3>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="hero_title"></label>
                        <input type="text" name="service_bef_title" class="form-control" required maxlength="255" value=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="hero_title"></label>
                        <input type="text" name="service_title" class="form-control" required maxlength="255" value=""></textarea>
                    </div>

                    <div class="form-group">
                        <label for="about_desc"></label>
                        <textarea name="" class="form-control" required></textarea>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>

        <div class="col-md-12 mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-video"></h3>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="hero_title"></label>
                        <input type="text" name="" class="form-control" required maxlength="255" value=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="hero_title"></label>
                        <input type="text" name="" class="form-control" required maxlength="255" value=""></textarea>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>

        <div class="col-md-12 mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-video"></h3>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="hero_title"></label>
                        <input type="text" name="" class="form-control" required maxlength="255" value=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="hero_title"></label>
                        <input type="text" name="" class="form-control" required maxlength="255" value=""></textarea>
                    </div>

                    <div class="form-group">
                        <label for="about_desc"></label>
                        <textarea name="" class="form-control" required></textarea>
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
