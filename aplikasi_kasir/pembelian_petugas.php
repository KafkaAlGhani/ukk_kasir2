<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjualan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom styling */
        .form-container {
            max-width: 700px;
            margin: auto;
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: black;
        }

        .btn-filter {
            margin-top: 30px;
        }

        .btn-add {
            margin: 10px 5px;
            padding: 8px 16px;
        }

        .action-btns a {
            margin-right: 5px;
        }

        /* Table hover effect */
        table tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <br><br>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Penjualan</h1>

        <div class="form-container">
            <form method="post">
                <div class="form-row align-items-center">
                    <div class="col">
                        <label for="dari_tgl">Dari Tanggal</label>
                        <input type="date" id="dari_tgl" name="dari_tgl" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="sampai_tgl">Sampai Tanggal</label>
                        <input type="date" id="sampai_tgl" name="sampai_tgl" class="form-control" required>
                    </div>
                    <div class="col">
                        <button type="submit" name="filter" class="btn btn-danger btn-filter">Filter</button>
                    </div>
                </div>
            </form>
        </div>

        <?php
        if (isset($_POST['filter'])) {
            $dari_tgl = mysqli_real_escape_string($koneksi, $_POST['dari_tgl']);
            $sampai_tgl = mysqli_real_escape_string($koneksi, $_POST['sampai_tgl']);
            echo "<p class='mt-3'>Dari tanggal: <strong>" . $dari_tgl . "</strong> Sampai tanggal: <strong>" . $sampai_tgl . "</strong></p>";
        }
        ?>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <a href="?page=pembelian_tambah" class="btn btn-primary btn-add">+ Tambah Penjualan</a>
        </div>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Penjualan</th>
                    <th>Pelanggan</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if (isset($_POST['filter'])) {
                    $query = mysqli_query($koneksi, "SELECT * FROM penjualan 
                                                 LEFT JOIN pelanggan ON pelanggan.id_pelanggan = penjualan.id_pelanggan 
                                                 WHERE tanggal_penjualan BETWEEN '$dari_tgl' AND '$sampai_tgl'");
                } else {
                    $query = mysqli_query($koneksi, "SELECT * FROM penjualan 
                                                 LEFT JOIN pelanggan ON pelanggan.id_pelanggan = penjualan.id_pelanggan");
                }

                while ($data = mysqli_fetch_array($query)) {
                    echo "<tr>
                        <td>" . $no++ . "</td>
                        <td>" . $data['tanggal_penjualan'] . "</td>
                        <td>" . $data['nama_pelanggan'] . "</td>
                        <td>" . $data['total_harga'] . "</td>
                        <td class='action-btns'>
                            <a href='?page=pembelian_detail&&id=" . $data['id_penjualan'] . "' class='btn btn-secondary btn-sm'>Detail</a>
                            <a href='?page=pembelian_hapus&&id=" . $data['id_penjualan'] . "' class='btn btn-danger btn-sm'>Hapus</a>
                        </td>
                      </tr>";
                }
                ?>
            </tbody>
        </table>
        <?php if (isset($sampai_tgl) && isset($sampai_tgl)): ?>
            <a href="pembelian_cetak.php?awal=<?php echo $dari_tgl; ?>&akhir=<?php echo $sampai_tgl; ?>" target="blank"
                class="btn btn-success mt-3">Cetak</a>
        <?php endif; ?>

    </div>

</body>

</html>