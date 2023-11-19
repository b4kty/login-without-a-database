<?php
session_start();

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

// Fungsi untuk mengecek apakah pengguna sudah login
function isUserLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Jika pengguna belum login, arahkan ke halaman login
if (!isUserLoggedIn()) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
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

        h1 {
            color: #333;
        }

        p {
            color: #666;
            max-width: 400px;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <h1>Selamat datang di halaman Home</h1>

    <p>Anda sedang login ke halaman <strong>index.php</strong>.</p>

    <!-- Tombol Logout -->
    <form method="get" action="">
        <input type="hidden" name="action" value="logout">
        <input type="submit" value="Logout">
    </form>

</body>

</html>
