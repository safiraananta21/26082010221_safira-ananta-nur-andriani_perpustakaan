# Perpustakaan Digital

## Deskripsi Proyek
Perpustakaan Digital merupakan sistem informasi sederhana yang digunakan untuk mengelola data anggota, data buku, dan transaksi peminjaman buku. Proyek ini dibuat untuk memenuhi tugas ISCOM mengenai perancangan basis data dan version control.

## Tujuan
- Mengelola data anggota perpustakaan.
- Menyimpan informasi buku.
- Mencatat transaksi peminjaman buku.
- Menghubungkan data anggota, buku, dan peminjaman menggunakan relasi database.
- Menampilkan data dari database melalui website.

## Struktur Database

Database yang digunakan bernama perpustakaan_db dan memiliki tiga tabel utama.

### 1. Tabel Anggota
Menyimpan informasi anggota perpustakaan.

| Atribut | Tipe Data | Keterangan |
|---|---|---|
| id_anggota | INT | Primary Key |
| nama | VARCHAR(100) | Nama anggota |
| email | VARCHAR(100) | Email anggota |
| no_hp | VARCHAR(20) | Nomor telepon |

### 2. Tabel Buku
Menyimpan informasi buku yang tersedia.

| Atribut | Tipe Data | Keterangan |
|---|---|---|
| id_buku | INT | Primary Key |
| judul | VARCHAR(150) | Judul buku |
| penulis | VARCHAR(100) | Nama penulis |
| tahun_terbit | YEAR | Tahun terbit |

### 3. Tabel Peminjaman
Mencatat transaksi peminjaman buku.

| Atribut | Tipe Data | Keterangan |
|---|---|---|
| id_peminjaman | INT | Primary Key |
| id_anggota | INT | Foreign Key |
| id_buku | INT | Foreign Key |
| tanggal_pinjam | DATE | Tanggal peminjaman |
| status | VARCHAR(30) | Status peminjaman |

## Relasi dan Kardinalitas

- *Anggota dengan Peminjaman:* Satu anggota dapat melakukan banyak peminjaman. Relasinya adalah One-to-Many (1:N).
- *Buku dengan Peminjaman:* Satu buku dapat tercatat dalam banyak transaksi peminjaman. Relasinya adalah One-to-Many (1:N).

Tabel peminjaman menghubungkan tabel anggota dan buku melalui foreign key id_anggota dan id_buku.

## Teknologi yang Digunakan
- *PHP:* Menghubungkan website dengan database dan menampilkan data.
- *MySQL:* Menyimpan dan mengelola data.
- *HTML:* Membuat struktur halaman website.
- *CSS:* Mengatur tampilan website.
- *XAMPP:* Menjalankan server lokal.
- *Visual Studio Code:* Menulis dan mengelola kode program.
- *GitHub:* Menyimpan dan mengelola proyek menggunakan version control.

## Cara Menjalankan Proyek

1. Instal dan buka XAMPP.
2. Jalankan Apache dan MySQL.
3. Letakkan folder proyek perpustakaandigital di dalam folder htdocs.
4. Buat database bernama perpustakaan_db melalui phpMyAdmin.
5. Impor file database/schema.sql jika database belum memiliki tabel dan data.
6. Pastikan pengaturan koneksi database pada services/config.php sudah sesuai.
7. Buka browser dan akses:

   http://localhost/perpustakaandigital/

## Contoh Query SQL

### SELECT
Menampilkan seluruh data anggota.

sql
SELECT * FROM anggota;


### JOIN
Menampilkan data peminjaman beserta nama anggota dan judul buku.

sql
SELECT
    peminjaman.id_peminjaman,
    anggota.nama,
    buku.judul,
    peminjaman.tanggal_pinjam,
    peminjaman.status
FROM peminjaman
JOIN anggota
    ON peminjaman.id_anggota = anggota.id_anggota
JOIN buku
    ON peminjaman.id_buku = buku.id_buku;


### UPDATE
Mengubah status peminjaman.

sql
UPDATE peminjaman
SET status = 'Dikembalikan'
WHERE id_peminjaman = 1;


### DELETE
Menghapus data peminjaman berdasarkan ID.

sql
DELETE FROM peminjaman
WHERE id_peminjaman = 1;


## Kesimpulan
Perpustakaan Digital menerapkan basis data relasional untuk mengelola informasi anggota, buku, dan transaksi peminjaman. Dengan adanya relasi antar tabel, data dapat disimpan secara terstruktur dan ditampilkan melalui website.