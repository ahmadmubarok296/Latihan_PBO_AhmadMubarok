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

    public function hitungTotalHarga() {
        // IMAX biasanya ada biaya tambahan 20%
        return ($this->jumlah_kursi * $this->hargaDasarTiket) * 1.2;
    }

    public function tampilkanInfoFasilitas() {
        return "Fasilitas IMAX: Kacamata ID {$this->kacamata3dId}, Fitur Gerak: {$this->efekGerakFitur}.";
    }
}

?>