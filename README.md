# Aplikasi Blog - Ujian Akhir Semester (UAS)

### Identitas Mahasiswa
- **Nama Lengkap:** Farah Aufa Huwaidah
- **NIM:** 240605110197
- **Mata Kuliah:** Pemrograman Web C
- **Dosen Pengampu:** A'la Syauqi M.Kom.

---

## Deskripsi Singkat Aplikasi
Aplikasi Blog ini adalah platform manajemen konten (CMS) berbasis web yang dibangun menggunakan **Framework Laravel** dan **Bootstrap 5**. Aplikasi ini terbagi menjadi dua area utama:
1. **Area Admin/Penulis (CMS):** Area privat yang dilindungi oleh sistem Autentikasi. Penulis yang sudah login dapat mengelola data secara dinamis menggunakan operasi CRUD pada entitas Kategori Artikel, Penulis, dan Artikel, lengkap dengan fitur unggah gambar.
2. **Area Pengunjung (Publik):** Area publik yang dapat diakses oleh siapa saja tanpa login. Menampilkan 5 artikel terbaru, fitur penyaringan (*filtering*) artikel berdasarkan kategori melalui widget samping, serta halaman detail artikel penuh yang dilengkapi dengan widget rekomendasi artikel terkait.

---

## Langkah-langkah Menjalankan Aplikasi Secara Lokal

Ikuti panduan berikut untuk menjalankan proyek aplikasi blog ini di komputer/laptop Anda:

### 1. Prasyarat Sistem
Pastikan perangkat Anda sudah terpasang:
- PHP (Versi 8.2 atau terbaru)
- Composer
- Laragon atau XAMPP (untuk database MySQL)

### 2. Kloning Repositori
Buka terminal atau Git Bash, lalu jalankan perintah berikut:
```bash
git clone [https://github.com/farahaufahwdh-creator/aplikasi-blog-240605110197.git](https://github.com/farahaufahwdh-creator/aplikasi-blog-240605110197.git)
cd aplikasi-blog-240605110197
```
### 3. Install Dependensi Composer
Jalankan perintah berikut untuk mengunduh semua paket dependensi Laravel yang dibutuhkan:
```bash
composer install
```
### 4. Konfigurasi Lingkungan (.env)
Salin file konfigurasi bawaan menjadi file .env baru dengan perintah:
```bash
copy .env.example .env
```
Buka file .env yang baru terbentuk menggunakan teks editor (VS Code), lalu cari bagian konfigurasi database dan sesuaikan dengan database lokal Anda:
```env
Cuplikan kode
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_blog
DB_USERNAME=root
DB_PASSWORD=
```

5. Generate Application Key & Link Storage
Jalankan perintah ini secara berurutan untuk membuat kunci enkripsi aplikasi dan menghubungkan folder aset gambar:
```bash
php artisan key:generate
php artisan storage:link
```

6. Jalankan Server Lokal Laravel
Pastikan modul Apache dan MySQL pada Laragon/XAMPP Anda sudah dalam posisi aktif (Start). Setelah itu, nyalakan server lokal Laravel dengan perintah:
```bash
php artisan serve
```
Buka browser Anda dan akses aplikasi melalui tautan: http://localhost:8000

7. Link demo Youtube
https://youtu.be/HNTmzmVf1HI

