<?php
include '../functions.php';

if ($_POST['action'] == 'get_cart_items') {
    // Query to fetch all items in the cart
    $query = "SELECT pesanan.id as id, produk.nama, produk.harga, produk.gambar, pesanan.jumlah 
              FROM pesanan 
              JOIN produk ON pesanan.id_produk = produk.id 
              WHERE pesanan.status = 'Dalam Keranjang'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Output HTML for each item
            echo '<div class="cart-item">';
            echo '<img src="../gambar_produk/' . htmlspecialchars($row['gambar']) . '" alt="' . htmlspecialchars($row['nama']) . '">';
            echo '<div class="cart-item-details">';
            echo '<p>' . htmlspecialchars($row['nama']) . '</p>';
            echo '<p>Harga: Rp' . number_format($row['harga'], 0, ',', '.') . '</p>';
            echo '<p>Jumlah: ' . htmlspecialchars($row['jumlah']) . '</p>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo 'Terjadi kesalahan dalam mengambil data.';
    }

    mysqli_close($conn);
}
