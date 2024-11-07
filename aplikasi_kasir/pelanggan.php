<br><br>
<div class="container-fluid px-4">
    <h1 class="mt-4">Pelanggan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pelanggan</li>
    </ol>

    <!-- Button to Add Data -->
    <a href="?page=pelanggan_tambah" class="btn btn-primary mb-3">+ Tambah Data</a>
    
    <hr>

    <!-- Table displaying customers' data -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama Pelanggan</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM pelanggan");
            while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $data['nama_pelanggan']; ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                    <td><?php echo $data['no_telepon']; ?></td>
                    <td>
                        <a href="?page=pelanggan_ubah&&id=<?php echo $data['id_pelanggan']; ?>" 
                           class="btn btn-secondary btn-sm">Ubah</a>
                        <a href="?page=pelanggan_hapus&&id=<?php echo $data['id_pelanggan']; ?>" 
                           class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Styling Enhancements -->
<style>
    /* Custom Styling for the Table */
    table {
        width: 100%;
        margin-top: 20px;
    }

    table th, table td {
        text-align: center;
        vertical-align: middle;
    }

    /* Button Styling */
    .btn {
        margin: 0 5px;
    }

    .btn-sm {
        padding: 5px 10px;
        font-size: 0.875rem;
    }

    /* Confirmation dialog */
    .btn-danger:hover {
        background-color: #c82333;
        color: white;
    }

    /* Table responsive for mobile devices */
    @media (max-width: 768px) {
        table {
            font-size: 0.875rem;
        }

        .btn {
            font-size: 0.8rem;
        }
    }
</style>
