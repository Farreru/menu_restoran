<?php

session_start();
include '../functions.php';

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}
