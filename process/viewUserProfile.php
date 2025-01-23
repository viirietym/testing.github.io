<?php
include('../connect.php');
include('../process/sessionStarting.php');

$userId = $_SESSION['userID'];

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