<?php

require_once 'Tiket.php';

// 2. Subclass TiketIMAX
class TiketIMAX extends Tiket {
    private $kacamata3dId;
    private $efekGerakFitur;

    public function __construct($id, $film, $jadwal, $jumlah, $harga, $kacamata, $efek) {
        parent::__construct($id, $film, $jadwal, $jumlah, $harga);
        $this->kacamata3dId = $kacamata;
        $this->efekGerakFitur = $efek;
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

    // Override: Tambahan flat Rp 35.000
    public function hitungTotalHarga() {
        return ($this->jumlah_kursi * $this->hargaDasarTiket) + 35000;
    }

    public function tampilkanInfoFasilitas() {
        return "Fasilitas IMAX: Kacamata ID {$this->kacamata3dId}, Fitur Gerak: {$this->efekGerakFitur}.";
    }
}

?>