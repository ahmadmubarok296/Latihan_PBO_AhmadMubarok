<?php

require_once 'Tiket.php';

// 1. Subclass TiketReguler
class TiketReguler extends Tiket {
    private $tipeAudio;
    private $lokasiBaris;

    public function __construct($id, $film, $jadwal, $jumlah, $harga, $audio, $baris) {
        parent::__construct($id, $film, $jadwal, $jumlah, $harga);
        $this->tipeAudio = $audio;
        $this->lokasiBaris = $baris;
    }

    public static function selectById($conn, $id) {
        $stmt = $conn->prepare("SELECT * FROM tabel_tiket WHERE id_tiket = ? AND jenis_studio = 'Reguler'");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result()->fetch_assoc();
        if ($res) {
            return new self($res['id_tiket'], $res['nama_film'], $res['jadwal_tayang'], 
                            $res['jumlah_kursi'], $res['harga_dasar_tiket'], 
                            $res['tipe_audio'], $res['lokasi_baris']);
        }
        return null;
    }

    // Override: Tarif standar murni
    public function hitungTotalHarga() {
        return $this->jumlah_kursi * $this->hargaDasarTiket;
    }

    public function tampilkanInfoFasilitas() {
        return "Fasilitas Reguler: Audio {$this->tipeAudio}, Baris {$this->lokasiBaris}.";
    }
}
?>