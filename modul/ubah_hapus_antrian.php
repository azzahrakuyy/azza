<?php
include '../lib/koneksi.php';

// Menangani form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['ubah_status'])) {
        // Mengubah status antrian
        $nomor_antrian = $_POST['nomor_antrian'];
        $status = $_POST['status'];
        $sql = "UPDATE tbantrian SET status = :status WHERE nomor_antrian = :nomor_antrian";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':nomor_antrian', $nomor_antrian);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Status antrian berhasil diubah!</div>";
        } else {
            echo "<div class='alert alert-danger'>Error: Gagal mengubah status.</div>";
        }
    }

    if (isset($_POST['hapus_antrian'])) {
        // Menghapus antrian
        $nomor_antrian = $_POST['nomor_antrian'];
        $sql = "DELETE FROM tbantrian WHERE nomor_antrian = :nomor_antrian";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nomor_antrian', $nomor_antrian);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Antrian berhasil dihapus!</div>";
        } else {
            echo "<div class='alert alert-danger'>Error: Gagal menghapus antrian.</div>";
        }
    }
}

// Mendapatkan daftar antrian yang ada
$sql = "SELECT * FROM tbantrian";
$stmt = $conn->query($sql);
$antrian = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah atau Hapus Antrian</title>
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
    <div class="container my-5">
        <h2 class="text-center mb-4">Ubah atau Hapus Antrian</h2>
        
        <!-- Form Ubah Status dan Hapus Antrian -->
        <form method="POST" action="ubah_hapus_antrian.php">
            <div class="form-group">
                <label for="nomor_antrian">Nomor Antrian</label>
                <select name="nomor_antrian" id="nomor_antrian" class="form-control" required>
                    <?php foreach ($antrian as $data): ?>
                        <option value="<?= $data['nomor_antrian'] ?>"><?= $data['nomor_antrian'] ?> - <?= htmlspecialchars($data['nama_pasien']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Menunggu">Menunggu</option>
                    <option value="Selesai">Selesai</option>
                    <option value="Tertunda">Tertunda</option>
                </select>
            </div>
            <button type="submit" name="ubah_status" class="btn btn-warning btn-block">Ubah Status</button>
        </form>

        <br>

        <form method="POST" action="ubah_hapus_antrian.php">
            <div class="form-group">
                <label for="nomor_antrian">Nomor Antrian (Hapus)</label>
                <select name="nomor_antrian" id="nomor_antrian" class="form-control" required>
                    <?php foreach ($antrian as $data): ?>
                        <option value="<?= $data['nomor_antrian'] ?>"><?= $data['nomor_antrian'] ?> - <?= htmlspecialchars($data['nama_pasien']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" name="hapus_antrian" class="btn btn-danger btn-block">Hapus Antrian</button>
        </form>
    </div>
     <!-- Tombol Kembali ke Halaman Utama -->
     <div class="btn-container">
            <a href="../index.php" class="btn btn-back btn-lg">
                <i class="fas fa-arrow-left"></i> Kembali ke Halaman Utama
            </a>
        </div>
    </div>
</body>
</html>
