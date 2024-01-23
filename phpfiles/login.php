<?php
session_start(); // Start the session at the beginning of your script
include('connection.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc(); // Fetch the user data

        // Verify the password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = array('id' => $user['id'], 'username' => $user['username']); // Store the user's ID and username in the session
            header("Location: ../taskmanagement.php"); // Redirect to main.php
        } else {
            echo "<script>alert('Login failed. Invalid username or password.')</script>";
            echo "<script>window.location.href='../index.php'</script>";
        }
    } else {
        echo "<script>alert('Login failed. Invalid username or password.')</script>";
        echo "<script>window.location.href='../index.php'</script>";
    }
}

// Close the database connection
mysqli_close($conn);
?>