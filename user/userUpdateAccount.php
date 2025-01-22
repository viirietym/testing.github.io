<?php
include('../connect.php');

session_start ();

$message = '';

if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];

    $query = "SELECT email, password FROM user WHERE userId = '$userId'";
    $result = executeQuery($query);
    $user = mysqli_fetch_assoc($result);

    if (isset($_GET['email'], $_GET['password'], $_GET['newPassword'], $_GET['confirmpassword'])) {
        $newEmail = $_GET['email'] ?: $user['email'];
        $oldPassword = $_GET['password'];
        $newPassword = $_GET['newPassword'];
        $confirmPassword = $_GET['confirmpassword'];

        if ($oldPassword === $user['password']) {
            $emailCheckQuery = "SELECT * FROM user WHERE email = '$newEmail' AND userId != '$userId'";
            $emailCheckResult = executeQuery($emailCheckQuery);

            if (mysqli_num_rows($emailCheckResult) > 0) {
                $message = "<p style='color:red;'>The email is already in use by another account.</p>";
            } else {
                if ($newPassword === $confirmPassword) {
                    if (!empty($newPassword)) {
                        $updateQuery = "UPDATE user SET email = '$newEmail', password = '$newPassword' WHERE userId = '$userId'";
                    } else {
                        $updateQuery = "UPDATE user SET email = '$newEmail' WHERE userId = '$userId'";
                    }
                    executeQuery($updateQuery);

                    header("Location: userProfile.php?userId=" . $userId);
                    exit;
                } else {
                    $message = "<p style='color:red;'>New passwords do not match.</p>";
                }
            }
        } else {
            $message = "<p style='color:red;'>Incorrect password.</p>";
        }
    }
}
?>


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
    <?php include("../assets/shared/navbarHome.php"); ?>

    <div class="container update" style="margin-top: 150px;">
        <div id="updateForm">
            <div class="row">
                <div class="col-12 updateTitle">
                    <p>UPDATE ACCOUNT</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 updateField">
                    <?php if (!empty($message))
                        echo $message; ?>
                    <form method="GET" class="Post">
                        <input type="hidden" name="userId" value="<?php echo $userId; ?>">
                        <div class="mb-3 accountDetail">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control frm-sign" id="email"
                                placeholder="Enter your email" value="<?php echo $user['email']; ?>">
                        </div>
                        <div class="mb-3 accountDetail">
                            <label for="password" class="form-label">Old Password</label>
                            <input type="password" name="password" class="form-control frm-sign" id="password"
                                placeholder="Enter your old password" required>
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

    <?php include("../assets/shared/footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>
</html>
