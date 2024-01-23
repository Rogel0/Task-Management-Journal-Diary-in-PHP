 <?php
include('connection.php');

$taskId = $_POST['task-id'];
$completed = $_POST['completed'];

// Connect to the database
// $conn = new mysqli($servername, $username, $password, $dbname);

$sql = "UPDATE tasks SET completed = ? WHERE ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $completed, $taskId);
$stmt->execute();

$stmt->close();
$conn->close();
?>