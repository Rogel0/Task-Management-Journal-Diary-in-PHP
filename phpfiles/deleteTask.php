<?php
include('connection.php');

$taskId = $_POST['task-id'];

$stmt = $conn->prepare("DELETE FROM tasks WHERE Id = ?");
$stmt->bind_param("i", $taskId);
$stmt->execute();

header("Location: ../taskmanagement.php");
?>