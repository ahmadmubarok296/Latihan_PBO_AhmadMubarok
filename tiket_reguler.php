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

    public function hitungTotalHarga() {
        return $this->jumlah_kursi * $this->hargaDasarTiket;
    }

    public function tampilkanInfoFasilitas() {
        return "Fasilitas Reguler: Audio {$this->tipeAudio}, Baris {$this->lokasiBaris}.";
    }
}

?>