@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')

<div class="col-md-16">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-video">New Team</h3>
        </div>

        <div class="col-md-12 mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-video"></h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.store-team') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="form-group">
                            <label for="hero_image">Profile Image</label>
                            <input type="checkbox" name="fields[image]" value="image" onchange="toggleField(this)">
                            <br>
                            <input type="file" name="profile_img" class="form-control" accept="image/*">
                        </div>

                        <div class="form-group">
                            <label for="title">Name</label>
                            <input type="checkbox" name="fields[title]" value="title" onchange="toggleField(this)">
                            <input type="text" name="name" class="form-control" maxlength="255" value="">
                        </div>
                        <div class="form-group">
                            <label for="heading">Age</label>
                            <input type="checkbox" name="fields[heading]" value="heading" onchange="toggleField(this)">
                            <input type="text" name="age" class="form-control" maxlength="255" value="">
                        </div>
                        <div class="form-group">
                            <label for="heading">Job</label>
                            <input type="checkbox" name="fields[heading]" value="heading" onchange="toggleField(this)">
                            <select class="form-select" name="job" size="3" aria-label="Size 3 select example">
                                <option value="DesignTeaer">Designer</option>
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
                            <label for="button-link">Link Linkedin</label>
                            <input type="checkbox" name="fields[button_link]" value="button_link_first" onchange="toggleField(this)">
                            <input type="text" name="link_linkedin" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="button-link">Link Instagram</label>
                            <input type="checkbox" name="fields[button_link]" value="button_link_first" onchange="toggleField(this)">
                            <input type="text" name="link_instagram" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="button-link">Link Twitter</label>
                            <input type="checkbox" name="fields[button_link]" value="button_link_first" onchange="toggleField(this)">
                            <input type="text" name="link_twitter" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="button-link">email</label>
                            <input type="checkbox" name="fields[button_link]" value="button_link_first" onchange="toggleField(this)">
                            <input type="text" name="link_twitter" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="button-link">Button Link</label>
                            <input type="checkbox" name="fields[button_link]" value="button_link_first" onchange="toggleField(this)">
                            <input type="text" name="button_link" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="button-link">box_message_heading</label>
                            <input type="checkbox" name="fields[button_link]" value="button_link_first" onchange="toggleField(this)">
                            <input type="text" name="box_message_heading" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="desc">Box Message Description</label>
                            <input type="checkbox" name="fields[box_message_desc]" value="description" onchange="toggleField(this)">
                            <textarea name="box_message_desc" class="form-control"></textarea>
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
