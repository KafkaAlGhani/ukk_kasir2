<?php
?>
<br><br>
<div class="container-fluid px-4">
    <h1 class="mt-4">Daftar Akun</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Daftar Akun</li>
    </ol>
    <a href="?page=user_tambah" class="btn btn-primary mb-3">+ Tambah Akun</a>
    <hr>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>ID User</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Password</th>
                <th>Level</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM user");
            while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td><?php echo $data['id_user']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['username']; ?></td>
                    <td><?php echo $data['password']; ?></td>
                    <td><?php echo $data['level']; ?></td>
                    <td>
                        <a href="?page=user_ubah&&id=<?php echo $data['id_user']; ?>" class="btn btn-warning btn-sm">Ubah</a>
                        <a href="?page=user_hapus&&id=<?php echo $data['id_user']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus akun ini?');">Hapus</a>
                    </td>
                </tr>
                <?php
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
        text-decoration: none;
        border-radius: 4px;
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

    .btn-warning {
        background-color: #ffc107;
        color: white;
    }

    .btn-warning:hover {
        background-color: #e0a800;
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    /* Margin for buttons */
    .mb-3 {
        margin-bottom: 1rem;
    }

    /* Breadcrumb Styling */
    .breadcrumb {
        background-color: #f8f9fa;
    }

    /* Card Header Styling */
    .card-header {
        background-color: #f4f4f4;
    }

    /* Table border */
    table.table-bordered {
        border: 1px solid #ddd;
    }

    table.table-bordered th,
    table.table-bordered td {
        border: 1px solid #ddd;
    }
</style>
