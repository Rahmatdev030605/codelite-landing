@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')

<div class="col-md-16">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-video">EDIT OUR MODEL</h3>
        </div>

        <div class="col-md-12 mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-video"></h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.update-our-model', ['id'=> $our->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="type_id">Type:</label>
                            <select class="form-select" name="page_type_id" id="type_id">
                                <option value="{{ $our->page_type_id }}">Select Type</option>
                                @foreach($types as $type)
                                <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>
                                    {{ $type->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="status">Status:</label>
                            <select class="form-control" id="status" name="status">
                                <option value="active" {{ old('status', $our->status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="not active" {{ old('status', $our->status ?? '') == 'not active' ? 'selected' : '' }}>Non Active</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" maxlength="255" value="{{ $our->title }}">
                        </div>
                        <div class="form-group">
                            <label for="heading">Heading</label>
                            <input type="text" name="heading" class="form-control" maxlength="255" value="{{ $our->heading }}">
                        </div>
                        <div class="form-group">
                            <label for="heading">Subtitle Heading</label>
                            <input type="text" name="sub_heading" class="form-control" maxlength="255" value="{{ $our->sub_heading }}">
                        </div>
                        <div class="form-group">
                            <label for="button-link">Button Link</label>
                            <input type="text" name="button_link" class="form-control" value="{{ $our->button_link }}">
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
