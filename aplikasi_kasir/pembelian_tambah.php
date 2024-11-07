<?php
if (isset($_POST['id_pelanggan'])) {

    $id_pelanggan = $_POST['id_pelanggan'];
    $produk = $_POST['produk'];
    $total = 0;
    $tanggal = date('Y/m/d');

    // Start a transaction
    mysqli_begin_transaction($koneksi);

    try {
        // Prepare and execute the first query
        $stmt = $koneksi->prepare("INSERT INTO penjualan(tanggal_penjualan, id_pelanggan) VALUES(?, ?)");
        $stmt->bind_param("si", $tanggal, $id_pelanggan);

        if (!$stmt->execute()) {
            throw new Exception("Tambah data gagal: " . $stmt->error);
        }

        // Get the last inserted ID
        $id_penjualan = mysqli_insert_id($koneksi);

        // Prepare to insert detail penjualan
        foreach ($produk as $key => $val) {
            $pr_stmt = $koneksi->prepare("SELECT * FROM produk WHERE id_produk = ?");
            $pr_stmt->bind_param("i", $key);
            $pr_stmt->execute();
            $pr_result = $pr_stmt->get_result();

            if ($pr = $pr_result->fetch_assoc()) {
                $sub = $val * $pr['harga'];
                $total += $sub;

                // Update stock
                $updateProdukStmt = $koneksi->prepare("UPDATE produk SET stok = stok - ? WHERE id_produk = ?");
                $updateProdukStmt->bind_param("ii", $val, $key);
                if (!$updateProdukStmt->execute()) {
                    throw new Exception("Update stok gagal: " . $updateProdukStmt->error);
                }

                // Insert into detail penjualan
                $detail_stmt = $koneksi->prepare("INSERT INTO detail_penjualan(id_penjualan, id_produk, jumlah_produk, subtotal) VALUES(?, ?, ?, ?)");
                $detail_stmt->bind_param("iiid", $id_penjualan, $key, $val, $sub);
                if (!$detail_stmt->execute()) {
                    throw new Exception("Tambah detail penjualan gagal: " . $detail_stmt->error);
                }
            } else {
                throw new Exception("Produk tidak ditemukan: ID " . $key);
            }
        }

        // Update total harga
        $update_stmt = $koneksi->prepare("UPDATE penjualan SET total_harga = ? WHERE id_penjualan = ?");
        $update_stmt->bind_param("di", $total, $id_penjualan);

        if (!$update_stmt->execute()) {
            throw new Exception("Update total harga gagal: " . $update_stmt->error);
        }

        // Commit the transaction
        mysqli_commit($koneksi);
        echo '<script>alert("Tambah data berhasil"); location.href="?page=pembelian";</script>';
    } catch (Exception $e) {
        mysqli_rollback($koneksi);
        echo '<script>alert("Tambah data gagal: ' . htmlspecialchars($e->getMessage()) . '");</script>';
    }

    // Close statements
    $stmt->close();
    $update_stmt->close();
    $detail_stmt->close();
    $pr_stmt->close();
}
?>
<br><br>
<div class="container-fluid px-4">
    <h1 class="mt-4">Penjualan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Penjualan</li>
    </ol>
    <a href="?page=pembelian" class="btn btn-primary">Kembali</a>
    <hr>

    <form method="post">
        <table class="table table-border">
            <tr>
                <td width="200">Nama Pelanggan</td>
                <td width="1">:</td>
                <td>
                    <select class="form-control form-select" name="id_pelanggan">
                        <?php
                        $p = mysqli_query($koneksi, "SELECT*FROM pelanggan");
                        while ($pel = mysqli_fetch_array($p)) {
                            ?>
                            <option value="<?php echo $pel['id_pelanggan']; ?>"><?php echo $pel['nama_pelanggan']; ?></option>
                            <?php
                        }

                        ?>

                    </select>

                </td>
            </tr>
            <?php
            $pro = mysqli_query($koneksi, "SELECT*FROM produk");
            while ($produk = mysqli_fetch_array($pro)) {
                ?>
                <tr>
                    <td><?php echo $produk['nama_produk'] . '(Stock : ' . $produk['stok'] . ')'; ?></td>
                    <td>:</td>
                    <td><input class="form-control" type="number" step="0" value="0" max="<?php echo $produk['stok']; ?>"
                            name="produk[<?php echo $produk['id_produk']; ?>]"></td>
                </tr>
            <?php
            }
            ?>
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