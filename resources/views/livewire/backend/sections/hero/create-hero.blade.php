<div class="col-md-16">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-video">New Hero</h3>
        </div>

        <div class="col-md-12 mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-video"></h3>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="save">
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
                            <input type="file" wire:model="image" class="form-control" accept="image/*">
                            @error('image')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="hero_image">Sub Image</label>
                            <input type="file" wire:model="sub_image" class="form-control" accept="image/*">
                            @error('sub_image')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" wire:model="title" class="form-control" maxlength="255">
                            @error('title')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="heading">Heading</label>
                            <input type="text" wire:model="heading" class="form-control" maxlength="255">
                            @error('heading')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea wire:model="description" class="form-control"></textarea>
                            @error('description')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="title">Highlight 1</label>
                            <input type="text" wire:model="highlight_1" class="form-control" maxlength="255">
                            @error('highlight_1')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="title">Highlight 2</label>
                            <input type="text" wire:model="highlight_2" class="form-control" maxlength="255">
                            @error('highlight_2')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="title">Highlight 3</label>
                            <input type="text" wire:model="highlight_3" class="form-control" maxlength="255">
                            @error('highlight_3')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="button_link">Button Link 1</label>
                            <input type="text" wire:model="button_link_1" class="form-control">
                            @error('button_link_1')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="button_link">Button Link 2</label>
                            <input type="text" wire:model="button_link_2" class="form-control">
                            @error('button_link_2')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
