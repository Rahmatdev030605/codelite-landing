@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')

<div class="col-md-16">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-video">Team</h3>
        </div>

        <div class="col-md-12 mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-video">Teams</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.team-form-edit', ['id'=> 1]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="hero_title">Before Team Title</label>
                            <input type="text" name="team_bef_title" class="form-control" required maxlength="255" value="{{ $team->team_bef_title }}">
                        </div>
                        <div class="form-group">
                            <label for="hero_title">Team Title</label>
                            <input type="text" name="team_title" class="form-control" required maxlength="255" value="{{ $team->team_title }}">
                        </div>

                        <div class="form-group">
                            <label for="about_desc">Team Desc</label>
                            <textarea name="team_desc" class="form-control" required>{{ $team->team_desc }}</textarea>
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
                            <label for="hero_title">Before Leadership Title</label>
                            <input type="text" name="leadership_bef_title" class="form-control" required maxlength="255" value="{{ $team->leadership_bef_title }}">
                        </div>
                        <div class="form-group">
                            <label for="hero_title">Leadership Title</label>
                            <input type="text" name="leadership_title" class="form-control" required maxlength="255" value="{{ $team->leadership_title }}">
                        </div>

                        <div class="form-group">
                            <label for="about_desc">Leadership Desc</label>
                            <textarea name="leadership_desc" class="form-control" required>{{ $team->leadership_desc }}</textarea>
                        </div>
                </div>
            </div>
            <!-- /.card -->
        </div>

        <div class="col-md-12 mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-video">Features</h3>
                </div>
                <div class="card-body">
                        <div class="form-group">
                            <label for="hero_title">Before Features Title</label>
                            <input type="text" name="features_bef_title" class="form-control" required maxlength="255" value="{{ $team->features_bef_title }}">
                        </div>
                        <div class="form-group">
                            <label for="hero_title">Features Title</label>
                            <input type="text" name="features_title" class="form-control" required maxlength="255" value="{{ $team->features_title }}">
                        </div>

                        <div class="form-group">
                            <label for="about_desc">Feature Desc</label>
                            <textarea name="features_desc" class="form-control" required>{{ $team->features_desc }}</textarea>
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
                            <label for="hero_title">Before Our Team Title</label>
                            <input type="text" name="our_team_bef_title" class="form-control" required maxlength="255" value="{{ $team->our_team_bef_title }}">
                        </div>
                        <div class="form-group">
                            <label for="hero_title">Our Team Title</label>
                            <input type="text" name="our_team_title" class="form-control" required maxlength="255" value="{{ $team->our_team_title }}">
                        </div>

                        <div class="form-group">
                            <label for="about_desc">Our Team Desc</label>
                            <textarea name="our_team_desc" class="form-control" required>{{ $team->our_team_desc }}</textarea>
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
