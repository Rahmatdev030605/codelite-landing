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
                    <h3 class="card-video">Career</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.career-form-edit', ['id' => 1]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="hero_title">Before Career Title</label>
                            <input type="text" name="career_bef_title" class="form-control" required maxlength="255" value="{{ $career->career_bef_title }}">
                        </div>
                        <div class="form-group">
                            <label for="hero_title">Career Title</label>
                            <input type="text" name="career_title " class="form-control" required maxlength="255" value="{{ $career->career_title }}"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="about_desc">Career Desc</label>
                            <textarea name="career_desc" class="form-control" required>{{ $career->career_desc }}</textarea>
                        </div>
                </div>
            </div>
            <!-- /.card -->
        </div>

        <div class="col-md-12 mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-video">Our Team</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="hero_image">Our Team Image</label><br>
                        <div id="image-view-pages">
                            <img id="imagePages" src="{{ asset($career->our_team_image) }}" alt="gagal">
                        </div>
                        <input type="file" name="our_team_image" class="form-control mt-2" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="about_desc">Our Team Desc</label>
                        <textarea name="our_team_desc" class="form-control" required>{{ $career->our_team_desc }}</textarea>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>

        <div class="col-md-12 mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-video">Service</h3>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="hero_title">Before Service Title</label>
                        <input type="text" name="service_bef_title" class="form-control" required maxlength="255" value="{{ $career->service_bef_title }}"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="hero_title">Service Title</label>
                        <input type="text" name="service_title" class="form-control" required maxlength="255" value="{{ $career->service_title }}"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="about_desc">Service Desc</label>
                        <textarea name="service_desc" class="form-control" required>{{ $career->service_desc }}</textarea>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>

        <div class="col-md-12 mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-video">Job</h3>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="hero_title">Before job Title</label>
                        <input type="text" name="job_bef_title" class="form-control" required maxlength="255" value="{{ $career->job_bef_title }}"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="hero_title">job Title</label>
                        <input type="text" name="job_title" class="form-control" required maxlength="255" value="{{ $career->job_title }}"></textarea>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>

        <div class="col-md-12 mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-video">Our Services</h3>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="hero_title">Our Services Title</label>
                        <input type="text" name="our_services_title" class="form-control" required maxlength="255" value="{{ $career->our_services_title }}"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="hero_title">Our Services Desc First</label>
                        <input type="text" name="our_desc_first" class="form-control" required maxlength="255" value="{{ $career->our_desc_first }}"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="about_desc">Our Services Desc Second</label>
                        <textarea name="our_desc_second" class="form-control" required>{{ $career->our_desc_second }}</textarea>
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
