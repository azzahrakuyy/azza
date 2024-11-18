<?php
include '../lib/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM antrian WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Data pasien berhasil dihapus!</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: Gagal menghapus data.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Antrian</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<style>
        .btn-back {
            background-color: #6c757d;
            color: #fff;
        }
        .btn-back:hover {
            background-color: #5a6268;
            color: #fff;
        }
        .btn-container {
            margin-top: 30px;
            text-align: center;
        }
</style>
    <div class="container my-5 text-center">
        <h2>Data pasien berhasil dihapus</h2>
        <a href="daftar_antrian.php" class="btn btn-primary mt-3">Kembali ke Daftar Antrian</a>
    </div>
    <div class="btn-container">
            <a href="../index.php" class="btn btn-back btn-lg">
                <i class="fas fa-arrow-left"></i> Kembali ke Halaman Utama
            </a>
        </div>
    </div>
</body>
</html>
