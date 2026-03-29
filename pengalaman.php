<?php
require_once 'koneksi.php';

class Pengalaman {
    private $conn;
    private $table = 'pengalaman';

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAll() {
        $result = mysqli_query($this->conn, "SELECT * FROM {$this->table} ORDER BY id ASC");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}