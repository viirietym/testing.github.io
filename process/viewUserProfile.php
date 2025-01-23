<?php
include('../connect.php');

// session_start ();
// $userId = isset($_GET['userId']) ? $_GET['userId'] : '';
$userId = 16;

$query = "SELECT user.username, user.firstname, user.lastname,
    userinfo.userInfoID, userinfo.userProfileImage, userinfo.userBio, userinfo.jobTitle,
    userinfo.userDescription, userinfo.contactDetails,
    userinfo.educationalDetails, userinfo.employmentHistoryDetails,
    userinfo.certificationDetails, userinfo.skillDescription
FROM user
JOIN userinfo ON user.userInfoID = userinfo.userInfoID
WHERE user.userId = '$userId'";

$result = executeQuery($query);
?>