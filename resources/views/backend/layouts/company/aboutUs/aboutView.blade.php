@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')

<div class="col-md-16">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-video"><strong>About Us</strong></h3>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="mt-3">
                    <form action="" method="GET">
                        <div class="input-group" style="width: 100%;">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>

                <form action="" class="w-50 mt-3" method="POST">

                </form>

                <div class="row mt-3">
                    <div class="blog-grid">

                        <div class="blog-card">
                            <div class="blog-head mb-2">
                                <h6 class="blog-category">Company Contact</h6>
                            </div>
                            <img class="blog-img" src="{{ asset('img/company/jobs.avif') }}">

                            <div class="btn-group">
                                <a href="{{ route('admin.contact') }}" type="button" class="btn btn-info">View</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    // Cari elemen pesan sukses
    var successMessage = document.getElementById('success-message');

    // Periksa apakah pesan sukses ada
    if (successMessage) {
        // Sembunyikan pesan sukses setelah 5 detik
        setTimeout(function() {
            successMessage.style.display = 'none';
        }, 3000); // 5000 milidetik (5 detik)
    }
</script>
@endsection
