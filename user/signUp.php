<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STBjobs: Sign up</title>
    <link rel="icon" href="../assets/image/userImage/stbLogo.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/userCSS/signUp.css">
</head>

<body>
    <?php
    include("../assets/shared/footerAdmin.php");
    ?>



    <div class="container my-5" id="signUpForm">
        <div class="row">
            <div class="col-12 signUpTitle">
                <p>SIGN UP TO STBJOBS</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 signUpField">
                <form method="POST" class="Post">
                    <div class="mb-3 fullname">
                        <div class="col-12 col-md-6 name">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" name="firstname" class="form-control frm-sign" id="firstname" required>
                        </div>
                        <div class="col-12 col-md-6 name">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" name="lastname" class="form-control frm-sign" id="lastname" required>
                        </div>
                    </div>
                    <div class="mb-3 accountDetail">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control frm-sign" id="username" required>
                    </div>
                    <div class="mb-3 accountDetail">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control frm-sign" id="email" required>
                    </div>
                    <div class="mb-3 accountDetail">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control frm-sign" id="password" required>
                    </div>
                    <div class="mb-3 accountDetail">
                        <label for="confirmpassword" class="form-label">Confirm Password</label>
                        <input type="password" name="confirmpassword" class="form-control frm-sign" id="confirmpassword"
                            required>
                    </div>
                    <div class="mb-3 submit">
                        <button name="btnSign" type="submit" class="btnSign">Proceed</button>
                    </div>
                </form>
            </div>
        </div>
    </div>





    <?php
    include("../assets/shared/footer.php");
    ?>
</body>

</html>