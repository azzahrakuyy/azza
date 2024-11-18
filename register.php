<?php
session_start();
include 'lib/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


    // Memeriksa apakah username sudah digunakan
    $sql = "SELECT * FROM tbuser WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $error = "Username sudah digunakan. Silakan pilih username lain.";
    } else {
        // Menambahkan akun baru ke database
        $sql = "INSERT INTO tbuser (username, password) VALUES (:username, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            $_SESSION['user_id'] = $conn->lastInsertId();
            header("Location: login.php");
            exit();
        } else {
            $error = "Terjadi kesalahan saat mendaftarkan akun.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Aplikasi Antrian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f9fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .register-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        .register-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .btn-register {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff; /* Warna tulisan menjadi putih */
        width: 100%;
    }
    .btn-register:hover {
        background-color: #0056b3;
        border-color: #0056b3;
        color: #fff; /* Warna tulisan tetap putih saat hover */
    }
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #007bff;
        }
        .login-link {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2 class="register-header">Buat Akun Baru</h2>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger text-center">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
            </div>
            <button type="submit" class="btn btn-register">Daftar</button>
        </form>

        <div class="login-link">
            <p>Sudah punya akun? <a href="login.php">Masuk di sini</a></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
