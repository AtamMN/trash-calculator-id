# DAUR.IN

**DAUR.IN** adalah aplikasi manajemen sampah digital yang memudahkan pengguna untuk menambah, mengelola, dan melakukan cashout sampah dengan mudah.

<img width="1871" height="992" alt="Image" src="https://github.com/user-attachments/assets/a9437333-38da-4e42-8fcf-57796c430e62" />
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
<img width="1871" height="992" alt="Image" src="https://github.com/user-attachments/assets/3f559548-e771-4ca8-9472-fea9d649d3a4" />
<img width="1876" height="982" alt="image" src="https://github.com/user-attachments/assets/ac883183-7fb7-436f-b43d-0adeebb38e0a" />

2. Pilih jenis sampah
<img width="1874" height="920" alt="image" src="https://github.com/user-attachments/assets/fe856a16-21e1-4b40-9c87-77eb114297b7" />

3. Masukkan kuantitas berat sampah
<img width="1868" height="920" alt="image" src="https://github.com/user-attachments/assets/25222b7c-f6c1-481b-b760-2a13b2076daa" />

4. Masukkan ke keranjang
<img width="1857" height="913" alt="image" src="https://github.com/user-attachments/assets/ac7fec33-a0b6-4da7-99fe-ebdcd97cab6f" />

5. cek menu cashout untuk melihat total yang akan dibayar
<img width="1879" height="977" alt="image" src="https://github.com/user-attachments/assets/bd715a50-b499-48cb-9be7-c5f990f7c555" />
<img width="1877" height="914" alt="image" src="https://github.com/user-attachments/assets/1747c09f-81b9-46a3-ad46-3d1a4d602ba7" />

### II. Admin
1. login akun admin [WAJIB] (defualtnya email:admin@daurin.com pw:password1234. jika tidak ada, maka harus langsung mengakses db dan mengubah role di Users Table)
<img width="1868" height="906" alt="image" src="https://github.com/user-attachments/assets/6cd36001-ae13-48bd-9d9f-fc8c9c35665b" />
<img width="1877" height="918" alt="image" src="https://github.com/user-attachments/assets/4698873a-4a9d-4207-a2f2-17355c557245" />

2. pergi ke /dashboard, atau bisa lewat profile > dashboard
<img width="1874" height="920" alt="image" src="https://github.com/user-attachments/assets/b5958009-8d72-4e79-a0ae-30bb4e046f80" />
<img width="1880" height="924" alt="image" src="https://github.com/user-attachments/assets/f6132863-2f5e-4ae0-89ec-a3695b5c56e1" />

3. lihat jenis-jenis sampah yang aktif dan nonaktif
<img width="1868" height="913" alt="image" src="https://github.com/user-attachments/assets/40418ccc-8dd2-4071-9932-ad827597da61" />
   
4. tambahkan jenis sampah dan detilnya
<img width="1885" height="916" alt="image" src="https://github.com/user-attachments/assets/a8cbd701-0574-467e-81de-f5ded63ec50b" />

5. ubah jenis sampah
<img width="1874" height="908" alt="image" src="https://github.com/user-attachments/assets/f37ee1a6-ccf0-4739-a204-f97f81393ada" />
<img width="1875" height="916" alt="image" src="https://github.com/user-attachments/assets/6e0cc3fd-c40f-43d5-8689-ba49dad1b41f" />

---

## Instalasi

1. **Clone repository**

```bash
git clone https://github.com/username/daur.in.git](https://github.com/AtamMN/trash-calculator-id
cd kalkulator-sampah
```

2. **Install dependencies**
pastikan di Xampp Apache dan mysql telah aktif.
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

