@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')

<div class="col-md-16">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-video">EDIT HERO</h3>
        </div>

        <div class="col-md-12 mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-video"></h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.update-hero', ['id' => $hero->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="type_id">Type:</label>
                            <select class="form-select" name="page_type_id" id="type_id">
                                <option value="{{ $hero->page_type_id }}">Select Type</option>
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
                                <option value="1" {{ old('status', $hero->status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="" {{ old('status', $hero->status ?? '') == 'not active' ? 'selected' : '' }}>Non Active</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="hero_image">Main Image</label>
                            <br>
                            <div id="image-view-pages">
                                <img id="imagePages" src="{{ asset($hero->image) }}" alt="gagal">
                            </div>
                            <input type="file" name="image" class="form-control" accept="image/*">
                        </div>

                        <div class="form-group">
                            <label for="hero_image">Sub Image</label>
                            <br>
                            <div id="image-view-pages">
                                <img id="imagePages" src="{{ asset($hero->sub_image) }}" alt="image not found">
                            </div>
                            <input type="file" name="sub_image" class="form-control" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" maxlength="255" value="{{ $hero->title }}">
                        </div>
                        <div class="form-group">
                            <label for="heading">Heading</label>
                            <input type="text" name="heading" class="form-control" maxlength="255" value="{{ $hero->heading }}">
                        </div>
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <textarea name="description" class="form-control">{{ $hero->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="highlight">Highlight</label>
                            <input type="text" name="highlight" class="form-control" value="{{ $hero->highlight }}" data-role="tagsinput">
                        </div>
                        <div class="form-group">
                            <label for="button-link">Button Link</label>
                            <input type="text" name="button_link" class="form-control" value="{{ $hero->button_link }}" data-role="tagsinput">
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
