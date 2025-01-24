<?php
include("../connect.php");
include("../process/loggingIn.php");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>STBjobs | Login</title>
    <link rel="icon" href="../assets/image/adminImage/stbLogoAdmin.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/adminCSS/loginAdmin.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-end">
            <div class=" loginContainer col-md-5">
                <div class="card">
                    <div class="imgContainer">
                        <img src="../assets/image/adminImage/stbLogoAdmin.png" alt="" class="logo">
                        <div class="logoText">ADMIN</div>
                    </div>
                    <div class="tagline">
                        Connecting opportunities in Santo Tomas, Batangas
                    </div>
                    <?php if ($error == "NO USER") { ?>
                        <div class="alert alert-danger mb-3" role="alert">
                            Invalid email or password
                        </div>
                    <?php } ?>
                    <form method="POST">
                        <div class="email">
                            <label for="email" class="form-label">Email or Username</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="password">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="buttonContainer">
                            <button type="submit" class="btn btn-success rounded-5 login-button"
                                name="btnAdminLogin">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>