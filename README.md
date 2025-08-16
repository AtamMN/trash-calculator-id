# DAUR.IN

**DAUR.IN** adalah aplikasi manajemen sampah digital yang memudahkan pengguna untuk menambah, mengelola, dan melakukan cashout sampah dengan mudah.

---

## Prasyarat

Sebelum memulai instalasi, pastikan perangkat Anda memiliki:

* PHP 8.2
* Composer
* Laravel 12
* MySQL
* Node.js & npm
* Xampp 3.3.0

---

## Dokumentasi

### I. User
1. register akun (opsional)
2. Pilih jenis sampah
3. Masukkan kuantitas berat sampah
4. cek menu cashout untuk melihat total yang akan dibayar

### II. Admin
1. login akun admin (defualtnya email:admin@daurin.com pw:password1234.jika tidak ada, maka harus langsung mengakses db dan mengubah role di Users Table)
2. pergi ke /dashboard, atau bisa lewat profile > dashboard
3. tambahkan jenis sampah dan detilnya
4. ubah jenis sampah
5. ubah sampah yang aktif dan tidak aktif diterima
---

## Instalasi

1. **Clone repository**

```bash
git clone https://github.com/username/daur.in.git](https://github.com/AtamMN/trash-calculator-id
cd kalkulator-sampah
```

2. **Install dependencies**

```bash
composer install
npm install
npm run build
```

3. **Salin file environment**

```bash
cp .env.example .env
```

4. **Atur konfigurasi database di `.env`**

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kalkulator_sampah_db
DB_USERNAME=root
DB_PASSWORD=
```

5. **Jalankan migrasi dan seed database**

```bash
php artisan migrate --seed
```

6. **Jalankan server lokal**

```bash
php artisan serve
```

Buka browser: `http://127.0.0.1:8000`

---

## Fitur Utama

* Manajemen sampah (Tambah, Edit, Hapus)
* Cashout sampah secara digital
* Validasi harga, deskripsi, dan upload gambar
* Dashboard admin dan user
* Notifikasi transaksi

---

## Struktur Folder

```
app/             # Backend (Controllers, Models)
resources/views/  # Frontend Blade Templates
public/           # Aset publik (JS, CSS, Images)
database/         # Migration & Seeder
routes/           # File routing
```

---

## Catatan

* File gambar sampah akan disimpan di `/public/frontend/images`.
* Pastikan folder `storage/` sudah di-link ke public:

```bash
php artisan storage:link
```

---

## Troubleshooting

* **Error: file not writable** → pastikan folder `storage/` dan `bootstrap/cache` memiliki permission write.
* **JS/CSS tidak muncul** → jalankan `npm run build` atau `npm run dev` untuk compile frontend.

---

