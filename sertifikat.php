<?php
require_once 'koneksi.php';

class Sertifikat {
    private $conn;
    private $table = 'sertifikat';

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAll() {
        $result = mysqli_query($this->conn, "SELECT * FROM {$this->table} ORDER BY id ASC");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}