<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Antrian Pasien</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
</head>
<body>
    <div class="container my-5">
        <h2 class="text-center mb-4">Tambah Antrian Pasien</h2>

        <?php
        include '../lib/koneksi.php';

        // Fungsi untuk mendapatkan nomor antrian terakhir
        function getNomorAntrianTerakhir($conn) {
            $sql = "SELECT nomor_antrian FROM tbantrian ORDER BY nomor_antrian DESC LIMIT 1";
            $stmt = $conn->query($sql);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ? $result['nomor_antrian'] : 0;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama_pasien = $_POST['nama_pasien'];
            $waktu_kedatangan = $_POST['waktu_kedatangan'];

            // Ambil nomor antrian terakhir dan tambahkan 1
            $nomor_antrian = getNomorAntrianTerakhir($conn) + 1;

            $sql = "INSERT INTO tbantrian (nama_pasien, nomor_antrian, waktu_kedatangan) VALUES (:nama_pasien, :nomor_antrian, :waktu_kedatangan)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nama_pasien', $nama_pasien);
            $stmt->bindParam(':nomor_antrian', $nomor_antrian);
            $stmt->bindParam(':waktu_kedatangan', $waktu_kedatangan);

            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Data antrian berhasil ditambahkan! Nomor Antrian: $nomor_antrian</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: Gagal menambahkan data.</div>";
            }
        }
        ?>

        <!-- Form Tambah Antrian -->
        <form method="POST" action="tambah_antrian.php">
            <div class="form-group">
                <label for="nama_pasien">Nama Pasien</label>
                <input type="text" name="nama_pasien" id="nama_pasien" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="waktu_kedatangan">Waktu Kedatangan</label>
                <input type="datetime-local" name="waktu_kedatangan" id="waktu_kedatangan" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success btn-block">Tambah Antrian</button>
        </form>

        <!-- Tombol Kembali ke Halaman Utama -->
        <div class="btn-container">
            <a href="../index.php" class="btn btn-back btn-lg">
                <i class="fas fa-arrow-left"></i> Kembali ke Halaman Utama
            </a>
        </div>
    </div>
</body>
</html>
