# Portfolio Website - Darel Prasetya Fawwaz

Website portofolio pribadi yang dibuat sebagai tugas Praktikum Pemrograman Berbasis Web. Data ditampilkan secara dinamis menggunakan PHP dan MySQL.

---

## Teknologi yang Digunakan

| Teknologi | Kegunaan |
|---|---|
| PHP | Mengambil dan menampilkan data dari database |
| MySQL | Menyimpan data skill, pengalaman, dan sertifikat |
| Bootstrap 5 | Navbar, grid system, card, button |
| Bootstrap Icons | Ikon-ikon pada tampilan |

---

## Struktur File

```
minpro2/
├── index.php         # Halaman utama
├── koneksi.php       # Koneksi database
├── Skill.php         # Class untuk data skill
├── Pengalaman.php    # Class untuk data pengalaman
├── Sertifikat.php    # Class untuk data sertifikat
├── style.css         # Styling tampilan
├── database.sql      # Script pembuatan tabel dan data
└── ...               # File gambar
```

---

## Tampilan Setiap Section

### Navbar
Navbar ada di bagian paling atas halaman. Isinya nama dan tiga link buat pindah ke section Home, About Me, dan Certificates.
<img width="1904" height="62" alt="Screenshot 2026-03-29 112614" src="https://github.com/user-attachments/assets/80cbb7df-aafe-40ed-9ccd-f75b484d87c6" />

---

### Section Home
Bagian pertama yang muncul waktu buka website. Sebelah kiri ada nama, prodi, deskripsi singkat, dan dua tombol. Sebelah kanan ada foto profil yang dibuat bulat.
<img width="1904" height="942" alt="Screenshot 2026-03-29 112620" src="https://github.com/user-attachments/assets/23c9a693-9413-4115-9baf-eb71b4e42d73" />

---

### Section About Me
Ada tiga bagian di sini. Kartu Info Diri berisi bio singkat sama info kontak. Kartu Skill menampilkan progress bar. Terus ada bagian Pengalaman yang isinya kartu-kartu pengalaman organisasi.
<img width="1904" height="762" alt="Screenshot 2026-03-29 112629" src="https://github.com/user-attachments/assets/db2b85b9-b138-49e8-9c84-9bb46dea1814" />

---

### Section Certificates
Menampilkan daftar sertifikat dalam bentuk grid tiga kolom. Tiap kartu ada gambar sertifikat, judul, penerbit, sama tanggal atau tahun.
<img width="1902" height="880" alt="Screenshot 2026-03-29 112635" src="https://github.com/user-attachments/assets/76ec8e3b-bcbf-442d-9b11-f4044e845e24" />

---

### Footer
Bagian paling bawah. Isinya nama dan tulisan singkat.
<img width="1898" height="93" alt="Screenshot 2026-03-29 112647" src="https://github.com/user-attachments/assets/1d8b5b8a-a427-4f46-b261-1db4567b0c77" />

---

## Penjelasan Code Setiap Section

### Koneksi Database
Koneksi ke database menggunakan `mysqli_connect`. Semua class menerima `$conn` dari file ini.

```php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'db_minpropbw';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die('Koneksi database tdk berhasil: ' . mysqli_connect_error());
}

mysqli_set_charset($conn, 'utf8mb4');
```

---

### Class Skill, Pengalaman, Sertifikat
Masing-masing data punya class sendiri. Setiap class menerima `$conn` lewat constructor dan punya method `getAll()` untuk mengambil semua data dari tabel.

```php
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
```

---

### Navbar
Navbar pakai komponen bawaan Bootstrap 5. Class `navbar-expand-lg` yang bikin navbar otomatis jadi tombol hamburger waktu dibuka di HP. `ms-auto` buat dorong menu ke kanan.

```html
<nav class="navbar navbar-expand-lg navbar-dark" id="navbar">
<div class="container">

    <a class="navbar-brand fw-bold" href="#">Darel Prasetya Fawwaz</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menuNavbar">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#about">About Me</a></li>
            <li class="nav-item"><a class="nav-link" href="#certificates">Certificates</a></li>
        </ul>
    </div>

</div>
</nav>
```

---

### Section Home
Layout-nya pakai grid Bootstrap, `col-md-7` buat teks dan `col-md-5` buat foto supaya bisa sejajar. `align-items-center` bikin keduanya rata tengah.

```html
<section id="home">
<div class="container">
    <div class="row align-items-center gy-4">

        <div class="col-md-7">
            <p class="teks-halo">Halo, nama saya</p>
            <h1 class="nama-besar">Darel Prasetya Fawwaz</h1>
            <h5 class="jurusan-teks">Mahasiswa Sistem Informasi</h5>
            <p class="deskripsi-teks">
                Saya Darel Prasetya Fawwaz Mahasiswa Universitas Mulawarman, Fakultas Teknik, Program Studi Sistem informasi.
                Saya tertarik dengan dunia teknologi, terutama pengembangan web.
                Saya juga suka menonton sepak bola terutama tim favorit saya FC Barcelona, dan saya hobi bermain futsal.
            </p>
            <a href="#about" class="btn btn-oren me-2">Tentang Saya</a>
            <a href="#certificates" class="btn btn-outline-oren">Lihat Sertifikat</a>
        </div>

        <div class="col-md-5 text-center">
            <img src="darel.jpeg" alt="Foto Darel" class="foto-profil" />
        </div>

    </div>
</div>
</section>
```

