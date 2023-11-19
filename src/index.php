<?php
session_start();

// Fungsi untuk mengecek apakah pengguna sudah login
function isUserLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Jika pengguna sudah login, arahkan ke halaman home
if (isUserLoggedIn()) {
    header('Location: home.php');
    exit();
}

// Fungsi untuk melakukan login
function login($username, $password) {
    // Gantilah dengan logika autentikasi sesuai kebutuhan Anda
    // Contoh sederhana: jika username = 'admin' dan password = 'password'
    if ($username === 'admin' && $password === 'password') {
        $_SESSION['user_id'] = 1; // Simpan ID pengguna ke sesi
        return true;
    } else {
        return false;
    }
}

// Fungsi untuk logout
function logout() {
    unset($_SESSION['user_id']);
    // Atau menggunakan session_unset();
    // session_unset();
}

// Contoh penggunaan tombol logout
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    logout();
    header('Location: index.php'); // Sesuaikan dengan halaman login Anda
    exit();
}

// Contoh penggunaan untuk mengecek status login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Melakukan login
    if (login($username, $password)) {
        $pesan = 'Login berhasil!';
        echo "<script>alert('$pesan');</script>";

        // Redirect ke halaman setelah login
        header('Location: home.php');
        exit();
    } else {
        $pesan = 'Login gagal. Coba lagi.';
        echo "<script>alert('$pesan');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        .head{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        img {
            max-width: 70px;
            max-height: 70px;
            margin-bottom: 20px;
            border-radius: 50%;
        }

        span{
            font-size: 30px;
            font-family: bold;
            padding-bottom: 20px;
            padding-left: 10px;
        }

        form {
            width: 200px;
            margin: 10px;
            background-color: #fff;
            padding: 45px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #7986CB;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #C5CAE9;
        }
    </style>
</head>

<body>

<div class="head">
    <img src="/login/logo.jpg" alt="Logo">
    <span>KUCING TECH</span>

</div>

    <form method="post" action="" onsubmit="return validateForm()">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Login">
    </form>

    <script>
        function validateForm() {
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;

            // Periksa apakah kedua kolom username dan password diisi
            if (username.trim() === '' || password.trim() === '') {
                alert('Username dan password harus diisi.');
                return false; // Mencegah pengiriman formulir jika tidak valid
            }

            // Mengembalikan true untuk mengizinkan pengiriman formulir
            return true;
        }
    </script>


</body>

</html>
