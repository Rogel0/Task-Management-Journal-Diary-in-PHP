<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <!-- Add this code at the end of your body tag -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Register in TEDD'</h5>

            </div>
            <div class="modal-body">
                <div class="card2 card border-0 px-4 py-5">
                    <form action="./phpfiles/register.php" method="POST">
                        <div class="row px-3">
                            <label class="mb-1">
                                <h6 class="mb-0 text-sm">Name</h6>
                            </label>
                            <input type="text" name="name" placeholder="Enter your Name" />
                        </div>
                        <div class="row px-3">
                            <label class="mb-1">
                                <h6 class="mb-0 text-sm">Email Address</h6>
                            </label>
                            <input type="text" name="email" placeholder="Enter a valid email address" />
                        </div>
                        <div class="row px-3">
                            <label class="mb-1">
                                <h6 class="mb-0 text-sm">Username</h6>
                            </label>
                            <input type="text" name="username" placeholder="Enter a Username" />
                        </div>
                        <div class="row px-3">
                            <label class="mb-1">
                                <h6 class="mb-0 text-sm">Password</h6>
                            </label>
                            <input type="password" name="password" placeholder="Enter password" />
                        </div>
                        <br>
                        <div class="row mb-3 px-3 d-flex justify-content-center">
                            <button type="submit" name="submit" class="btn btn-blue">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>