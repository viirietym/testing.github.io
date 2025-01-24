<?php
include("../connect.php");

session_start();
if (!isset($_SESSION['userID'])) {
    header("Location: ../index.php");
}

if (isset($_GET['letterID'])) {
    $letterID = $_GET['letterID'];
} else {
    echo 'No letter ID specified.';
}

$userID = $_SESSION['userID'];


$letterQuery = "SELECT * FROM letter JOIN user on letter.userID = user.userID JOIN userinfo on userinfo.userInfoID = user.userInfoID WHERE letterID = '$letterID'";
$letterResult = mysqli_query($conn, $letterQuery);

if (mysqli_num_rows($letterResult) > 0) {
    $letterRow = mysqli_fetch_assoc($letterResult);

    $letterContent = $letterRow['letterContent'];
    $userID = $letterRow['userID'];
    $isRead = $letterRow['isRead'];
    $firstName = $letterRow['firstName'];
    $lastName = $letterRow['lastName'];
    $email = $letterRow['email'];
    $isAccepted = $letterRow['isAccepted'];  
    $userProfileImage = $letterRow['userProfileImage']; 

} else {
    echo "Letter not found.";
}
?>