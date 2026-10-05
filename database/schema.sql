CREATE DATABASE IF NOT EXISTS perpustakaan_db;
USE perpustakaan_db;

-- Tabel anggota
CREATE TABLE IF NOT EXISTS anggota (
    id_anggota INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    no_hp VARCHAR(20)
);

-- Tabel buku
CREATE TABLE IF NOT EXISTS buku (
    id_buku INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(150) NOT NULL,
    penulis VARCHAR(100),
    tahun_terbit YEAR
);

-- Tabel peminjaman
CREATE TABLE IF NOT EXISTS peminjaman (
    id_peminjaman INT AUTO_INCREMENT PRIMARY KEY,
    id_anggota INT,
    id_buku INT,
    tanggal_pinjam DATE,
    status VARCHAR(30),
    FOREIGN KEY (id_anggota)
        REFERENCES anggota(id_anggota),
    FOREIGN KEY (id_buku)
        REFERENCES buku(id_buku)
);

-- Contoh data anggota
INSERT INTO anggota (id_anggota, nama, email, no_hp) VALUES
(1, 'Shafa aufa', 'shafa@email.com', '081234567801'),
(2, 'bhianca eka', 'bhianca@email.com', '081234567802'),
(3, 'nagita', 'nagita@email.com', '081234567803'),
(4, 'stephani', 'stephani@email.com', '081234567804'),
(5, 'kaluna syafa', 'kaluna@email.com', '081234567805');

-- Contoh data buku
INSERT INTO buku (id_buku, judul, penulis, tahun_terbit) VALUES
(1, 'Laskar Pelangi', 'Andrea Hirata', 2005),
(2, 'Negeri 5 Menara', 'Ahmad Fuadi', 2009),
(3, 'Bumi', 'Tere Liye', 2014),
(4, 'Hujan', 'Tere Liye', 2016),
(5, 'Pulang', 'Tere Liye', 2015);

-- Contoh data peminjaman
INSERT INTO peminjaman
(id_peminjaman, id_anggota, id_buku, tanggal_pinjam, status)
VALUES
(1, 1, 1, '2026-09-20', 'Dipinjam'),
(2, 2, 2, '2026-09-21', 'Dikembalikan'),
(3, 3, 3, '2026-09-22', 'Dipinjam'),
(4, 1, 4, '2026-09-23', 'Dipinjam'),
(5, 4, 5, '2026-09-24', 'Dikembalikan');
