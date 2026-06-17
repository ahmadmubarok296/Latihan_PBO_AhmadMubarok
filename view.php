<?php
// 1. Load file database dan class terlebih dahulu
require_once __DIR__ . '/database.php';
require_once __DIR__ . '/Tiket.php';
require_once __DIR__ . '/tiket_reguler.php';
require_once __DIR__ . '/tiket_imax.php';
require_once __DIR__ . '/tiket_velvet.php';

// 2. Inisialisasi Database
$db = new Database();
$conn = $db->conn;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Tiket Bioskop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card { transition: 0.3s; }
        .card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
        .header-reguler { border-top: 5px solid #6c757d; }
        .header-imax { border-top: 5px solid #0d6efd; }
        .header-velvet { border-top: 5px solid #ffc107; }
    </style>
</head>
<body class="bg-light">
<div class="container py-5">
    <h2 class="text-center mb-5">Daftar Tiket Film</h2>
    
    <div class="row">
        <?php
        $query = "SELECT * FROM tabel_tiket";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Polimorfisme: Instansiasi objek berdasarkan jenis studio
                $tiket = null;
                $headerClass = "";

                if ($row['jenis_studio'] == 'Reguler') {
                    $tiket = new TiketReguler($row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], $row['jumlah_kursi'], $row['harga_dasar_tiket'], $row['tipe_audio'], $row['lokasi_baris']);
                    $headerClass = "header-reguler";
                } elseif ($row['jenis_studio'] == 'IMAX') {
                    $tiket = new TiketIMAX($row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], $row['jumlah_kursi'], $row['harga_dasar_tiket'], $row['kacamata_3d_id'], $row['efek_gerak_fitur']);
                    $headerClass = "header-imax";
                } else {
                    $tiket = new TiketVelvet($row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], $row['jumlah_kursi'], $row['harga_dasar_tiket'], $row['bantal_selimut_pack'], $row['layanan_butler']);
                    $headerClass = "header-velvet";
                }
                ?>
                
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm <?php echo $headerClass; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nama_film']; ?></h5>
                            <span class="badge bg-secondary mb-2"><?php echo $row['jenis_studio']; ?></span>
                            <p class="small text-muted mb-0">Jadwal: <?php echo $row['jadwal_tayang']; ?></p>
                            <hr>
                            <p class="card-text"><?php echo $tiket->tampilkanInfoFasilitas(); ?></p>
                            <h5 class="text-primary mt-3">Rp <?php echo number_format($tiket->hitungTotalHarga(), 0, ',', '.'); ?></h5>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p class='text-center'>Belum ada data tiket.</p>";
        }
        ?>
    </div>
</div>
</body>
</html>