<?php
session_start();
include("connection.php");

if (!isset($_SESSION['user']['id'])) {
    // Redirect to login page or show an error
    echo "id not set";
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_SESSION['user']['id'];
        $new_password = $_POST["new_password"];

        // Hash the new password before storing it
        $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
        $stmt->bind_param("si", $hashed_new_password, $id);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Password Successfully Changed";
            header("Location: ../journaldiary.php");
        } else {
            $_SESSION['error'] = "Password unsuccessfull Changed";
            header("Location: ../journaldiary.php");
        }

        $stmt->close();
    }
}
?>