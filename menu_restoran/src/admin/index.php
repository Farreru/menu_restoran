<?php require_once "checkSession.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "link.php"; ?>
</head>

<body id="page-top">

    <div id="wrapper">

        <?php include "sidebar.php"; ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <?php include "topbar.php"; ?>

                <div class="container-fluid">

                    <?php
                    // Query untuk total pendapatan bulan ini
                    $sqlPendapatan = "SELECT 
                    DATE_FORMAT(pesanan.tanggal_pesanan, '%Y-%m') as bulan,
                    SUM(produk.harga * pesanan.jumlah) as total_pendapatan
                    FROM pesanan 
                    JOIN produk ON pesanan.id_produk = produk.id 
                    WHERE YEAR(pesanan.tanggal_pesanan) = YEAR(CURDATE()) 
                    AND MONTH(pesanan.tanggal_pesanan) = MONTH(CURDATE())
                    GROUP BY DATE_FORMAT(pesanan.tanggal_pesanan, '%Y-%m')";

                    $resultPendapatan = $conn->query($sqlPendapatan);

                    if ($resultPendapatan->num_rows > 0) {
                        $rowPendapatan = $resultPendapatan->fetch_assoc();
                        $pendapatan = number_format($rowPendapatan['total_pendapatan'], 2, ',', '.');
                    } else {
                        $pendapatan = '0';
                    }

                    // Query untuk jumlah order bulan ini
                    $sqlOrder = "SELECT COUNT(*) as jumlah_order
                    FROM pesanan 
                    WHERE YEAR(tanggal_pesanan) = YEAR(CURDATE()) 
                    AND MONTH(tanggal_pesanan) = MONTH(CURDATE())";

                    $resultOrder = $conn->query($sqlOrder);
                    $rowOrder = $resultOrder->fetch_assoc();
                    $jumlahOrder = $rowOrder['jumlah_order'];
                    ?>
                    <div class="d-sm-flex align-items-center mb-4">
                        <!-- <div class="box">
                            <div class="title">50</div>
                            <div class="text">Pengunjung</div>
                            <img src="../gambar_produk/Group41.png" alt="">
                        </div> -->
                        <div class="box">
                            <div class="title"><?= $jumlahOrder; ?></div>
                            <div class="text">Order Bulan Ini</div>
                            <img src="../gambar_produk/Group43.png" alt="">
                        </div>
                        <div class="box ml-4">
                            <div class="title">Rp. <?= $pendapatan; ?></div>
                            <div class="text">Pendapatan Bulan Ini</div>
                            <!-- <img src="../gambar_produk/Group 45.png" alt=""> -->
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12 col-md-6 mb-3">
                            <div class="box-text center">
                                <div class="title">Selamat Datang !</div>
                                <div class="text">Selamat datang di website sistem Menu Restoran. Website ini akan membantu kamu melakukan transaksi dan pengelolaan administrasi kafe dengan mudah. Ayo buat pesananmu sekarang disini !</div>
                                <img src="../gambar_produk/Group 47.png" alt="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <div class="box-text">
                                <div class="title">Jumlah porsi terjual</div>
                                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                <script src="graph.js"></script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include "footer.php"; ?>

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include "plugin.php"; ?>
</body>

</html>