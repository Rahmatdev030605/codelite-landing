@section('title', __('Hero'))

<div class="col-md-16">
    <div class="card card-primary">
        <div class="card-header d-flex justify-content-between">
            <h3 class="card-video"><strong>Hero</strong></h3>
            <a href="{{ route('admin.new-hero') }}" class="btn btn-success" style="color: white; width: 10%;">New
                +</a>
        </div>

        <div class="card-body">
            <div class="container">
                <div class="container-fluid">
                    <div>
                        @livewire('backend.hero-table', ['searchable' => 'title,heading,description'])
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
