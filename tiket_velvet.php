<?php

require_once 'Tiket.php';

// 3. Subclass TiketVelvet
class TiketVelvet extends Tiket {
    private $bantalSelimutPack;
    private $layananButler;

    public function __construct($id, $film, $jadwal, $jumlah, $harga, $pack, $butler) {
        parent::__construct($id, $film, $jadwal, $jumlah, $harga);
        $this->bantalSelimutPack = $pack;
        $this->layananButler = $butler;
    }

    public static function selectById($conn, $id) {
        $stmt = $conn->prepare("SELECT * FROM tabel_tiket WHERE id_tiket = ? AND jenis_studio = 'IMAX'");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result()->fetch_assoc();
        if ($res) {
            return new self($res['id_tiket'], $res['nama_film'], $res['jadwal_tayang'], 
                            $res['jumlah_kursi'], $res['harga_dasar_tiket'], 
                            $res['kacamata_3d_id'], $res['efek_gerak_fitur']);
        }
        return null;
    }

    // Override: Surcharge 50% (x 1.50)
    public function hitungTotalHarga() {
        return ($this->jumlah_kursi * $this->hargaDasarTiket) * 1.50;
    }

    public function tampilkanInfoFasilitas() {
        $statusButler = $this->layananButler ? "Aktif" : "Tidak Aktif";
        $statusPack = $this->bantalSelimutPack ? "Disediakan" : "Tidak Disediakan";
        return "Fasilitas Velvet: Bantal & Selimut ($statusPack), Butler: $statusButler.";
    }
}

?>