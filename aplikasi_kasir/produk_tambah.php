<?php
if (isset($_POST['nama_produk'])) {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Ensure the SQL query is correct
    $query = mysqli_query($koneksi, "INSERT INTO produk(nama_produk, harga, stok) VALUES('$nama','$harga','$stok')");

    if ($query) {
        echo '<script>alert("Tambah data berhasil"); location.href="?page=produk"</script>';
    } else {
        echo '<script>alert("Tambah data gagal: ' . mysqli_error($koneksi) . '");</script>';
    }
}
?>

<style>
    .container-fluid {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f4f6f8;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    h1 {
        text-align: center;
        color: #333;
    }
    .breadcrumb {
        background-color: #e9ecef;
        padding: 10px;
        border-radius: 5px;
    }
    .table {
        width: 100%;
        margin-top: 20px;
    }
    .table td {
        padding: 10px;
        vertical-align: middle;
    }
    .form-control {
        width: 100%;
        padding: 8px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }
    .btn-primary, .btn-danger {
        padding: 10px 20px;
        border-radius: 4px;
        margin-top: 10px;
    }
    .btn-primary {
        background-color: #007bff;
        border: none;
    }
    .btn-danger {
        background-color: #dc3545;
        border: none;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
    .btn-danger:hover {
        background-color: #c82333;
    }
</style>
<br><br>
<div class="container-fluid">
    <h1>Produk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Produk</li>
    </ol>
    <a href="?page=produk" class="btn btn-primary">Kembali</a>
    <hr>

    <form method="post">
        <table class="table table-borderless">
            <tr>
                <td>Nama Produk</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="nama_produk"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>:</td>
                <td><input class="form-control" type="number" step="0" name="harga"></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td>:</td>
                <td><input class="form-control" type="number" step="0" name="stok"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </td>
            </tr>
        </table>
    </form>
</div>
