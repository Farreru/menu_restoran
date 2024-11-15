<?php
date_default_timezone_set('Asia/Jakarta');

$conn = mysqli_connect("db_sample", "root", "", "menu_restoran", '3306');

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    };
    return $rows;
};

$judul = "Menu Restoran";
