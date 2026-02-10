# Resto API 🍽️

Backend API untuk sistem manajemen restoran (Point of Sales) sederhana, dibangun menggunakan **Laravel**.

> **Info:** Aplikasi Frontend (User Interface) untuk API ini dikembangkan di repositori terpisah:  
> **[Resto App Frontend](https://github.com/hendryriq/resto-app)**

## Fitur Utama

- **Manajemen Meja**: Cek ketersediaan, status meja (Available/Occupied).
- **Manajemen Menu**: Daftar makanan dan minuman beserta kategori dan harga.
- **Sistem Order**:
  - **Draft Order**: Simpan pesanan sementara tanpa memblokir meja.
  - **Open Order**: Pesanan aktif yang mengubah status meja menjadi Occupied.
  - **Close Order**: Menyelesaikan pesanan.
- **Cetak Struk**: Generate receipt dalam format PDF (dengan mata uang USD).
- **Role Management**: Login sebagai Pelayan atau Kasir.

## 🛠️ Persyaratan Sistem

- PHP >= 8.2
- Composer
- Database (MySQL / SQLite / PostgreSQL)

## Cara Install & Setup

Ikuti langkah-langkah berikut untuk menjalankan project ini di komputer lokal Anda:

### 1. Clone Repository
```bash
git clone https://github.com/username/resto-api.git
cd resto-api
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Setup Environment
Duplikat file `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```
Buka file `.env` dan sesuaikan konfigurasi database Anda:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=resto_db
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate App Key
```bash
php artisan key:generate
```

### 5. Migrasi & Seeder Database
Jalankan perintah ini untuk membuat tabel dan mengisi data awal (dummy data):
```bash
php artisan migrate --seed
```

### 6. Jalankan Server Lokal
```bash
php artisan serve
```
Aplikasi akan berjalan di `http://127.0.0.1:8000`.

---

## Akun Default (Seeder)

Gunakan akun berikut untuk login dan testing API:

| Role | Email | Password |
|------|-------|----------|
| **Pelayan** | `pelayan@resto.com` | `password` |
| **Kasir** | `kasir@resto.com` | `password` |
| **Pelayan 2** | `pelayan2@resto.com` | `password` |

---

## 📚 Dokumentasi API

Dokumentasi lengkap endpoint API tersedia di file [API_DOCUMENTATION.md](API_DOCUMENTATION.md).

### Endpoint Ringkas

#### Auth
- `POST /api/login` - Login user
- `POST /api/logout` - Logout (perlu token)
- `GET /api/me` - Cek user data

#### Tables
- `GET /api/tables` - Lihat semua meja (Public/Guest Access)
- `GET /api/tables?status=available` - Filter meja kosong

#### Foods
- `GET /api/foods` - Daftar menu

#### Orders
- `GET /api/orders` - List semua order
- `POST /api/orders` - Buat order baru (Langsung Active/Open)
- `POST /api/orders/draft` - Buat order Draft (Pending)
- `PUT /api/orders/{id}/activate` - Aktifkan order Draft menjadi Open
- `GET /api/orders/{id}/receipt` - Download struk PDF (Hanya closed order)

---

## 🧪 Testing

Project ini menggunakan **Laravel Sanctum** untuk autentikasi. Pastikan menyertakan header `Authorization: Bearer <token>` untuk mengakses endpoint yang dilindungi.

### Contoh Login (cURL)
```bash
curl -X POST http://127.0.0.1:8000/api/login \
  -H "Content-Type: application/json" \
  -d '{"email":"pelayan@resto.com","password":"password"}'
```

---

## 📝 Catatan Penting
- **Draft Order (`pending`)**: Tidak mengubah status meja (tetap Available).
- **Active Order (`open`)**: Mengubah status meja menjadi Occupied.
- **⚠️ Deviasi dari PRD (Hak Akses Menu)**: 
  Terdapat penyesuaian logika bisnis pada endpoint **Manajemen Menu** (Create/Update/Delete Foods). 
  - **PRD/User Story**: Menyebutkan fitur ini dapat diakses oleh *Pelayan*.
  - **Implementasi**: Endpoint ini dilindungi middleware dan hanya dapat diakses oleh user dengan role **Kasir**.
  - **Alasan**: Keputusan ini diambil demi keamanan data master dan kewajaran operasional restoran (pemisahan tugas antara pelayanan dan administrasi harga).