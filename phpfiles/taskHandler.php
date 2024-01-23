<?php
session_start();
// Start the session
// Include the database connection file
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get task title and description from POST data
    $title = $_POST['task-title'];
    $description = $_POST['task-description'];
    $date = $_POST['task-date']; // Corrected from 'Date' to 'task-date'
    $time = $_POST['task-time']; // Corrected from 'Time' to 'task-time'
    $userID = $_SESSION['user']['id']; 

    // Insert task into database
    // Added quotes around $date and $time, and corrected the missing comma in the SQL query
    $query = "INSERT INTO Tasks (Title, Description, Date, Time, UserID) VALUES ('$title', '$description', '$date', '$time', '$userID')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die('Could not insert task: ' . mysqli_error($conn));
    }

    header('Location: ../taskmanagement.php');
    exit;
}

// Set the default timezone to your system's timezone
date_default_timezone_set('Asia/Manila');

$userID = $_SESSION['user']['id']; 
$query = "SELECT * FROM Tasks WHERE UserID = $userID";
$result = mysqli_query($conn, $query);
if (!$result) {
    die('Could not retrieve tasks: ' . mysqli_error($conn));
}

$tasks = array();
$currentDateTime = new DateTime(); // Get current date and time
while ($row = mysqli_fetch_assoc($result)) {
    // Get task date and time
    $taskDateTime = new DateTime($row['Date'] . ' ' . $row['Time']);

    // Convert 24-hour format time to 12-hour format
    $row['Time'] = $taskDateTime->format('g:i A');

    // Check if task is overdue
    if ($currentDateTime > $taskDateTime) {
        // Task is overdue
        $row['overdue'] = true;
    } else {
        // Task is not overdue
        $row['overdue'] = false;
    }

    $tasks[] = $row;
}

// Store tasks in session
$_SESSION['tasks'] = $tasks;