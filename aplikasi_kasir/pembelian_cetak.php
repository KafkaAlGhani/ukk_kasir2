<?php
// Pastikan koneksi ke database sudah disiapkan
require_once 'koneksi.php';

// Ambil nilai tanggal dari URL, dan gunakan tanggal saat ini sebagai default jika tidak disediakan
$dari_tgl = isset($_GET['awal']) ? $_GET['awal'] : date('Y-m-d');
$sampai_tgl = isset($_GET['akhir']) ? $_GET['akhir'] : date('Y-m-d');

// Tampilkan informasi rentang tanggal
echo "<div class='container mt-4'>";
echo "<h3>Data Penjualan</h3>";
echo "<p><strong>Dari Tanggal:</strong> " . $dari_tgl . "</p>";
echo "<p><strong>Sampai Tanggal:</strong> " . $sampai_tgl . "</p>";

// Query database berdasarkan tanggal filter
$query = mysqli_query($koneksi, "SELECT * FROM penjualan 
                                  LEFT JOIN pelanggan ON pelanggan.id_pelanggan = penjualan.id_pelanggan 
                                  WHERE tanggal_penjualan BETWEEN '$dari_tgl' AND '$sampai_tgl' 
                                  ORDER BY tanggal_penjualan DESC");

// Cek jika ada data
if (mysqli_num_rows($query) == 0) {
    echo "<p>Tidak ada data untuk rentang tanggal ini.</p>";
} else {
    echo '<table class="table table-striped table-bordered mt-4">';
    echo '<thead>
              <tr>
                  <th>No</th>
                  <th>Tanggal Penjualan</th>
                  <th>Pelanggan</th>
                  <th>Total Harga</th>
              </tr>
          </thead>
          <tbody>';

    $no = 1;
    while ($data = mysqli_fetch_array($query)) {
        echo "<tr>
                <th scope='row'>{$no}</th>
                <td>{$data['tanggal_penjualan']}</td>
                <td>{$data['nama_pelanggan']}</td>
                <td>Rp " . number_format($data['total_harga'], 0, ',', '.') . "</td>
              </tr>";
        $no++;
    }
    echo '</tbody></table>';
}

// Tambahkan script cetak otomatis
echo '<script>window.print()</script>';
echo "</div>";
?>

<style>
    /* General styling */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 80%;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h3 {
        color: #333;
        text-align: center;
    }

    p {
        font-size: 16px;
        margin: 10px 0;
        color: #555;
    }

    /* Table styling */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 12px 15px;
        text-align: center;
    }

    th {
        background-color: #007bff;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    /* Print specific styles */
    @media print {
        body {
            font-size: 12pt;
        }

        .container {
            width: 100%;
            margin: 0;
            box-shadow: none;
        }

        table {
            width: 100%;
            border: 1px solid #000;
        }

        th,
        td {
            font-size: 12pt;
            border: 1px solid #000;
        }
    }
</style>