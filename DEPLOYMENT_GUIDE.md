# Panduan Deployment Production: Hajj Club Landing Page

Dokumen ini berisi panduan konfigurasi dan *deployment* ke *web hosting* (Hostinger / cPanel / VPS) untuk domain **https://hajjclub.co.id**.

---

## 1. Konfigurasi Environment Production (`.env`)

Saat aplikasi dipindahkan ke server *production*, pastikan nilai pada file `.env` disesuaikan sebagai berikut:

```dotenv
APP_NAME="Hajj Club"
APP_ENV=production
APP_KEY=base64:I/Ao5vQoI97pRNZczVSHL+MZcoxzCARYcYGM+b4JyU0= # atau generate dengan `php artisan key:generate`
APP_DEBUG=false
APP_URL=https://hajjclub.co.id

APP_LOCALE=id
APP_FALLBACK_LOCALE=en

LOG_CHANNEL=stack
LOG_LEVEL=error

# Pengaturan Tracking & Google Ads
GTM_ID=GTM-XXXXXXX           # ID Google Tag Manager Anda
GA4_ID=G-XXXXXXXXXX          # ID Google Analytics 4 (Opsional jika sudah dipasang via GTM)
GADS_CONVERSION_ID=AW-XXXXXXXXX/YYYYYYYYY # Google Ads Conversion Tag

# Pengaturan WhatsApp Customer Service & Conversion
WHATSAPP_NUMBER=0811903909
WHATSAPP_MESSAGE="Halo Admin Hajj Club, saya tertarik untuk mengetahui informasi kemitraan & kepemilikan travel haji bersama."
```

---

## 2. Langkah Kompilasi Aset Frontend (Sebelum Upload)

Sebelum mengunggah berkas ke server, kompilasi seluruh aset Vite/Tailwind:

```bash
# 1. Install dependensi
npm install

# 2. Build aset produksi terkompresi
npm run build
```

Hasil kompilasi akan berada di folder `public/build/` dengan *hash cache-busting* otomatis (`manifest.json`, CSS, dan JS).

---

## 3. Langkah Optimasi Laravel di Server Production

Setelah file terunggah di hosting/server, jalankan perintah optimasi berikut via SSH / Terminal:

```bash
# 1. Bersihkan cache pengembangan sebelumnya
php artisan optimize:clear

# 2. Buat cache konfigurasi, rute, dan blade template
php artisan optimize

# 3. Cache view secara manual jika diperlukan
php artisan view:cache
```

> **Catatan:** Jika melakukan perubahan pada file konfigurasi atau `.env`, wajib jalankan kembali `php artisan optimize`.

---

## 4. Konfigurasi Web Server (Hostinger / Apache / Nginx)

### A. Document Root
Arahkan **Document Root** domain `hajjclub.co.id` ke folder:
```
public_html/public   (atau folder project)/public
```
*Jangan pernah mengarahkan Document Root ke folder root Laravel.*

### B. HTTPS / SSL
Pastikan sertifikat SSL (Let's Encrypt / Hostinger SSL) aktif dan opsi **Force HTTPS** diaktifkan agar seluruh pengunjung dialihkan ke `https://hajjclub.co.id`.

### C. File Permissions (Linux Server)
Pastikan folder `storage` dan `bootstrap/cache` memiliki hak akses tulis:
```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

---

## 5. Integrasi Google Ads Conversion Tracking

Tombol Call to Action (CTA) pada landing page sudah dilengkapi dengan fungsi pelacakan:
- Setiap klik tombol WhatsApp memicu event:
  - Google Tag Manager (GTM): Event dataLayer `conversion_lead_click`
  - Google Analytics / Google Ads: Event `conversion` (dengan parameter `send_to: GOOGLE_ADS_CONVERSION_ID`)
- Di Google Tag Manager / Google Ads:
  1. Buat Trigger: *Custom Event* dengan nama `conversion_lead_click`
  2. Buat Tag: *Google Ads Conversion Tracking* yang dipicu oleh trigger tersebut.
