<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT*FROM penjualan LEFT JOIN pelanggan on pelanggan.id_pelanggan=penjualan.id_pelanggan WHERE id_penjualan=$id");
$data = mysqli_fetch_array($query);

?>
<br><br>
<div class="container-fluid px-4">
    <h1 class="mt-4">Detail Penjualan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Detail Penjualan</li>
    </ol>
    <a href="?page=pembelian" class="btn btn-primary">Kembali</a>
    <hr>

    <form method="post">
        <table class="table table-border">
            <tr>
                <td width="200">Nama Pelanggan</td>
                <td width="1">:</td>
                <td>
                    <?php echo $data['nama_pelanggan']; ?>

                </td>
            </tr>
            <?php
            $pro = mysqli_query($koneksi, "SELECT*FROM detail_penjualan LEFT JOIN produk on produk.id_produk=detail_penjualan.id_produk WHERE id_penjualan=$id");
            while ($produk = mysqli_fetch_array($pro)) {
                ?>
                <tr>
                    <td><?php echo $produk['nama_produk']; ?></td>
                    <td>:</td>
                    <td>
                        Harga : <?php echo $produk['harga']; ?><br>
                        Jumlah : <?php echo $produk['jumlah_produk']; ?><br>
                        Sub Total : <?php echo $produk['subtotal']; ?><br>
                    </td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <td>Total</td>
                <td>:</td>
                <td>
                    <?php echo $data['total_harga']; ?>
                </td>
            </tr>
        </table>

    </form>

</div>