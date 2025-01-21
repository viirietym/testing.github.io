<?php
session_start();

if (!isset($_SESSION['userID'])) {
    header("Location: ../index.php");
    exit();
}

$userRole = $_SESSION['role'];

if ($userRole === 'admin' && strpos($_SERVER['PHP_SELF'], '/user/') !== false) {
    header("Location: ../admin/adminJobList.php");
    exit();
}

if ($userRole === 'user' && strpos($_SERVER['PHP_SELF'], '/admin/') !== false) {
    header("Location: ../user/userJobList.php");
    exit();
}
?>
