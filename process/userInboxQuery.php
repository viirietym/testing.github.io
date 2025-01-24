<?php
    include("../connect.php");

    session_start();
    if (!isset($_SESSION['userID'])) {
        header("Location: ../index.php");
    }
    $userID = $_SESSION['userID'];


    // Fetch notifications for the current user
    $letterQuery = "SELECT * FROM letter WHERE userID = '$userID' ORDER BY letterID DESC";
    $letterResult = mysqli_query($conn, $letterQuery);
?>