<?php
if (isset($_POST['nama_pelanggan'])) {
    $nama = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $no = $_POST['no_telepon'];

    // Ensure the SQL query is correct
    $query = mysqli_query($koneksi, "INSERT INTO pelanggan(nama_pelanggan, alamat, no_telepon) VALUES('$nama','$alamat','$no')");

    if ($query) {
        echo '<script>alert("Tambah data berhasil"); location.href="?page=pelanggan"</script>';
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
        background-color: #f9f9f9;
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
    <h1>Pelanggan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pelanggan</li>
    </ol>
   
    <hr>

    <form method="post">
        <table class="table table-borderless">
            <tr>
                <td>Nama Pelanggan</td>
                <td>:</td>
                <td><input class="form-control" type="text" name="nama_pelanggan"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><textarea name="alamat" rows="5" class="form-control"></textarea></td>
            </tr>
            <tr>
                <td>No Telepon</td>
                <td>:</td>
                <td><input class="form-control" type="number" step="0" name="no_telepon"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                <a href="?page=pelanggan" class="btn btn-primary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </td>
            </tr>
        </table>
    </form>
</div>
