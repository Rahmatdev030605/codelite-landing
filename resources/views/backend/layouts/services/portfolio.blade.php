@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')

<div class="col-md-16">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-video"><strong>Portfolio</strong></h3>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="mt-3">
                    <form action="" method="GET">
                        @csrf
                        <div class="input-group" style="width: 100%;">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                            <a href="" class="btn btn-success ml-5">Add Portfolio</a>
                        </div>
                    </form>
                </div>

                <form action="" class="w-50 mt-3" method="POST">
                    @csrf
                    <select name="filter" id="filter" class="btn btn-outline-secondary text-left">
                        <option selected>Filter</option>
                        <option value="" </option>
                    </select>
                    <select name="sort" id="sort" class="btn btn-outline-secondary text-left ml-2">
                        <option selected>Sort By</option>
                        <option value="ascending">A-Z</option>
                        <option value="descending">Z-A</option>
                        <option value="newest">Newest</option>
                        <option value="oldest">Oldest</option>
                    </select>

                    <button type="submit" class="btn btn-info ml-2">Apply</button>
                </form>

                <div id="success-message" class="mt-3">
                    <div class="alert alert-success">
                    </div>
                </div>
                <div id="error-message" class="mt-3">
                    <div class="alert alert-danger">
                        <ul>
                            <li></li>
                        </ul>
                    </div>
                </div>
                <div class="row mt-3">
                    <style>
                        .product-grid {
                            display: grid;
                            grid-template-columns: repeat(3, minmax(0, 1fr));
                        }

                        .product-card {
                            border: 1px solid #ccc;
                            border-radius: 5px;
                            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                            margin: 10px;
                            padding: 20px;
                            max-width: 400px;
                            background-color: white;
                        }

                        .category-container {
                            width: 100%;
                            text-align: end;
                        }

                        .category {
                            background-color: rgb(185, 28, 28);
                            font-size: 12px;
                            font-weight: medium;
                            color: white;
                            padding: 8px 12px;
                            border-radius: 5px;
                        }

                        .product-name {
                            font-weight: bold;
                            font-size: 1.25rem;
                        }

                        .product-customer {
                            text-decoration-line: underline;
                            font-weight: 500;
                            font-size: 14px;
                        }

                        .product-desc {
                            font-size: 14px;
                        }

                        .product-date {
                            width: 100%;
                            text-align: end;
                            font-size: 14px;
                        }

                        .product-img {
                            margin-bottom: 16px;
                            max-height: 208px;
                            width: 100%;
                            object-fit: cover;
                        }

                        .product-img-modal {
                            margin-bottom: 16px;
                            height: auto;
                            width: 100%;
                            object-fit: cover;
                        }

                        .technology-card {
                            border: 1px solid #ccc;
                            border-radius: 5px;
                            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                            margin: 5px;
                            padding: 20px;
                            max-width: 400px;
                            background-color: white;
                        }

                        .deliverable-card {
                            border: 1px solid #ccc;
                            border-radius: 5px;
                            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                            margin: 5px;
                            padding: 20px;
                            max-width: 400px;
                            background-color: white;
                        }

                        .handle-card {
                            border: 1px solid #ccc;
                            border-radius: 5px;
                            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                            margin: 5px;
                            padding: 20px;
                            max-width: 400px;
                            background-color: white;
                        }
                    </style>
                    <div class="product-grid">
                        <div class="product-card">
                            <img class="product-img" src="" alt="" data-toggle="modal" data-target="#viewPortofolioModal">
                            <div>
                                <div class="category-container">
                                    <span class="category"></span>
                                </div>
                                <h5 class="product-name"></h5>
                                <h6 class="product-customer"></h6>
                                <p class="product-desc"></p>
                                <p class="product-date"></p>
                            </div>
                            <div class="actions">
                                <a href="" class="btn btn-success">Edit</a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal">Delete</button>
                            </div>
                            <!-- Modal Konfirmasi Hapus -->
                            <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete <strong></strong>?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                            <form id="delete-form" action="" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Yes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Konfirmasi Hapus End -->

                            <!-- Modal portofolio -->
                            <div class="modal fade" id="viewPortofolioModal" tabindex="-1" aria-labelledby="viewPortofolioModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="viewPortofolioModalLabel">View Portofolio</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img class="product-img-modal" src="" alt="">
                                            <div>
                                                <div class="category-container">
                                                    <span class="category"></span>
                                                </div>
                                                <h5 class="product-name"></h5>
                                                <h6 class="product-customer"></h6>
                                                <p class="product-desc"></p>
                                                <h5 class="product-name">Details</h5>
                                                <p class="product-desc"></p>
                                                <h5 class="product-name">Our Solution</h5>
                                                <p class="product-desc"></p>
                                                <p class="product-date"></p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
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
    var errorMessage = document.getElementById('error-message');

    // Periksa apakah pesan sukses ada
    if (successMessage) {
        // Sembunyikan pesan sukses setelah 5 detik
        setTimeout(function() {
            successMessage.style.display = 'none';
        }, 3000); // 5000 milidetik (5 detik)
    }
    if (errorMessage) {
        // Sembunyikan pesan sukses setelah 5 detik
        setTimeout(function() {
            errorMessage.style.display = 'none';
        }, 3000); // 5000 milidetik (5 detik)
    }
</script>
@endsection
