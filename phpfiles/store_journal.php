<?php
session_start(); // start a session

include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['entry-title'];
    $text = $_POST['entry-text'];
    $created_at = date('Y-m-d H:i:s'); // current date and time

    if (!isset($_SESSION['user']['id'])) {
        echo "User is not logged in";
        exit;
    }

    $user_id = $_SESSION['user']['id']; // get the user_id from the session

    $stmt = $conn->prepare("INSERT INTO journal_entries (title, text, created_at, user_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $title, $text, $created_at, $user_id);

    if ($stmt->execute()) {
        echo "New record created successfully";
        header("Location: ../journaldiary.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>