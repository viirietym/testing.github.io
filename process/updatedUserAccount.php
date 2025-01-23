<?php
include('../connect.php');
include('../process/sessionStarting.php');

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

                    header("Location: ../user/userProfile.php?userId=$userId");
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