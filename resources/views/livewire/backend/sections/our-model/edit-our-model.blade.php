<div class="col-md-16">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-video">New Our Model</h3>
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
                            <label for="sub_heading">Sub Heading</label>
                            <textarea wire:model="sub_heading" class="form-control">{{ $sub_heading }}</textarea>
                            @error('sub_heading')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="button_link">Button Link</label>
                            <input type="text" wire:model="button_link" class="form-control" value="{{ $button_link }}">
                            @error('button_link')
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
