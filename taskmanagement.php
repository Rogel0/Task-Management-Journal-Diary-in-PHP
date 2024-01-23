<?php
session_start(); // Start the session
include("./phpfiles/connection.php");
include("./phpfiles/taskHandler.php");
$tasks = $_SESSION['tasks'];



if (isset($_SESSION['success'])) {
  echo "<div id='success-message' style='padding: 20px; margin-bottom: 20px; color: #3c763d; background-color: #dff0d8; border: 1px solid #d6e9c6; border-radius: 4px;'>";
  echo $_SESSION['success'];
  echo "</div>";
  // unset the session variable so it doesn't keep showing up
  unset($_SESSION['success']);
}

if (isset($_SESSION['error'])) {
  echo "<div id='success-message' style='padding: 20px; margin-bottom: 20px; color: black; background-color: #FF6868; border: 1px solid #DCFFB7; border-radius: 4px;'>";
  echo $_SESSION['error'];
  echo "</div>";
  // unset the session variable so it doesn't keep showing up
  unset($_SESSION['error']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Style links css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./style/tasks.css">
  <title>Teddy Task</title>
</head>

<body style="background-color: #F2F1EB;">
  <nav class="navbar navbar-expand-lg bg-primary navbar-dark py-2 fixed-top">
    <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav ms-auto align-items-center justify-content-center">
          <h1 class=" welcome-text">Welcome, <?php echo $_SESSION['user']['username']; ?>!</h1>
        </ul>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-gear text-warning px-1"></i><strong class="text-dark">Setting</strong>
              </a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#password" href="#">Change Password</a></li>
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logout" href="#">Log out</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <button class="btn d-md-flex btn-info"><a href="journaldiary.php" target="_self" class="m-0 p-0 nav-link text-dark">Journal Diary</a></button>
      <img class="img-fluid float-start d-md-flex img-logo" src="./image/logo.png" alt="book" srcset="">
      <a href="homepage.php" class="navbar-brand d-md-flex">TEDDY Book</a>
    </div>
  </nav>

  <div class="container mt-5" >
    <div class="row pt-5">
      <div class="col m-md-3 px-5 m-3 " ">
        <form id="create-task-form" method="post" action="phpfiles/taskHandler.php" >
          <h2>Create Task</h2>
          <input type="text" id="task-title" name="task-title" placeholder="Task Title">
          <textarea id="task-description" name="task-description" placeholder="Task Description"></textarea>
          <label for="task-date">Date:</label>
          <input type="date" id="task-date" name="task-date" style="width: 100%; padding: 10px; margin-bottom: 20px; border: 3px solid #ccc; border-radius: 4px;">
          <label for="task-time">Time:</label>
          <input type="time" id="task-time" name="task-time" style="width: 100%; padding: 10px; margin-bottom: 20px; border: 3px solid #ccc; border-radius: 4px;">
          <button type="submit" class="Create btn btn-success mx-5">
            <span class="text-warning mx-1"><i class="bi bi-journal-plus "></i></span>Create Task
          </button>

        </form>
        <div class="task-title-container">
          <h2>Tasks</h2>
        </div>
        <div id="task-list">

          <?php foreach ($tasks as $task) : ?>
            <div class="task-item" <?php echo $task['overdue'] ? 'style="background-color: #f8d7da;"' : ''; ?>>
              <div>
                <h3><?php echo $task['Title']; ?></h3>
                <?php if ($task['overdue']) : ?>
                  <p style="color: red;">This task is overdue</p>
                <?php endif; ?>
                <p class="short-description" id="description-<?php echo $task['ID']; ?>">
                  <?php echo $task['Description']; ?>
                  <a href="#" class="see-more-link">See More</a>
                </p>
                <p style="font-size: 14px; color: #333; margin-bottom: 10px;">Date: <?php echo $task['Date']; ?></p>
                <p style="font-size: 14px; color: #333; margin-bottom: 10px;">Time: <?php echo $task['Time']; ?></p>
                <input type="checkbox" id="task-<?php echo $task['ID']; ?>" <?php echo isset($task['completed']) && $task['completed'] ? 'checked' : ''; ?> onchange="updateTaskStatus(<?php echo $task['ID']; ?>, this.checked)" class="task-checkbox">
                <label for="task-<?php echo $task['ID']; ?>" class="completed-text">Completed</label>
                <form method="post" action="./phpfiles/deleteTask.php" style="display: inline;">
                  <input type="hidden" name="task-id" value="<?php echo $task['ID']; ?>">
                  <button type="submit" class="delete-button">Delete</button>
                </form>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="password" tabindex="-1" aria-labelledby="diaryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content p-4 m-2">
        <div class="modal-header">
          <h5 class="modal-title text-success" id="diaryLabel">Change Password</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="./phpfiles/changepassword_taskmanagement.php" method="post">
          <!-- <div class="mb-3 row container pt-2 mb-3">
            <label for="CurrentPassword" class="col-sm-2 col-form-label px-2">Current Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control mt-3" id="CurrentPassword" name="current_password">
            </div>
          </div> -->
          <div class="mb-3 row container pt-2 mb-3">
            <label for="NewPassword" class="col-sm-2 col-form-label px-2">New Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control mt-3" id="NewPassword" name="new_password">
            </div>
          </div>
          <div class="modal-footer">
            <!-- <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>"> -->
            <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="id" class="btn btn-primary">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="diaryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-dark" id="diaryLabel">Logout</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body bg-warning">
          <h2 class="lead text-dark">Are you sure you want to login?</h2>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
          <a href="phpfiles/logout.php" class="btn btn-primary">Yes</a>
        </div>
      </div>
    </div>
  </div>


</body>
<!-- <script src="JS/task.js"></script> -->
<script src="./source/source2.js"></script>
<!--  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="./source/changepass_message.js"></script>
</html>