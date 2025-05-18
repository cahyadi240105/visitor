---

# 📝 E-Tamu – Aplikasi Pencatatan Tamu Digital

**E-Tamu** adalah aplikasi pencatatan tamu berbasis web yang dirancang untuk menggantikan buku tamu manual dengan sistem digital yang lebih efisien, aman, dan terorganisir. Sistem ini memungkinkan pengisian data tamu secara langsung oleh pengunjung maupun oleh admin yang bertugas. Semua data akan tersimpan secara otomatis ke dalam database untuk keperluan dokumentasi dan pelacakan.

## 🔎 Tentang Proyek

Proyek ini dikembangkan sebagai bagian dari pembelajaran pengembangan sistem informasi web. E-Tamu menawarkan solusi pencatatan kunjungan secara digital, dengan akses login khusus untuk admin. Admin dapat melihat data kunjungan yang masuk, serta membantu mengisi kehadiran tamu apabila diperlukan.

### Alur Sistem:

* Tamu mengisi formulir kehadiran secara langsung pada halaman utama.
* Atau, admin dapat mengisikan data kehadiran tamu jika diperlukan.
* Admin dapat login untuk melihat dan mengelola data kunjungan.

## 🛠 Teknologi yang Digunakan

* **Frontend:** Bootstrap
* **Backend:** PHP Native
* **Database:** MySQL

## 🎯 Fitur Utama

* Form kehadiran tamu digital
* Login admin untuk mengakses data kunjungan
* Tabel riwayat kunjungan harian
* Validasi input pengunjung
* Antarmuka bersih dan mudah digunakan

## 🚀 Cara Menjalankan Proyek

1. Unduh atau clone repositori ke dalam folder `htdocs` (jika menggunakan XAMPP/Laragon).
2. Buat database baru di phpMyAdmin dan impor file `e-tamu.sql` (jika tersedia).
3. Sesuaikan konfigurasi koneksi database di file seperti `config/koneksi.php`.
4. Akses halaman utama melalui `localhost/e-tamu`:


## 📁 Struktur Direktori (Contoh)

```
e-tamu/
├── assets/              # File CSS, JS, dan gambar
├── config/              # File koneksi database
├── form/                # Halaman form pengisian tamu
├── admin/               # Halaman admin & dashboard
├── index.php            # Form utama pengisian tamu
└── admin-login.php      # Halaman login admin
```

*Silakan ubah kredensial login di database untuk alasan keamanan.*

## 👨‍💻 Pengembang

Dikembangkan oleh Cahyadi Prasetyo sebagai bagian dari tugas pengembangan sistem informasi berbasis web.

