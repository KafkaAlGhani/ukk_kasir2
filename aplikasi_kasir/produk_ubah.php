<?php
$id = $_GET['id'];

if (isset($_POST['nama_produk'])) {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    // Ensure the SQL query is correct
    $query = mysqli_query($koneksi, "UPDATE produk set nama_produk='$nama', harga='$harga', stok='$stok' WHERE id_produk=$id");

    if ($query) {
        echo '<script>alert("Ubah data berhasil"); location.href="?page=produk"</script>';
    } else {
        echo '<script>alert("ubah data gagal: ' . mysqli_error($koneksi) . '");</script>';
    }
}

$query = mysqli_query($koneksi, "SELECT*FROM produk WHERE id_produk=$id");
$data = mysqli_fetch_array($query);

?>
<br><br>
<div class="container-fluid px-4">
    <h1 class="mt-4">Produk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Produk</li>
    </ol>
    <a href="?page=produk" class="btn btn-primary">Kembali</a>
    <hr>

    <form method="post">
        <table class="table table-border">
            <tr>
                <td width="200">Nama Produk</td>
                <td width="1">:</td>
                <td><input class="form-control" value="<?php echo $data['nama_produk']; ?>" type="text"
                        name="nama_produk"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>:</td>
                <td><input class="form-control" type="number" value="<?php echo $data['harga']; ?>" step="0"
                        name="harga"></td>
            </tr>
            <tr>
                <td>Stock</td>
                <td>:</td>
                <td><input class="form-control" type="number" step="0" value="<?php echo $data['stok']; ?>" name="stok">
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-danger">reset</button>
                </td>
            </tr>
        </table>

    </form>

</div>