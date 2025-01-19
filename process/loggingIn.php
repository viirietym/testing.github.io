<?php 

session_start();
session_destroy();
session_start();

$error = "";

if (isset($_POST ['btnLogin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // CLEAN INJECTION
    $email = str_replace('\'', '', $email);
    $password = str_replace('\'', '', $password);

    $loginQuery = "SELECT * FROM user WHERE (username = '$email' OR email = '$email') AND password = '$password' AND role = 'user'";
    $loginResult = executeQuery($loginQuery);

    $_SESSION['userID'] = "";
    $_SESSION['username'] = "";
    $_SESSION['firstName'] = "";
    $_SESSION['lastName'] = "";
    $_SESSION['email'] = "";
    $_SESSION['role'] = "";
   



    if (mysqli_num_rows($loginResult) > 0) {
        while ($user = mysqli_fetch_assoc($loginResult)) {
            $_SESSION['userID'] = $user['userID'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['firstName'] = $user['firstName'];
            $_SESSION['lastName'] = $user['lastName'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            header("Location: user/userJobList.php");
        }
    } else {
        $error = "NO USER";
    }
}


if (isset($_POST ['btnAdminLogin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // CLEAN INJECTION
    $email = str_replace('\'', '', $email);
    $password = str_replace('\'', '', $password);

    $loginQuery = "SELECT * FROM user WHERE (username = '$email' OR email = '$email') AND password = '$password' AND role = 'admin'";
    $loginResult = executeQuery($loginQuery);

    $_SESSION['userID'] = "";
    $_SESSION['username'] = "";
    $_SESSION['firstName'] = "";
    $_SESSION['lastName'] = "";
    $_SESSION['email'] = "";
    $_SESSION['role'] = "";
   



    if (mysqli_num_rows($loginResult) > 0) {
        while ($user = mysqli_fetch_assoc($loginResult)) {
            $_SESSION['userID'] = $user['userID'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['firstName'] = $user['firstName'];
            $_SESSION['lastName'] = $user['lastName'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            header("Location: adminJobList.php");
        }
    } else {
        $error = "NO USER";
    }
}

?>