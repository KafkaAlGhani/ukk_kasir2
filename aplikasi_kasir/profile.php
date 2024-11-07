<?php
require_once "koneksi.php";
$id_user = $_SESSION['id_user'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Aplikasi Kasir</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .container-fluid {
            max-width: 600px;
            margin: auto;
            padding: 2rem;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #343a40;
        }

        table.table {
            width: 100%;
            margin-top: 1rem;
            border-collapse: collapse;
        }

        table.table th,
        table.table td {
            padding: 1rem;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            font-weight: bold;
            color: #495057;
        }

        .btn-success {
            background-color: #28a745;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<br><br><br><br>

<body>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Update Profile</h1>

        <table class="table table-border">
            <?php
            $select = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = $id_user");
            $data = mysqli_fetch_assoc($select);

            if (mysqli_num_rows($select) > 0) {
                ?>
                <tr>
                    <th>Nama:</th>
                    <td><?php echo $data['nama']; ?></td>
                </tr>
                <tr>
                    <th>Username:</th>
                    <td><?php echo $data['username']; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>

        <center>
            <a href="?page=update_profile_admin" class="btn btn-primary">Update Profile?</a>
            <a href="index.php" class="btn btn-danger">Kembali</a>
        </center>
    </div>
</body>

</html>