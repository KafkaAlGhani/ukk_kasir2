<?php


$id = $_GET['id'];

if (isset($_POST['nama'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    // Ensure the SQL query is correct
    $query = mysqli_query($koneksi, "UPDATE user set nama='$nama', username='$username', password=MD5('$password'), level='$level' WHERE id_user=$id");

    if ($query) {
        echo '<script>alert("Ubah data berhasil"); location.href="?page=user"</script>';
    } else {
        echo '<script>alert("ubah data gagal: ' . mysqli_error($koneksi) . '");</script>';
    }
}

$query = mysqli_query($koneksi, "SELECT*FROM user WHERE id_user=$id");
$data = mysqli_fetch_array($query);

?>
<br><br>
<div class="container-fluid px-4">
    <h1 class="mt-4">User</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">User</li>
    </ol>
    <a href="?page=user" class="btn btn-primary">Kembali</a>
    <hr>

    <form method="post">
        <table class="table table-border">
            <tr>
                <td width="200">Nama</td>
                <td width="1">:</td>
                <td><input class="form-control" value="<?php echo $data['nama']; ?>" type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input class="form-control" type="text" value="<?php echo $data['username']; ?>" name="username">
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input class="form-control" type="number" step="0" value="<?php echo $data['password']; ?>"
                        name="password"></td>
            </tr>
            <td>Level</td>
            <td>:</td>
            <td>
                <select class="form-control form-select" name="level">
                    <option value="admin" <?php echo ($data['level'] == 'admin') ? 'selected' : ''; ?>>admin</option>
                    <option value="petugas" <?php echo ($data['level'] == 'petugas') ? 'selected' : ''; ?>>petugas
                    </option>
                </select>
            </td>
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