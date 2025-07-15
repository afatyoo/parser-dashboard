===============================
DATA PARSING & VISUAL DASHBOARD
===============================

Author: Muhammad Afatyo Ikhsan
NPM   : 24011110157
Deskripsi:
Aplikasi ini adalah jawaban dari UAS Algoritma Struktur Data. Aplikasi ini digunakan untuk melakukan parsing data dari kolom (A, B, D, F, H, I),
menghitung kolom C sebagai rata-rata B per 3 baris, dan menampilkan hasil parsing 
dalam bentuk tabel interaktif dan grafik visual menggunakan Bootstrap, DataTables, dan Highcharts.

----------------------------------------
STRUKTUR KODE
----------------------------------------
```
├─ index.html          -> Dashboard utama (Bootstrap + DataTables + Highcharts)
├─ parser.php          -> Script untuk parsing dan generate data.json
├─ data.json           -> File hasil dari parser.php (auto-generated)
├─ js/                 -> Berisi file library Highcharts (jika offline)
│  ├─ highcharts.js
│  ├─ exporting.js
│  ├─ export-data.js
│  └─ series-label.js
├─ Dockerfile          -> Image PHP + Apache untuk menjalankan parser dan index
└─ docker-compose.yml  -> Compose file untuk menjalankan aplikasi dengan mudah
```
----------------------------------------
CARA MENJALANKAN DENGAN DOCKER
----------------------------------------
1. Jalankan:
   docker-compose up --build

2. Akses aplikasi:
   - Generate data: http://localhost:8080/parser.php
   - Lihat dashboard: http://localhost:8080/index.html


----------------------------------------
CATATAN
----------------------------------------
- Jalankan parser.php terlebih dahulu untuk membuat file data.json
- File data.json akan digunakan secara otomatis oleh dashboard

