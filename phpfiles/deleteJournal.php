<?php
include('connection.php');

$taskId = $_POST['entry-id'];

$stmt = $conn->prepare("DELETE FROM journal_entries WHERE id = ?");
$stmt->bind_param("i", $taskId);
$stmt->execute();

header("Location: ../journaldiary.php");
?>