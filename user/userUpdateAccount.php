<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STBjobs | Update Account</title>
    <link rel="icon" href="../assets/image/userImage/stbLogo.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/userCSS/userUpdateAccount.css">
</head>

<body>
    <?php
    include("../assets/shared/footerAdmin.php");
    ?>

    <div class="container update">
        <div id="updateForm">
            <div class="row">
                <div class="col-12 updateTitle">
                    <p>UPDATE ACCOUNT</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 updateField">
                    <form method="POST" class="Post">
                        <div class="mb-3 accountDetail">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control frm-sign" id="email"
                                placeholder="Enter your email">
                        </div>
                        <div class="mb-3 accountDetail">
                            <label for="password" class="form-label">Old Password</label>
                            <input type="password" name="password" class="form-control frm-sign" id="password"
                                placeholder="Enter your old password">
                        </div>
                        <div class="mb-3 accountDetail">
                            <label for="newPassword" class="form-label">New Password</label>
                            <input type="password" name="newPassword" class="form-control frm-sign" id="newPassword"
                                placeholder="Enter your new password">
                        </div>
                        <div class="mb-3 accountDetail">
                            <label for="confirmpassword" class="form-label">Confirm Password</label>
                            <input type="password" name="confirmpassword" class="form-control frm-sign"
                                id="confirmpassword" placeholder="Confirm your new password">
                        </div>
                        <div class="mb-3 text-center">
                            <button name="btnUpdate" type="submit" class="btnUpdate">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    include("../assets/shared/footer.php");
    ?>
</body>

</html>