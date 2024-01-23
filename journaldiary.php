<?php

session_start();

include("./phpfiles/connection.php");
$result = $conn->query("SELECT * FROM journal_entries");

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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="./style/tasks.css"> -->
    <link rel="stylesheet" href="./style/Styles.css">
    <link rel="stylesheet" href="./style/journal.css">
    <title>Teddy Task</title>
</head>

<style>

</style>


<body style="background-color: #F2F1EB;">
    <nav class="navbar navbar-expand-lg bg-success navbar-dark py-2 fixed-top hidden max-height: 500px; overflow-y: auto;">
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
            <button class="btn btn-info"><a href="taskmanagement.php" target="_self" class="m-0 p-0 nav-link text-dark">My task</a></button>
            <img class="img-fluid float-start img-logo" src="./image/logo.png" alt="book" srcset="">
            <a href="homepage.php" class="navbar-brand">TEDDY Book</a>
        </div>
    </nav>


    <div class="parent-div" style="max-height: 90vh; overflow-x: auto;">
        <div id="journal-entry" style="margin-top: 40px; padding: 20px; width: 90%; margin-left: 5%;  border: 1px solid #ccc; border-radius: 5px;">
            <form id="upload-form" action="./phpfiles/store_journal.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="entry-title" class="entry-title" placeholder="Type your journal title here..." style="width: 20%; padding: 10px; margin-bottom: 10px;">
                <textarea name="entry-text" class="entry-text" placeholder="Type your journal entry here..." style="width: 100%; height: 80%; padding: 10px;"></textarea>
                <div class="entry-area" style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                    <div id="drop-area" style="display: flex; flex-direction: column; align-items: center; justify-content: center; border: 2px dashed #ccc; padding: 10px 0 90px 0; flex: 1;">
                        <i class="fas fa-cloud-upload-alt fa-3x"></i>
                        <span>Drag and drop images here</span>
                        <input id="file-input" type="file" name="image" accept="image/*" multiple hidden>
                    </div>
                    <div class="entry-images" style="display: flex; flex-direction: row; justify-content: flex-start; flex: 1; overflow-x: auto; gap: 10px;">
                        <!-- Images will be appended here -->
                    </div>
                </div>
                <button type="submit" style="background-color: #4CAF50; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;">Save</button>
            </form>

            <!-- Large view for images -->
            <div id="large-view" style="display: none;">
                <img src="" style="max-width: 100%;">
            </div>
            <div id="preview" style="display: flex; flex-direction: row; justify-content: flex-start; flex: 1; overflow-x: auto;"></div>
        </div>
        <br>
        <br>

        <section id="journal-entriess" style="max-height: 70vh; overflow-x: auto; padding: 20px; background-color: #f0f0f0; margin-left: 15%;">
            <?php while ($row = $result->fetch_assoc()) : ?>
                <div class="task-item" style="background-color: #ffffff; border-radius: 5px; padding: 20px; margin-bottom: 20px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1);">
                    <div>
                        <h3 style="font-size: 24px; color: #333; margin-bottom: 10px;"><?php echo $row['title']; ?></h3>
                        <p class="short-description" id="description-<?php echo $row['id']; ?>" style="font-size: 16px; color: #666; line-height: 1.5;">
                            <?php echo $row['text']; ?>
                            <a href="#" class="see-more-link" style="color: #007bff; text-decoration: none;">See More</a>
                        </p>
                        <p style="font-size: 14px; color: #333; margin-bottom: 10px;">Created at: <?php echo $row['created_at']; ?></p>
                        <form method="post" action="./phpfiles/deleteJournal.php" style="display: inline;">
                            <input type="hidden" name="entry-id" value="<?php echo $row['id']; ?>">
                            <button type="submit" class="delete-button" style="background-color: #dc3545; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Delete</button>
                        </form>
                    </div>
                </div>
            <?php endwhile; ?>
        </section>

        <!-- carouse -->


        <!-- Modals form -->
        <!-- Password -->
        <div class="modal fade" id="password" tabindex="-1" aria-labelledby="diaryLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content p-4 m-2">
                    <div class="modal-header">
                        <h5 class="modal-title text-success" id="diaryLabel">Change Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="./phpfiles/changepassword_journaldiary.php" method="post">
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="id" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Log out modals -->
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



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="./source/journal.js"></script>
        <script src="./source/changepass_message.js"></script>
        <!-- <script src="./source/source.js"></script>
    <script src="./source/source2.js"></script> -->
</body>

</html>