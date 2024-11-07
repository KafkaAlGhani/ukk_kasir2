<br><br>
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <!-- Card for Total Pelanggan -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-primary text-white shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pelanggan")); ?></h5>
                    <p class="card-text">Total Pelanggan</p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="?page=pelanggan"></a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!-- Card for Total Produk -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-warning text-white shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM produk")); ?></h5>
                    <p class="card-text">Total Produk</p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="?page=produk"></a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!-- Card for Total Pembelian -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-success text-white shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM penjualan")); ?></h5>
                    <p class="card-text">Penjualan</p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="?page=pembelian"></a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!-- Card for Total User -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-danger text-white shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user")); ?></h5>
                    <p class="card-text">Total User</p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="?page=user"></a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Basic Styling */
    .card {
        transition: transform 0.3s ease-in-out;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }

    .card-body {
        text-align: center;
        font-size: 1.25rem;
        font-weight: bold;
    }

    .card-footer {
        background-color: #f8f9fa;
    }

    .card-footer a {
        color: #007bff;
        font-size: 0.875rem;
        text-decoration: none;
    }

    .card-footer a:hover {
        text-decoration: underline;
    }

    /* Card title styling */
    .card-title {
        font-size: 2rem;
        font-weight: bold;
    }

    .card-text {
        font-size: 1rem;
        font-weight: normal;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .col-xl-3, .col-md-6 {
            flex: 1 1 100%;
        }
    }
</style>