---

### Section About Me - Info Diri

```html
<div class="col-md-5">
    <div class="kartu-gelap h-100">
        <h5 class="fw-bold mb-3">
            <i class="bi bi-person-circle me-2 warna-oren"></i>Info Diri
        </h5>
        <p class="teks-abu">Halo! Saya Darel, mahasiswa semester 4. culers sejati</p>
        <hr class="garis" />
        <p><i class="bi bi-geo-alt me-2 warna-oren"></i><strong>Kota:</strong> Tenggarong, Kalimantan Timur</p>
        <p><i class="bi bi-envelope me-2 warna-oren"></i><strong>Email:</strong> darel2227@email.com</p>
        <p class="mb-0"><i class="bi bi-mortarboard me-2 warna-oren"></i><strong>Prodi:</strong> Sistem Informasi</p>
    </div>
</div>
```

---

### Section About Me - Skill (PHP)
Bagian skill datanya diambil dari database lewat class `Skill`. `foreach` dipakai buat looping data skill satu-satu, terus `$skill['nama']` dan `$skill['nilai']` buat nampilin teksnya ke layar. Lebar progress bar-nya nyambung ke data skill lewat `style`.

```php
<?php foreach ($skills as $skill): ?>
<div class="mb-3">
    <div class="d-flex justify-content-between mb-1">
        <span><?= htmlspecialchars($skill['nama']) ?></span>
        <span class="warna-oren fw-bold"><?= $skill['nilai'] ?>%</span>
    </div>
    <div class="progress" style="height: 8px; background-color: #2a2a2a;">
        <div
            class="progress-bar"
            role="progressbar"
            style="width: <?= $skill['nilai'] ?>%"
            aria-valuenow="<?= $skill['nilai'] ?>"
            aria-valuemin="0"
            aria-valuemax="100">
        </div>
    </div>
</div>
<?php endforeach; ?>
```

---

### Section About Me - Pengalaman (PHP)
Sama kayak skill, pengalaman juga diambil dari database lewat class `Pengalaman`. `foreach` looping dari hasil query. Grid Bootstrap `col-md-6` dipakai supaya kartunya tampil dua kolom di layar yang lebih lebar.

```php
<?php foreach ($pengalaman as $exp): ?>
<div class="col-md-6">
    <div class="kartu-gelap border-oren-kiri">
        <h6 class="fw-bold mb-1"><?= htmlspecialchars($exp['posisi']) ?></h6>
        <p class="teks-abu small mb-1">
            <i class="bi bi-building me-1"></i><?= htmlspecialchars($exp['tempat']) ?>
        </p>
        <p class="teks-abu small mb-2">
            <i class="bi bi-calendar me-1"></i><?= htmlspecialchars($exp['periode']) ?>
        </p>
        <p class="small mb-0"><?= htmlspecialchars($exp['deskripsi']) ?></p>
    </div>
</div>
<?php endforeach; ?>
```

---

### Section Certificates (PHP)
Sertifikat datanya diambil dari database lewat class `Sertifikat`. `foreach` looping dari hasil query. Gambarnya nyambung ke data lewat `src` yang diisi dari kolom `gambar` di database.

```php
<?php foreach ($sertifikat as $cert): ?>
<div class="col-md-6 col-lg-4">
    <div class="kartu-gelap h-100 p-0 overflow-hidden">
        <img src="<?= htmlspecialchars($cert['gambar']) ?>" alt="<?= htmlspecialchars($cert['judul']) ?>" class="gambar-sertifikat" />
        <div class="p-3">
            <h6 class="fw-bold mb-1"><?= htmlspecialchars($cert['judul']) ?></h6>
            <p class="teks-abu small mb-1">
                <i class="bi bi-award me-1 warna-oren"></i><?= htmlspecialchars($cert['penerbit']) ?>
            </p>
            <p class="teks-abu small mb-0">
                <i class="bi bi-calendar me-1 warna-oren"></i><?= htmlspecialchars($cert['tanggal']) ?>
            </p>
        </div>
    </div>
</div>
<?php endforeach; ?>
```

---

### Footer
Footer dibuat sebagai penanda halaman paling bawah.

```html
<footer>
<div class="container text-center">
    <p class="mb-1 fw-bold">Darel Prasetya Fawwaz</p>
    <p class="teks-abu small mb-0">visca barca</p>
</div>
</footer>
```

---
#### Darel Prasetya Fawwaz | 2409116064 | Sistem Informasi B 24 |
