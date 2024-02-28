@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')

<div class="col-md-16">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-video">Edit Our Services</h3>
        </div>

        <div class="col-md-12 mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-video"></h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.update-our-service', ['id' => $service->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="type_id">Type:</label>
                            <select class="form-select" name="page_type_id" id="type_id">
                                <option value="{{ $service->page_type_id }}">Select Type</option>
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
                                <option value="1" {{ old('status', $service->status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $service->status ?? '') == 'not active' ? 'selected' : '' }}>Non Active</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="hero_image">Image</label>
                            <br>
                            <div id="image-view-pages">
                                <img id="imagePages" src="{{ asset($service->image) }}" alt="gagal">
                            </div>
                            <input type="file" name="image" class="form-control" accept="image/*" >
                        </div>

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" maxlength="255" value="{{ $service->title }}" >
                        </div>
                        <div class="form-group">
                            <label for="heading">Heading</label>
                            <input type="text" name="heading" class="form-control" maxlength="255" value="{{ $service->heading }}" >
                        </div>
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea name="description" class="form-control" >{{ $service->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="desc">Description Second</label>
                            <textarea name="description_second" class="form-control">{{ $service->description_second }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="button-link">Button Link</label>
                            <input type="text" name="button_link" class="form-control" value="">
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
