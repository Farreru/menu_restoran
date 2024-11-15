<ul class="navbar-nav bg-black text-yellow sidebar sidebar-dark accordion" id="accordionSidebar">
    <style>
        .nav-item.active .nav-link {
            background-color: #ba4706;
        }

        .hidden img {
            display: none;
        }
    </style>
    <?php
    $halaman = basename($_SERVER['PHP_SELF']);
    ?>
    <a class="sidebar-brand text-white d-flex align-items-center justify-content-center" href="index.php" style="font-size: 9pt;" id="brandLink">
        <img src="../img/kopi.png" width="70"> <span style="margin-top: 20px; color: #ba4706; font-size: 40px;">. . .</span>
    </a>
    <br>
    <hr class="sidebar-divider my-0">

    <li class="nav-item  <?php if ($halaman == 'index.php') echo 'active'; ?>">
        <a class="nav-link text-white" href="index.php">
            <img src="../img/home.png" width="15px">&nbsp;
            <span>Home</span></a>
    </li>

    <!-- <li class="nav-item <?php if ($halaman == 'user.php') echo 'active'; ?>">
        <a class="nav-link text-white" href="user.php">
            <img src="../img/user.png" width="15px">&nbsp;
            <span>user</span></a>
    </li> -->
    <li class="nav-item <?php if ($halaman == 'kasir.php') echo 'active'; ?>">
        <a class="nav-link text-white" href="kasir.php">
            <img src="../img/kasir.png" width="15px">&nbsp;
            <span>Menu</span></a>
    </li>

    <hr class="sidebar-divider">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<script>
    document.getElementById('sidebarToggle').addEventListener('click', function() {
        var brandLink = document.getElementById('brandLink');
        brandLink.classList.toggle('hidden');
    });
</script>