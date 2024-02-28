@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')

<div class="col-md-16">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-video">Partner</h3>
        </div>
        <div class="col-md-12 mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-video">Partner</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.partners-form-edit', ['id' => 1]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="hero_title">Before Partner Title</label>
                            <input type="text" name="partner_bef_title" class="form-control" required maxlength="255" value="{{ $partner->partner_bef_title }}">
                        </div>
                        <div class="form-group">
                            <label for="hero_title">Partner Title</label>
                            <input type="text" name="partner_title" class="form-control" required maxlength="255" value="{{ $partner->partner_title }}">
                        </div>

                        <div class="form-group">
                            <label for="about_desc">Partner Desc</label>
                            <textarea name="partner_desc" class="form-control" required>{{ $partner->partner_desc }}</textarea>
                        </div>
                </div>
            </div>
            <!-- /.card -->
        </div>

        <div class="col-md-12 ">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-video">Our Partner</h3>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="hero_image">Our Partner Image</label><br>
                        <div id="image-view-pages">
                            <img id="imagePages" src="{{ asset($partner->our_partner_image) }}" alt="gagal">
                        </div>
                        <input type="file" name="our_partner_image" class="form-control mt-2" accept="image/*">
                    </div>

                    <div class="form-group">
                        <label for="hero_title">Before Our Partner Title</label>
                        <input type="text" name="our_partner_bef_title" class="form-control" required maxlength="255" value="{{ $partner->our_partner_bef_title }}">
                    </div>
                    <div class="form-group">
                        <label for="hero_title">Our Partner title</label>
                        <input type="text" name="our_partner_title" class="form-control" required maxlength="255" value="{{ $partner->our_partner_title }}">
                    </div>

                    <div class="form-group">
                        <label for="about_desc">Our Partner Subtitle</label>
                        <textarea name="our_partner_sub" class="form-control" required>{{ $partner->our_partner_sub }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="about_desc">Our Partner Desc</label>
                        <textarea name="our_partner_desc" class="form-control" required>{{ $partner->our_partner_desc }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 ">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-video">Partner Trusted</h3>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="hero_title">Before Partner Trusted Title</label>
                        <input type="text" name="partners_trusted_bef_title" class="form-control" required maxlength="255" value="{{ $partner->partners_trusted_bef_title }}">
                    </div>
                    <div class="form-group">
                        <label for="hero_title">Partner Trusted Title</label>
                        <input type="text" name="partners_trusted_title" class="form-control" required maxlength="255" value="{{ $partner->partners_trusted_title }}">
                    </div>

                    <div class="form-group">
                        <label for="about_desc">Partner Trusted Desc</label>
                        <textarea name="partners_trusted_desc" class="form-control" required>{{ $partner->partners_trusted_desc }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 ">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-video">Partner Trust</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="hero_title">Partner Trust Title</label>
                        <input type="text" name="partners_trust_title" class="form-control" required maxlength="255" value="{{ $partner->partners_trust_title }}">
                    </div>
                    <div class="form-group">
                        <label for="hero_title">Partner Trust Desc First</label>
                        <input type="text" name="partners_trust_desc_firs" class="form-control" required maxlength="255" value="{{ $partner->partners_trust_desc_firs }}">
                    </div>
                    <div class="form-group">
                        <label for="about_desc">Our Partner Trust Desc Second Desc</label>
                        <textarea name="partners_trust_desc_secn" class="form-control" required>{{ $partner->partners_trust_desc_secn }}</textarea>
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
                        <label for="hero_image">Our Partner Trust Image</label><br>
                        <div id="image-view-pages">
                            <img id="imagePages" src="{{ asset($partner->partners_trust_image) }}" alt="gagal">
                        </div>
                        <input type="file" name="partners_trust_image" class="form-control mt-2" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="hero_title">Partner Trust Title</label>
                        <input type="text" name="partners_trust_title" class="form-control" required maxlength="255" value="{{ $partner->partners_trust_title }}">
                    </div>
                    <div class="form-group">
                        <label for="hero_title">Our Trust Desc First</label>
                        <input type="text" name="partners_trust_desc_firs" class="form-control" required maxlength="255" value="{{ $partner->partners_trust_desc_firs }}">
                    </div>

                    <div class="form-group">
                        <label for="about_desc">Our Trust Desc Second</label>
                        <textarea name="partners_trust_desc_secn" class="form-control" required>{{ $partner->partners_trust_desc_secn }}</textarea>
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
                        <input type="text" name="team_title" class="form-control" required maxlength="255" value="{{ $partner->team_title }}">
                    </div>
                    <div class="form-group">
                        <label for="about_desc">Team Desc</label>
                        <textarea name="team_desc" class="form-control" required>{{ $partner->team_desc }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

@endsection
