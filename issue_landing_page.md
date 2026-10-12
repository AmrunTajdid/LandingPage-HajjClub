# Project Implementation Plan: Hajj Club Landing Page

## Deskripsi
Issue ini berfungsi sebagai panduan kerja (checklist) bagi *junior programmer* atau *AI Agent* untuk mengimplementasikan dan menyempurnakan website Landing Page "Hajj Club" menggunakan **Laravel** dan **Tailwind CSS**. 

Fokus utama dari *landing page* ini adalah untuk kebutuhan promosi melalui **Google Ads**, sehingga kecepatan *loading*, responsivitas (Mobile-First), dan SEO menjadi prioritas utama.

---

## ✅ Checklist Implementasi

### Fase 1: Setup Lingkungan & Aset
- [x] Inisiasi project Laravel baru (jika belum digabung dengan project sistem pendaftaran).
- [x] Install & Konfigurasi **Tailwind CSS** melalui Vite (`npm install -D tailwindcss postcss autoprefixer`, lalu `npx tailwindcss init -p`).
- [x] Konfigurasi `tailwind.config.js`:
  - Tambahkan warna kustom: *Navy* (`#0f172a`, `#080c17`) dan *Gold* (`#d4af37`, `#facc15`).
  - Tambahkan font: `Playfair Display` (untuk Heading/Serif) dan `Inter` (untuk Body/Sans).
- [x] Siapkan folder `public/images` dan kompresi semua gambar (*hero background*, foto tim, dll) ke format **WebP** untuk mengoptimalkan kecepatan *loading* (Penting untuk Google Ads).

### Fase 2: Slicing UI & Blade Components
Kode dasar UI sudah tersedia di file referensi `landing_page_hajj_club.blade.php`. Tugas Anda adalah merapikan dan memecahnya menjadi komponen:
- [x] Pindahkan kode referensi tersebut ke `resources/views/welcome.blade.php`.
- [x] Ganti CDN Tailwind CSS dengan direktif `@vite(['resources/css/app.css', 'resources/js/app.js'])`.
- [x] Refaktor kode HTML menjadi Blade Components agar lebih rapi:
  - Buat `resources/views/components/navbar.blade.php`
  - Buat `resources/views/components/footer.blade.php`
  - Buat komponen kustom untuk bentuk *Card* pada bagian *Unique Value Proposition* (UVP) dan *Benefit*.
- [x] Buat logika interaktivitas menu *mobile* (Hamburger Menu) menggunakan Alpine.js atau Vanilla JS.

### Fase 3: Integrasi Konten (Copywriting)
Pastikan semua teks sesuai dengan materi presentasi:
- [x] **Intro:** Profil Founder (Purnama Qori Andesta) & Co-Founder (Hj. Semah Wafiah).
- [x] **Problem & Solution:** Daftar masalah industri travel saat ini dan solusi kolaborasi lintas profesi.
- [x] **Unique Value Proposition:** 5 poin (Ownership, Professional, Transparan, Pelopor, Berkelanjutan).
- [x] **Benefit:** Pisahkan ke dalam 2 kolom (Legal Benefit & Priority Benefit).

### Fase 4: Optimasi Google Ads & SEO (Penting!)
Karena website ini akan diiklankan, pastikan *tracking* dan *caching* sudah optimal:
- [x] Tambahkan tag *Meta Title* dan *Meta Description* yang relevan (Contoh: "Hajj Club - Pelopor Kepemilikan Travel Haji Bersama").
- [x] Siapkan ruang/blok kode di tag `<head>` untuk menyisipkan skrip **Google Analytics (GA4)** dan **Google Tag Manager (GTM)**.
- [x] Buat tombol *Call to Action* (Gabung Sekarang / Hubungi Kami) mengarah ke link WhatsApp, dan pastikan tombol ini mudah di-track sebagai *Conversion* di Google Ads.

### Fase 5: Persiapan Deployment (Hostinger / .co.id)
- [x] Pastikan tidak ada *error* saat menjalankan `npm run build`.
- [x] Jalankan perintah optimasi Laravel (`php artisan optimize:clear` dan `php artisan optimize`).
- [x] Buat panduan singkat konfigurasi `.env` untuk *production* (Set `APP_ENV=production`, `APP_DEBUG=false`, URL menggunakan `https://hajjclub.co.id`).

---
**Catatan untuk Programmer/AI:**
Target desain adalah **Mewah, Eksklusif, dan Profesional**. Pastikan animasi (*hover effects*, *smooth scroll*) berjalan mulus namun tidak membebani performa *render* halaman.
