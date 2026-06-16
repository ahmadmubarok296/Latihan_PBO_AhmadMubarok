<?php

abstract class Tiket {
    // Properti/atribut terenkapsulasi (protected)
    // Sesuai dengan kolom tabel_tiket
    protected $id_tiket;
    protected $nama_film;
    protected $jadwal_tayang;
    protected $jumlah_kursi;
    protected $hargaDasarTiket;

    // Constructor untuk inisialisasi properti
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket) {
        $this->id_tiket = $id_tiket;
        $this->nama_film = $nama_film;
        $this->jadwal_tayang = $jadwal_tayang;
        $this->jumlah_kursi = $jumlah_kursi;
        $this->hargaDasarTiket = $hargaDasarTiket;
    }

    // Metode abstrak: Wajib diimplementasikan oleh kelas turunan
    abstract public function hitungTotalHarga();
    abstract public function tampilkanInfoFasilitas();

    // Getter (Opsional, untuk mengakses properti protected dari luar)
    public function getNamaFilm() {
        return $this->nama_film;
    }
}
?>