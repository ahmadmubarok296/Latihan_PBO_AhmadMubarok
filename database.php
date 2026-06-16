<?php

class Database {
    // Properti untuk koneksi
    private $host = "localhost";
    private $username = "root"; // Sesuaikan dengan username database Anda
    private $password = "";     // Sesuaikan dengan password database Anda
    private $database = "db_latihan_pbo_ti1c_ahmadmubarok";
    public $conn;

    // Constructor untuk menginisialisasi koneksi secara otomatis saat objek dibuat
    public function __construct() {
        $this->connect();
    }

    // Metode untuk melakukan koneksi
    private function connect() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        // Cek koneksi
        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        } else {
            echo "<h1>Koneksi Sukses Anda Berhasil Terhubung Ke Database</h1>";
        }
    }

    // Metode untuk menutup koneksi jika diperlukan
    public function __destruct() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}

// Cara menggunakan:
// Cukup instansiasi kelas ini, koneksi akan otomatis dibuat
$db = new Database();

?>