@section('title', __('Our company'))

<div class="col-md-16">
    <div class="card card-primary">
        <div class="card-header d-flex justify-content-between">
            <h3 class="card-video"><strong>Our Company</strong></h3>
            <a href="{{ route('admin.new-our-company') }}" class="btn btn-success" style="color: white; width: 10%;">New
                +</a>
        </div>

        <div class="card-body">
            <div class="container">
                <div class="container-fluid">
                    <div>
                        @livewire('backend.our-company-table', ['searchable' => 'title,heading,description'])
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
