<?php
include("connect.php");
include("./process/loggingIn.php");

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>STBjobs | Login or Signup</title>
    <link rel="icon" href="assets/image/userImage/stbLogo.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/userCSS/loginUser.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-end">
            <div class="loginContainer col-md-5">
                <form method="POST">
                    <div class="card">
                        <div class="imgContainer">
                            <img src="./assets/image/userImage/stbLogoUser.png" alt="" class="logo">
                            <img src="./assets/image/userImage/stbUserLogin.png" alt="" class="logo">
                        </div>
                        <div class="tagline">
                            Connecting opportunities in Santo Tomas, Batangas
                        </div>
                        <?php if ($error == "NO USER") { ?>
                            <div class="alert alert-danger mb-3" role="alert">
                                Invalid email or password
                            </div>
                        <?php } ?>

                        <div class="email">
                            <label for="email" class="form-label">Email or Username</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="password">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control frm-sign" id="password" name="password" required>
                        </div>
                        <div class="buttonContainer">
                            <button type="submit" class="btn btn-success rounded-5 login-button"
                                name="btnLogin">Login</button>
                        </div>
                        <div class="signUp">
                            <h6>First time here? <span><a href="./user/signUp.php" class="sign-up-link">Create an
                                        account</a></span>
                            </h6>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>