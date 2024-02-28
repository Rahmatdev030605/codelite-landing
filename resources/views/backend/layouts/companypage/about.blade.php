@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')

<div class="col-md-16">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-video">About Us</h3>
        </div>
        <div class="col-md-12 mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-video">Company</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.about-us-edit', ['id' => 1]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="hero_title">Before Compony Title</label>
                            <input type="text" name="company_bef_title" class="form-control" required maxlength="255" value="{{ $about->company_bef_title }}">
                        </div>
                        <div class="form-group">
                            <label for="hero_title">Company Title</label>
                            <input type="text" name="company_title" class="form-control" required maxlength="255" value="{{ $about->company_title }}">
                        </div>

                        <div class="form-group">
                            <label for="about_desc">Company Desc</label>
                            <textarea name="company_desc" class="form-control" required>{{ $about->company_desc }}</textarea>
                        </div>
                </div>
            </div>
            <!-- /.card -->
        </div>

        <div class="col-md-12 ">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-video">Our Company</h3>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="hero_image">Our Company Image</label><br>
                        <div id="image-view-pages">
                            <img id="imagePages" src="{{ asset($about->our_company_image) }}" alt="gagal">
                        </div>
                        <input type="file" name="our_company_image" class="form-control mt-2" accept="image/*">
                    </div>

                    <div class="form-group">
                        <label for="hero_title">Before Our Company Title</label>
                        <input type="text" name="our_mdl_bef_title" class="form-control" required maxlength="255" value="{{ $about->our_company_bef_title }}">
                    </div>
                    <div class="form-group">
                        <label for="hero_title">Our Company title</label>
                        <input type="text" name="our_company_title" class="form-control" required maxlength="255" value="{{ $about->our_company_title }}">
                    </div>

                    <div class="form-group">
                        <label for="about_desc">Our Company Subtitle</label>
                        <textarea name="our_company_sub" class="form-control" required>{{ $about->our_company_sub }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="about_desc">Our Company Desc</label>
                        <textarea name="our_company_desc" class="form-control" required>{{ $about->our_company_desc }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 ">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-video">Service</h3>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="hero_title">Service Before Title</label>
                        <input type="text" name="service_bef_title" class="form-control" required maxlength="255" value="{{ $about->service_bef_title }}">
                    </div>
                    <div class="form-group">
                        <label for="hero_title">Service Title</label>
                        <input type="text" name="service_title" class="form-control" required maxlength="255" value="{{ $about->service_title }}">
                    </div>

                    <div class="form-group">
                        <label for="about_desc">Service Desc</label>
                        <textarea name="service_desc" class="form-control" required>{{ $about->service_desc }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 ">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-video">Our Team</h3>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="hero_title">Before Our Team Title</label>
                        <input type="text" name="our_team_bef_title" class="form-control" required maxlength="255" value="{{ $about->our_team_bef_title }}">
                    </div>
                    <div class="form-group">
                        <label for="hero_title">Our Team Title</label>
                        <input type="text" name="our_team_title" class="form-control" required maxlength="255" value="{{ $about->our_team_title }}">
                    </div>
                    <div class="form-group">
                        <label for="about_desc">Our Team Desc</label>
                        <textarea name="our_team_desc" class="form-control" required>{{ $about->our_team_desc }}</textarea>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12 ">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-video"> Our Service</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="hero_image">Our Service Image</label><br>
                        <div id="image-view-pages">
                            <img id="imagePages" src="{{ asset($about->our_service_image) }}" alt="gagal">
                        </div>
                        <input type="file" name="our_service_image" class="form-control mt-2" accept="image/*">
                    </div>

                    <div class="form-group">
                        <label for="hero_title">Our Service Title</label>
                        <input type="text" name="our_service_title" class="form-control" required maxlength="255" value="{{ $about->our_service_title }}">
                    </div>
                    <div class="form-group">
                        <label for="hero_title">Our Service Desc First</label>
                        <input type="text" name="our_service_desc_frs" class="form-control" required maxlength="255" value="{{ $about->our_service_desc_frs }}">
                    </div>

                    <div class="form-group">
                        <label for="about_desc">Our Service Desc Second</label>
                        <textarea name="our_service_desc_sec" class="form-control" required>{{ $about->our_service_desc_sec }}</textarea>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-12 ">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-video">Team</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="hero_title">Team Title</label>
                        <input type="text" name="team_title" class="form-control" required maxlength="255" value="{{ $about->team_title }}">
                    </div>
                    <div class="form-group">
                        <label for="about_desc">Team Desc</label>
                        <textarea name="team_desc" class="form-control" required>{{ $about->team_desc }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

@endsection
