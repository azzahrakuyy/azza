<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Aplikasi Antrian Rumah Sakit</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }
        .footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
        }
        .footer a {
            color: #adb5bd;
            text-decoration: none;
        }
        .footer a:hover {
            color: #ffffff;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand"><i class="fas fa-hospital-alt"></i> Antrian Rumah Sakit</a>
            <div class="ml-auto">
        <a href="logout.php" class="btn btn-danger">Logout</a></div>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container my-5">
        <div class="text-center mb-5">
            <h2 class="display-4">Selamat Datang di Aplikasi Antrian Rumah Sakit</h2>
            <p class="lead">Mengelola antrian pasien dengan mudah dan efisien</p>
        </div>

        <div class="row text-center">
            <!-- Card Daftar Antrian -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-list-alt fa-3x text-primary mb-3"></i>
                        <h5 class="card-title">Daftar Antrian</h5>
                        <p class="card-text">Lihat daftar antrian pasien yang sedang menunggu.</p>
                        <a href="modul/daftar_antrian.php" class="btn btn-primary">Lihat <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Card Tambah Antrian -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-user-plus fa-3x text-success mb-3"></i>
                        <h5 class="card-title">Tambah Antrian</h5>
                        <p class="card-text">Tambahkan pasien baru ke dalam antrian.</p>
                        <a href="modul/tambah_antrian.php" class="btn btn-success">Tambah <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Card Ubah Status -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-edit fa-3x text-warning mb-3"></i>
                        <h5 class="card-title">Ubah Status</h5>
                        <p class="card-text">Ubah status pasien dalam antrian.</p>
                        <a href="modul/ubah_hapus_antrian.php" class="btn btn-warning">Ubah <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container text-center">
            <p>&copy; 2024 Antrian Rumah Sakit. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
</body>
</html>
