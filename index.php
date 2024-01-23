<?php
    // include("./phpfiles/connection.php")
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
    <link rel="shortcut icon" href="image/logo.png" type="image/x-icon">
  </head>
  <body className="snippet-body">
    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
      <div class="card card0 border-0">
        <div class="row d-flex">
          <div class="col-lg-6">
            <div class="card1 pb-5">
              <div class="row">
                <img src="image/logo.png" class="logo" />
              </div>
              <div class="row px-3 justify-content-center mt-4 mb-5 border-line">
                <img src="image/login.png" class="image" />
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card2 card border-0 px-4 py-5">
              <form method="post" action="./phpfiles/login.php">
                <div class="row px-3">
                  <label class="mb-1"><h6 class="mb-0 text-sm">Username</h6></label>
                  <input class="mb-4" type="text" name="username" placeholder="Enter a Username" />
                </div>
                <div class="row px-3">
                  <label class="mb-1"><h6 class="mb-0 text-sm">Password</h6></label>
                  <input type="password" name="password" placeholder="Enter password" />
                </div>
                <div class="row px-3 mb-4">
                  <div class="custom-control custom-checkbox custom-control-inline"></div>
                  <a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a>
                </div>
                <div class="row mb-3 px-3">
                  <button type="submit" name="submit" class="btn btn-blue text-center">Login</button>
                </div>
              </form>
              <div class="row mb-4 px-3">
                <small class="font-weight-bold">Don't have an account? <a href="#" class="text-danger" data-bs-toggle="modal" data-bs-target="#registerModal">Register</a></small>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-blue py-4">
          <div class="row px-3">
            <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2023. All rights reserved.</small>
            <div class="social-contact ml-4 ml-sm-auto">
              <span class="fa fa-facebook mr-4 text-sm"></span>
              <span class="fa fa-google-plus mr-4 text-sm"></span>
              <span class="fa fa-linkedin mr-4 text-sm"></span>
              <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include("./modals/register_modal.php") ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="source/source.js"></script>
    <script src="source/inputs_Error.js"></script>
  </body>
</html>