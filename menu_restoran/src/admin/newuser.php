<?php
if (session_status() == PHP_SESSION_NONE) {
    // Session has not started, so start it
    session_start();
}

require "../functions.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Hash password sebelum menyimpannya
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Masukkan data ke database
    $stmt = $conn->prepare("INSERT INTO admin (username, password, email, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $hashed_password, $email, $role);

    if ($stmt->execute()) {
        echo "User berhasil ditambahkan ke database.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();

    // Redirect setelah insert (opsional)
    header('Location: user.php');
    exit;
}

$conn->close();
