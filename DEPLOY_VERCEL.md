# Panduan Hosting LandingPage-HajjClub di Vercel (Gratis) & Penjelasan Domain .com

File konfigurasi Vercel untuk project **LandingPage-HajjClub** sudah siap dan dikonfigurasi penuh:
1. `vercel.json` (Konfigurasi routing serverless, static assets, dan environment variables)
2. `api/index.php` (Serverless handler untuk Laravel dengan penyimpanan sementara `/tmp/storage`)
3. `bootstrap/app.php` (Pengaturan dynamic storage path untuk Vercel)
4. `.vercelignore` (Pencegahan upload file sampah/development)

---

## 1. Fakta Mengenai Domain `.com` & Subdomain Vercel Gratis

### Apakah Domain `.com` Bisa Didapatkan 100% Gratis?
- **Domain `.com`** adalah Top-Level Domain (TLD) komersial resmi dunia yang dikelola oleh **ICANN** & **Verisign**. Karena ada biaya regulasi global wajib, tidak ada penyedia resmi yang memberikan domain `.com` murni gratis selamanya tanpa syarat atau biaya perpanjangan tahunan (umumnya berkisar Rp 100.000 - Rp 150.000 per tahun di registrar seperti Niagahoster, Domainesia, Namecheap, dll).
- **Kabar Baiknya dari Vercel:**
  1. **Domain Gratis Selamanya:** Vercel memberikan domain bawaan **100% GRATIS SELAMANYA** dengan ekstensi `*.vercel.app` (contoh: `hajjclub.vercel.app` atau `hajjclub-landingpage.vercel.app`).
  2. **SSL / HTTPS Otomatis Gratis:** Domain ini sudah dilengkapi sertifikat keamanan gembok hijau SSL resmi tanpa biaya tambahan.
  3. **Pasang Custom Domain .com Kapan Saja Gratis:** Vercel **tidak mengenakan biaya sepeser pun** untuk menghubungkan domain kustom (`.com`, `.id`, `.co.id`, dll). Jika di masa depan Anda memiliki domain `.com`, Anda dapat memasangnya langsung di dashboard Vercel secara gratis.

---

## 2. Cara Deploy ke Vercel (2 Pilihan)

### Opsi A: Deploy Melalui GitHub (Sangat Direkomendasikan & Paling Praktis)
Metode ini adalah standar industri karena setiap kali Anda mengedit kode di masa depan dan melakukan git push, website di Vercel akan otomatis ter-update sendiri (CI/CD Otomatis).

#### Langkah-langkah:
1. **Buka Terminal / Command Prompt di folder project ini**, lalu jalankan:
   ```bash
   git init
   git add .
   git commit -m "feat: siapkan landing page untuk vercel"
   ```
2. **Buat repository baru di [GitHub](https://github.com/new)** (bisa disetel *Private* atau *Public*), misalnya dengan nama `LandingPage-HajjClub`.
3. **Hubungkan dan push project ke GitHub:**
   ```bash
   git branch -M main
   git remote add origin https://github.com/USERNAME-ANDA/LandingPage-HajjClub.git
   git push -u origin main
   ```
4. **Buka [vercel.com](https://vercel.com/)**:
   - Klik **Sign Up** atau **Log In** menggunakan akun **GitHub** Anda.
5. **Import Project di Dashboard Vercel**:
   - Klik tombol **"Add New..."** lalu pilih **"Project"**.
   - Pilih repository **LandingPage-HajjClub** yang baru saja di-push, lalu klik **"Import"**.
   - Pada bagian **Environment Variables**, pastikan variabel berikut ditambahkan (sudah disiapkan di `vercel.json`, namun baik untuk ditambahkan di dashboard jika diperlukan):
     - `APP_KEY` : `base64:I/Ao5vQoI97pRNZczVSHL+MZcoxzCARYcYGM+b4JyU0=`
     - `APP_ENV` : `production`
     - `APP_DEBUG` : `false`
     - `SESSION_DRIVER` : `cookie`
     - `CACHE_STORE` : `array`
     - `LOG_CHANNEL` : `stderr`
   - Klik tombol **"Deploy"**.
6. **Selesai!** Dalam waktu 1-2 menit, landing page Hajj Club Anda akan langsung online dan bisa diakses publik melalui link `https://[nama-projek].vercel.app`.

---

### Opsi B: Deploy Langsung Menggunakan Terminal (Vercel CLI)

Jika Anda tidak ingin menggunakan GitHub, Anda bisa mendeploy langsung dari komputer Anda:

1. Buka Command Prompt / PowerShell di folder project:
   ```bash
   npx vercel login
   ```
   *(Pilih metode login, misalnya Email atau GitHub, lalu klik tautan verifikasi yang masuk ke email/browser Anda)*.

2. Jalankan perintah deploy produksi:
   ```bash
   npx vercel --prod
   ```
3. Vercel akan menanyakan beberapa pertanyaan sederhana:
   - *Set up and deploy?* &rarr; Tekan **Y** (Yes)
   - *Which scope do you want to deploy to?* &rarr; Pilih akun Anda (tekan Enter)
   - *Link to existing project?* &rarr; Tekan **N** (No)
   - *What's your project's name?* &rarr; Ketik nama yang diinginkan, misal: `hajjclub-landingpage`
   - *In which directory is your code located?* &rarr; Tekan **Enter** (`./`)
   - *Want to modify these settings?* &rarr; Tekan **N** (No)
4. Tunggu beberapa detik hingga proses upload & build selesai. Vercel akan langsung menampilkan link live website Anda!

---

## 3. Cara Menghubungkan Domain .com Milik Sendiri di Vercel

Setelah website Anda aktif di Vercel, jika Anda membeli domain `.com` (misalnya di Niagahoster, Domainesia, Rumahweb, Dewaweb, atau Namecheap):

1. Masuk ke dashboard project Anda di **[vercel.com](https://vercel.com)**.
2. Klik tab **Settings** &rarr; pilih menu **Domains** di sebelah kiri.
3. Masukkan nama domain Anda (misal: `hajjclub.com` dan `www.hajjclub.com`), lalu klik **Add**.
4. Vercel akan menampilkan instruksi DNS yang perlu Anda masukkan di tempat Anda membeli domain:
   - **Type A Record**:
     - Host: `@`
     - Value / IP: `76.76.21.21`
   - **CNAME Record**:
     - Host: `www`
     - Value: `cname.vercel-dns.com`
5. Dalam waktu 5 - 30 menit setelah DNS tersambung, Vercel akan otomatis menerbitkan **SSL/HTTPS** secara gratis dan website Anda resmi aktif dengan domain `.com`!
