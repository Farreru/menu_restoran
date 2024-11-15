<?php
if (session_status() == PHP_SESSION_NONE) {
    // Session has not started, so start it
    session_start();
}

require "../functions.php";

if (isset($_POST['id_admin'])) {
    $id_admin = $_POST['id_admin'];

    // Pastikan untuk menangani SQL injection
    $stmt = $conn->prepare("DELETE FROM admin WHERE id = ?");
    $stmt->bind_param("i", $id_admin);

    if ($stmt->execute()) {
        echo "user dihapus dari database.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();

    header('Location: user.php');
}


$conn->close();
