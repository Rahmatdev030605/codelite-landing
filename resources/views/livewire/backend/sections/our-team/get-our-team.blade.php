@section('title', __('Our Team'))

<div class="col-md-16">
    <div class="card card-primary">
        <div class="card-header d-flex justify-content-between">
            <h3 class="card-video"><strong>Our Services</strong></h3>
            <a href="{{ route('admin.new-our-team') }}" class="btn btn-success" style="color: white; width: 10%;">New
                +</a>
        </div>

        <div class="card-body">
            <div class="container">
                <div class="container-fluid">
                    <div>
                        @livewire('backend.our-team-table', ['searchable' => 'title,heading,description'])
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
