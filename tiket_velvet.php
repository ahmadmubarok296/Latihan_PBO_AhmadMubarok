<?php

require_once 'Tiket.php';

// 3. Subclass TiketVelvet
class TiketVelvet extends Tiket {
    private $bantalSelimutPack;
    private $layananButler;

    public function __construct($id, $film, $jadwal, $jumlah, $harga, $pack, $butler) {
        parent::__construct($id, $film, $jadwal, $jumlah, $harga);
        $this->bantalSelimutPack = $pack; // Boolean
        $this->layananButler = $butler;   // Boolean
    }

    public function hitungTotalHarga() {
        // Velvet ada biaya tambahan flat untuk pelayanan
        return ($this->jumlah_kursi * $this->hargaDasarTiket) + 50000;
    }

    public function tampilkanInfoFasilitas() {
        $butler = $this->layananButler ? "Tersedia" : "Tidak Tersedia";
        return "Fasilitas Velvet: Bantal & Selimut (" . ($this->bantalSelimutPack ? "Ya" : "Tidak") . "), Butler: $butler.";
    }
}

?>