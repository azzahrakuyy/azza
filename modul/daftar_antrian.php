<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Antrian Pasien</title>
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
        <h2 class="text-center mb-4">Daftar Antrian Pasien</h2>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Nomor Antrian</th>
                        <th>Waktu Kedatangan</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../lib/koneksi.php';
                    $sql = "SELECT * FROM tbantrian ORDER BY nomor_antrian";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $antrian = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if (count($antrian) > 0) {
                        $no = 1;
                        foreach ($antrian as $row) {
                            echo "<tr>
                                <td>".$no."</td>
                                <td>".$row["nama_pasien"]."</td>
                                <td>".$row["nomor_antrian"]."</td>
                                <td>".$row["waktu_kedatangan"]."</td>
                                <td>".$row["status"]."</td>
                            </tr>";
                            $no++;
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>Tidak ada antrian.</td></tr>";
                    }

                    $conn = null;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="btn-container">
            <a href="../index.php" class="btn btn-back btn-lg">
                <i class="fas fa-arrow-left"></i> Kembali ke Halaman Utama
            </a>
        </div>
    </div>
</body>
</html>
