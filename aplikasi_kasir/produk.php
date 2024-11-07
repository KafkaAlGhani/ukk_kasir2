<?php
// Connect to the database
include "koneksi.php";

// Query to fetch products
$query = mysqli_query($koneksi, "SELECT * FROM produk");
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Produk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Produk</li>
    </ol>
    <a href="?page=produk_tambah" class="btn btn-primary mb-3">+ Tambah Data</a>
    <hr>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stock</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($query) {
            while ($data = mysqli_fetch_array($query)) {
                // Format price as currency
                $harga = number_format($data['harga'], 0, ',', '.');
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($data['nama_produk']); ?></td>
                    <td>Rp <?php echo $harga; ?></td>
                    <td><?php echo $data['stok']; ?></td>
                    <td>
                        <a href="?page=produk_ubah&&id=<?php echo $data['id_produk']; ?>" class="btn btn-secondary">Ubah</a>
                        <a href="?page=produk_hapus&&id=<?php echo $data['id_produk']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">Hapus</a>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='4' class='text-center'>Gagal mengambil data produk: " . mysqli_error($koneksi) . "</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>

<!-- Custom CSS for styling -->
<style>
    /* Table styling */
    table.table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }
    table.table th, table.table td {
        padding: 12px;
        text-align: left;
    }
    table.table th {
        background-color: #f4f4f4;
        font-weight: bold;
    }
    table.table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    table.table tbody tr:hover {
        background-color: #f1f1f1;
    }

    /* Button styling */
    .btn {
        padding: 8px 16px;
        font-size: 14px;
        margin: 5px;
        text-decoration: none;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        display: inline-block;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    /* Breadcrumb Styling */
    .breadcrumb {
        background-color: #f8f9fa;
    }

    /* Margin for buttons */
    .mb-3 {
        margin-bottom: 1rem;
    }

</style>
