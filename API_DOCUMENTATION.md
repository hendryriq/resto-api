# 📖 Simple API Documentation

Dokumentasi ringkas untuk **Resto API**.
Base URL: `http://localhost:8000/api`

---

## � Auth

### Login
- **URL**: `POST /login`
- **Body**: `{ "email": "...", "password": "..." }`
- **Response**: Token & User info.

### Logout
- **URL**: `POST /logout`
- **Header**: `Authorization: Bearer <token>`

### User Info
- **URL**: `GET /me`
- **Header**: `Authorization: Bearer <token>`

---

## 🍽️ Tables (Meja)

### List Meja (Public)
- **URL**: `GET /tables`
- **Params**:
  - `status=available` (Filter meja kosong)
- **Note**: Bisa diakses tamu tanpa login.

---

## 🍔 Foods (Menu)

### List Menu
- **URL**: `GET /foods`
- **Params**:
  - `category=...` (Filter kategori)
  - `search=...` (Cari nama)
- **Header**: `Authorization: Bearer <token>`

---

## 📝 Orders (Pesanan)

### 1. List Order
- **URL**: `GET /orders`
- **Params**:
  - `status=pending` (Drafts)
  - `status=open` (Active Orders)
  - `status=closed` (History)

### 2. Buat Draft Order (Pending)
Membuat pesanan sementara **TANPA** memblokir meja (Status meja tetap Available).
- **URL**: `POST /orders/draft`
- **Body**: `{ "table_id": 1 }`

### 3. Aktifkan Order (Open)
Mengubah Draft menjadi Active Order & **MEMBLOKIR** meja (Status meja jadi Occupied).
- **URL**: `PUT /orders/{id}/activate`

### 4. Tambah Item
- **URL**: `POST /orders/{id}/items`
- **Body**: `{ "food_id": 1, "quantity": 2 }`

### 5. Update Item Qty
- **URL**: `PUT /orders/{orderId}/items/{itemId}`
- **Body**: `{ "quantity": 3 }`

### 6. Hapus Item
- **URL**: `DELETE /orders/{orderId}/items/{itemId}`

### 7. Bayar / Selesaikan Order
- **URL**: `PUT /orders/{id}/close`

### 8. Cetak Struk (PDF)
- **URL**: `GET /orders/{id}/receipt`
- **Note**: Hanya untuk order yang sudah closed.

---

## ⚠️ Status Codes
- **200**: OK / Success
- **201**: Created
- **400**: Bad Request (Misal: Meja sudah penuh)
- **401**: Unauthorized (Token salah/expired)
- **404**: Not Found (Data tidak ditemukan)
- **422**: Validation Error (Input tidak valid)
