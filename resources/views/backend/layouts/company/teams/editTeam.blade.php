@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')

<div class="col-md-16">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-video">Edit Our Team</h3>
        </div>

        <div class="col-md-12 mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-video"></h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.update-team', ['id' => $team->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="hero_image">Profile Image</label>
                            <input type="checkbox" name="fields[profile_img]" value="image" onchange="toggleField(this)">
                            <br>
                            <div id="image-view-pages">
                                <img id="imagePages" src="{{ asset($team->profile_img) }}" alt="gagal">
                            </div>
                            <input type="file" name="profile_img" class="form-control" accept="image/*">
                        </div>

                        <div class="form-group">
                            <label for="heading">Name</label>
                            <input type="checkbox" name="fields[name]" value="name" onchange="toggleField(this)">
                            <input type="text" name="name" class="form-control" maxlength="255" value="{{ $team->name }}">
                        </div>

                        <div class="form-group">
                            <label for="heading">Age</label>
                            <input type="checkbox" name="fields[age]" value="name" onchange="toggleField(this)">
                            <input type="text" name="age" class="form-control" maxlength="255" value="{{ $team->age }}">
                        </div>

                        <div class="form-group">
                            <label for="heading">Job</label>
                            <input type="checkbox" name="fields[heading]" value="heading" onchange="toggleField(this)">
                            <select class="form-select" name="job" size="3" aria-label="Size 3 select example">
                                <option selected>Job Select</option>
                                <option value="Designer">Designer</option>
                                <option value="Backend Developer">Backend Developer</option>
                                <option value="Frontend Developer">Frontend Developer</option>
                                <option value="UI/Ux"> UI/UX</option>
                                <option value="Android Developer">Android Developer</option>
                                <option value="Web Designer">Web Designer</option>
                                <option value="Business Analyst">Business Analyst</option>
                                <option value="System Engineer">System Engineer</option>
                                <option value="Cloud Expert">Cloud Expert</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="heading">Link Linkedin</label>
                            <input type="checkbox" name="fields[link_linkedin]" value="name" onchange="toggleField(this)">
                            <input type="text" name="link_linkedin" class="form-control" maxlength="255" value="{{ $team->link_linkedin }}">
                        </div>
                        <div class="form-group">
                            <label for="heading">Link Instagram</label>
                            <input type="checkbox" name="fields[link_instagram]" value="name" onchange="toggleField(this)">
                            <input type="text" name="link_instagram" class="form-control" maxlength="255" value="{{ $team->link_instagram }}">
                        </div>
                        <div class="form-group">
                            <label for="heading">Link twitter</label>
                            <input type="checkbox" name="fields[link_twitter]" value="name" onchange="toggleField(this)">
                            <input type="text" name="link_twitter" class="form-control" maxlength="255" value="{{ $team->link_twitter }}">
                        </div>
                        <div class="form-group">
                            <label for="heading">Email</label>
                            <input type="checkbox" name="fields[email]" value="name" onchange="toggleField(this)">
                            <input type="text" name="email" class="form-control" maxlength="255" value="{{ $team->email }}">
                        </div>

                        <div class="form-group">
                            <label for="desc">Box message Heading</label>
                            <input type="checkbox" name="fields[box_message_heading]" value="description" onchange="toggleField(this)">
                            <textarea name="box_message_heading" class="form-control">{{ $team->box_message_heading }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="desc">Box Message Description</label>
                            <input type="checkbox" name="fields[box_message_desc]" value="description" onchange="toggleField(this)">
                            <textarea name="box_message_desc" class="form-control">{{ $team->box_message_desc }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="button-link">Button Link</label>
                            <input type="checkbox" name="fields[button_link_first]" value="button_link" onchange="toggleField(this)">
                            <input type="text" name="button_link" class="form-control" value="{{ $team->button_link }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

@endsection
