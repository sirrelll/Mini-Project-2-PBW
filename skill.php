<?php
require_once 'koneksi.php';

class Skill {
    private $conn;
    private $table = 'skills';

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAll() {
        $result = mysqli_query($this->conn, "SELECT * FROM {$this->table} ORDER BY id ASC");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}