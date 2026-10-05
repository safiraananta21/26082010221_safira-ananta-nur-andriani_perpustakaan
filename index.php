<?php
include 'services/config.php';

// Mengambil data anggota
$queryAnggota = "SELECT * FROM anggota";
$resultAnggota = $conn->query($queryAnggota);

// Mengambil data buku
$queryBuku = "SELECT * FROM buku";
$resultBuku = $conn->query($queryBuku);

// Mengambil data peminjaman dari 3 tabel
$queryPeminjaman = "SELECT
    peminjaman.id_peminjaman,
    anggota.nama,
    buku.judul,
    buku.penulis,
    peminjaman.tanggal_pinjam,
    peminjaman.status
    FROM peminjaman
    JOIN anggota
    ON peminjaman.id_anggota = anggota.id_anggota
    JOIN buku
    ON peminjaman.id_buku = buku.id_buku";

$resultPeminjaman = $conn->query($queryPeminjaman);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Digital</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar">
    <h2>Perpustakaan Digital</h2>
    <div class="menu">
        <a href="#anggota">Anggota</a>
        <a href="#buku">Buku</a>
        <a href="#peminjaman">Peminjaman</a>
    </div>
</nav>

<header class="hero">
    <h1>Selamat Datang di Perpustakaan Digital</h1>
    <p>Sistem Informasi Data Perpustakaan</p>
</header>

<main class="container">

    <!-- Tabel Anggota -->
    <section id="anggota" class="card">
        <h2>Data Anggota</h2>
        <div class="table-wrapper">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No. HP</th>
                </tr>

                <?php while ($row = $resultAnggota->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['id_anggota'] ?></td>
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['no_hp']) ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </section>

    <!-- Tabel Buku -->
    <section id="buku" class="card">
        <h2>Data Buku</h2>
        <div class="table-wrapper">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                </tr>

                <?php while ($row = $resultBuku->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['id_buku'] ?></td>
                    <td><?= htmlspecialchars($row['judul']) ?></td>
                    <td><?= htmlspecialchars($row['penulis']) ?></td>
                    <td><?= $row['tahun_terbit'] ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </section>

    <!-- Tabel Peminjaman -->
    <section id="peminjaman" class="card">
        <h2>Data Peminjaman</h2>
        <div class="table-wrapper">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nama Anggota</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Tanggal Pinjam</th>
                    <th>Status</th>
                </tr>

                <?php while ($row = $resultPeminjaman->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['id_peminjaman'] ?></td>
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td><?= htmlspecialchars($row['judul']) ?></td>
                    <td><?= htmlspecialchars($row['penulis']) ?></td>
                    <td><?= $row['tanggal_pinjam'] ?></td>
                    <td><?= htmlspecialchars($row['status']) ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </section>

</main>

<footer>
    <p>© 2026 Perpustakaan Digital | ISCOM</p>
</footer>

</body>
</html>