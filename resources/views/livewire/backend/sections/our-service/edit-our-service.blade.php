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
                    <form wire:submit.prevent="edit">
                        <div class="form-group mb-3">
                            <label for="type_id">Type:</label>
                            <select class="form-select" wire:model="page_type_id" id="type_id">
                                <option value="">Select Type</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                            @error('page_type_id')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="status">Status:</label>
                            <select class="form-control" wire:model="status" id="status">
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Non Active</option>
                            </select>
                            @error('status')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="hero_image">Main Image</label>
                            @if ($image)
                                <img src="{{ asset('storage/' . $image) }}" alt="Previous Image"
                                    style="max-width: 200px;">
                            @endif
                            <input type="file" wire:model="image" class="form-control" accept="image/*">
                            @error('image')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" wire:model="title" class="form-control" maxlength="255"
                                value="{{ $title }}">
                            @error('title')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="heading">Heading</label>
                            <input type="text" wire:model="heading" class="form-control" maxlength="255"
                                value="{{ $heading }}">
                            @error('heading')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea wire:model="description" class="form-control" value="{{ $description }}"></textarea>
                            @error('description')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description_second">Description Second</label>
                            <textarea wire:model="description_second" class="form-control" value="{{ $description_second }}"></textarea>
                            @error('description_second')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="button_link">Button Link</label>
                            <input type="text" wire:model="button_link" class="form-control"
                                value="{{ $button_link }}">
                            @error('button_link')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
