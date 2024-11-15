# **Tujuan Aplikasi**
Aplikasi ini dirancang untuk mempermudah pengelolaan menu dan transaksi pada website Menu Restoran. 
Sistem ini memungkinkan **Admin** untuk mengelola data produk dan pengguna, serta mengakses laporan penjualan. 
Di sisi lain, **Pengguna** dapat melihat produk, memilih produk yang diinginkan, dan melakukan pembelian melalui sistem online dengan pembayaran QR Code.

# **Aktor**
## **Admin**
1. **Manajemen Pengguna**: Admin dapat melakukan operasi CRUD (Create, Read, Update, Delete) pada data pengguna.
2. **Manajemen Produk**: Admin dapat mengelola data produk yang tersedia di restoran (CRUD produk).
3. **Laporan Penjualan**: Admin dapat melihat laporan penjualan dan mengekspor laporan dalam format PDF atau Excel.
4. **Transaksi**: Admin dapat memproses transaksi pesanan pengguna, mulai dari pembelian hingga pembayaran.

## **Pengguna**
1. **Transaksi**: Pengguna dapat melihat menu produk, memilih produk yang ingin dibeli, menambahkannya ke keranjang, dan melakukan checkout dengan pembayaran melalui QR Code.
2. **Tidak Memiliki Akses untuk Mengelola Data**: Pengguna hanya bisa melakukan pembelian dan tidak memiliki akses untuk mengelola data pengguna atau produk.

# **Fitur dan Fungsionalitas**

## **Fitur untuk Admin**
1. **Manajemen Pengguna**:
   - Admin dapat menambah, mengedit, atau menghapus data pengguna.
2. **Manajemen Produk**:
   - Admin dapat mengelola data produk, termasuk menambah, mengedit, atau menghapus produk.
3. **Laporan Penjualan**:
   - Admin dapat menghasilkan laporan penjualan dan mengekspor laporan dalam format PDF atau Excel.
4. **Transaksi**:
   - Admin dapat memproses transaksi, termasuk memvalidasi pesanan, mengonfirmasi pembayaran, dan mengelola status pesanan.

## **Fitur untuk Pengguna**
1. **Melihat Katalog Produk**: 
   - Pengguna dapat melihat daftar produk yang ditawarkan oleh restoran.
2. **Menambah Produk ke Keranjang**:
   - Pengguna dapat memilih produk yang ingin dibeli dan menambahkannya ke keranjang belanja.
3. **Checkout dan Pembayaran**:
   - Pengguna dapat melakukan checkout untuk menyelesaikan pembelian produk dengan menggunakan sistem pembayaran melalui QR Code.
4. **Proses Pembayaran**:
   - Pengguna dapat memindai QR Code untuk melakukan pembayaran dan mendapatkan konfirmasi transaksi.

