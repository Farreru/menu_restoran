<?php

if (session_status() == PHP_SESSION_NONE) {
    // Session has not started, so start it
    session_start();
}
include '../functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    // $role = $_POST['role']; // Ambil peran dari form

    // Ubah kueri SQL sesuai dengan peran yang dipilih
    $query = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['admin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $row['role'];
            $_SESSION['id_admin'] = $row['id'];

            // Periksa peran pengguna dan arahkan sesuai ke halaman yang sesuai
            if ($_SESSION['role'] == 'admin') {
                $redirect_url = 'index.php';
            } elseif ($_SESSION['role'] == 'user') {
                $redirect_url = '../user/index.php';
            }

            $script = "
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Login Berhasil!',
                            timer: 3000,
                            timerProgressBar: true,
                            showConfirmButton: false,
                            toast: true
                        });
                        setTimeout(function() {
                            window.location.href = '$redirect_url'; 
                        }, 3000);
                    ";
        } else {
            $script = "
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Password Salah!',
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                    toast: true
                });
            ";
        }
    } else {
        $script = "
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Username Tidak Ditemukan!',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false,
                toast: true
            });
        ";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $judul; ?> </title>
    <link rel="icon" href="../img/logo.png" type="image/x-icon">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="../vendor/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        body {
            display: flex;
            height: 100vh;
            background-color: #fff;
            margin: 0;
            font-family: 'Nunito', sans-serif;
        }

        .login-container {
            display: flex;
            width: 100%;
        }

        .form-container {
            width: 40%;
            padding: 40px;
            background-color: #c2ffa8;
            color: #000000;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        }

        .logo-title-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo-title-container img {
            margin-right: 15px;
        }


        .form-container h1 {
            margin-bottom: 20px;
        }

        .form-container input {
            background-color: #f8e7cf;
            border: none;
            padding: 10px 130px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .form-container button {
            background-color: #c2ffa8;
            color: #000000;
            border: 2px solid #043027;
            border-radius: 8px;
            padding: 10px 200px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s, border-color 0.3s;
        }

        .form-container button:hover {
            background-color: #f8e7cf;
            color: #043027;
            border-color: #043027;
        }

        .form-container button:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }


        .image-container {
            width: 60%;
            background: url('../img/cashier.jpg') no-repeat center center;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="form-container">
            <div class="logo-title-container">
                <img src="../img/kopi.png" alt="Kopi Logo" width="100"> <!-- Ukuran logo disesuaikan -->
                <h1 style="margin-left: -20px; font-weight: bold; margin-top: 60px;">Menu Restoran</h1>
            </div>
            <p>Welcome to our App</p>
            <br>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Username" required>
                <br>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <br>
                <button type="submit" name="login">Login</button>
            </form>
        </div>
        <div class="image-container"></div>
    </div>

    <?php include('plugin.php') ?>
    <script>
        <?php if (isset($script)) {
            echo $script;
        } ?>
    </script>
</body>

</html>