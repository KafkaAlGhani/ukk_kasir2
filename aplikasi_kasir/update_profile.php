<?php
require_once "koneksi.php";
$id_user = $_SESSION['id_user'];

if (isset($_POST['update_profile'])) {
    $update_name = mysqli_real_escape_string($koneksi, $_POST['update_name']);
    $update_username = mysqli_real_escape_string($koneksi, $_POST['update_username']);

    mysqli_query($koneksi, "UPDATE user SET nama = '$update_name', username = '$update_username' WHERE id_user='$id_user'") or die('query failed');

    $old_pass = $_POST['old_pass'];
    $update_pass = mysqli_real_escape_string($koneksi, md5($_POST['update_pass']));
    $new_pass = mysqli_real_escape_string($koneksi, md5($_POST['new_pass']));
    $confirm_pass = mysqli_real_escape_string($koneksi, md5($_POST['confirm_pass']));
    if (empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)) {
        if ($update_pass != $old_pass) {
            echo '<script>alert("ubah data gagal: ' . mysqli_error($koneksi) . '");</script>';
        } elseif ($new_pass != $confirm_pass) {
            echo '<script>alert("ubah data gagal: ' . mysqli_error($koneksi) . '");</script>';
        } else {
            mysqli_query($koneksi, "UPDATE user SET password = '$confirm_pass' WHERE id_user='$id_user'") or die('query failed');
            echo '<script>alert("Ubah data berhasil"); location.href="?page=update_profile"</script>';


        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Update Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <div class="update-profile">
        <h1 class="mt-4">Profile</h1>
        <?php
        $select = mysqli_query($koneksi, query: "SELECT * FROM user WHERE id_user = $id_user");
        $data = mysqli_fetch_assoc(result: $select);

        if (mysqli_num_rows($select) > 0) {
            $fetch = mysqli_fetch_assoc($select);
        }

        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="flex">
                <span>Nama :</span>
                <input type="text" name="update_name" value="<?php echo $data['nama'] ?>">
                <span>Username :</span>
                <input type="text" name="update_username" value="<?php echo $data['username'] ?>">
            </div>
            <div>
                <input type="hidden" name="old_pass" value="<?php echo $data['password'] ?>">
                <span>Old Password :</span>
                <input type="password" name="update_pass" placeholder="enter previous password">

                <span>New Password :</span>
                <input type="password" name="new_pass" placeholder="enter new password">

                <span>Confirm Password :</span>
                <input type="password" name="confirm_pass" placeholder="confirm new password">
            </div>
            <br>
            <center>
                <input type="submit" value="update profile" name="update_profile" class="btn btn-success w-75">
                <br>
                <a href="?page=profile_petugas" class="btn btn-danger w-75">Kembali</a>
            </center>
    </div>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f0f2f5;
            padding: 20px;
        }

        .update-profile {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            margin-left: 0px;
        }

        .update-profile h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .update-profile form .flex {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .update-profile form .flex>div {
            flex: 1;
            min-width: 200px;
        }

        .update-profile span {
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 5px;
        }

        .update-profile input[type="text"],
        .update-profile input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .update-profile input[type="text"]:focus,
        .update-profile input[type="password"]:focus {
            border-color: #007bff;
        }

        .update-profile .btn {
            display: inline-block;
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            color: #fff;
            cursor: pointer;
        }

        .btn-success {
            background-color: #28a745;
        }

        .btn-danger {
            background-color: #dc3545;
            margin-top: 10px;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        /* Responsive Design */
        @media (max-width: 768px) {}

        .update-profile {
            padding: 15px;
        }

        .update-profile form .flex {
            flex-direction: column;
        }
    </style>
    </center>
    <br>
</body>

</html>