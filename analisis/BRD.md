# **Dokumen Persyaratan Bisnis (BRD)**  
### **Proyek:** Website Menu Restoran  
**Versi:** 1.0  
**Tanggal:** 15 November 2024  

---

## **1. Tujuan Proyek**
- **Objektif**: Aplikasi ini bertujuan untuk mempermudah pengelolaan menu dan transaksi pada website Menu Restoran, baik untuk admin yang mengelola data produk dan pengguna, serta pengguna yang dapat memesan produk melalui sistem online.

---

## **2. Fitur Utama**

### **Untuk Admin**
- **Manajemen Pengguna**: Admin dapat melakukan operasi CRUD (Create, Read, Update, Delete) pada data pengguna.
- **Manajemen Produk**: Admin dapat melakukan operasi CRUD pada data produk yang ditawarkan di cafe.
- **Laporan Penjualan**: Admin dapat melihat dan menghasilkan laporan penjualan serta mengekspor laporan dalam format PDF atau Excel.
- **Transaksi**: Admin dapat memproses pesanan yang dilakukan oleh pengguna, termasuk pembelian produk dan pembayaran.
  
### **Untuk Pengguna**
- **Transaksi**: Pengguna dapat melihat produk, memilih produk yang diinginkan, menambahkannya ke keranjang, dan melakukan checkout dengan sistem pembayaran melalui QR Code.

---

## **3. Persyaratan Fungsional**

### **Sistem Login**
- **Akses Berdasarkan Peran**: Pengguna dan admin dapat login dengan hak akses yang berbeda.
  - **Admin**: Akses menu admin untuk mengelola produk, pengguna, dan melihat laporan.
  - **Pengguna**: Akses menu untuk memesan produk dan melihat katalog.

### **Menu Pengguna**
- **Admin**: Mengelola data pengguna dan produk.
- **Pengguna**: Melakukan transaksi pembelian produk.

---

## **4. Persyaratan Non-Fungsional**

- **Kegunaan**: Antarmuka pengguna yang mudah dan intuitif baik untuk admin maupun pengguna.
- **Keamanan**: 
  - Hanya admin yang dapat mengelola data produk dan pengguna.
  - Pengguna hanya dapat melakukan pembelian produk dan tidak dapat mengelola data.

---