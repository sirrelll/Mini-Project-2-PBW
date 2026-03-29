<?php
require_once 'Skill.php';
require_once 'Pengalaman.php';
require_once 'Sertifikat.php';

$skillModel      = new Skill($conn);
$pengalamanModel = new Pengalaman($conn);
$sertifikatModel = new Sertifikat($conn);

$skills = $skillModel->getAll();
$pengalaman = $pengalamanModel->getAll();
$sertifikat = $sertifikatModel->getAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Darel Prasetya Fawwaz | Portfolio</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
<link rel="stylesheet" href="style.css" />
</head>
<body>

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

<section id="about">
<div class="container">
    <h2 class="judul-section text-center">About Me</h2>
    <div class="row g-4">

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

        <div class="col-md-7">
            <div class="kartu-gelap h-100">
                <h5 class="fw-bold mb-4">
                    <i class="bi bi-lightning me-2 warna-oren"></i>Skill
                </h5>
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
            </div>
        </div>

    </div>

    <h4 class="fw-bold mt-5 mb-4">
        <i class="bi bi-briefcase me-2 warna-oren"></i>Pengalaman
    </h4>
    <div class="row g-3">
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
    </div>

</div>
</section>

<section id="certificates">
<div class="container">
    <h2 class="judul-section text-center">Certificates</h2>
    <p class="text-center sub-judul mb-5">Sertifikat yang sudah saya dapat</p>
    <div class="row g-4">
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
    </div>
</div>
</section>

<footer>
<div class="container text-center">
    <p class="mb-1 fw-bold">Darel Prasetya Fawwaz</p>
    <p class="teks-abu small mb-0">visca barca</p>
</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>