<?php
include('../connect.php');

$userId = $_POST['userId'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['userId'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $username = $_POST['username'];
    $userBio = $_POST['userBio'];
    $jobTitle = $_POST['jobTitle'];
    $userDescription = $_POST['userDescription'];
    $educationalDetails = $_POST['educationalDetails'];
    $employmentHistoryDetails = $_POST['employmentHistoryDetails'];
    $certificationDetails = $_POST['certificationDetails'];
    $contactDetails = $_POST['contactDetails'];
    $skillDescription = $_POST['skillDescription'];

    if (isset($_FILES['userProfileImage']) && $_FILES['userProfileImage']['error'] === UPLOAD_ERR_OK) {
        $htmlfileupload = $_FILES['userProfileImage']['name'];
        $htmlfileuploadTMP = $_FILES['userProfileImage']['tmp_name'];
    
        $htmlfileExt = substr($htmlfileupload, strripos($htmlfileupload, '.'));
        $htmlnewname = date("YMdHisu");
        $htmlnewfilename = $htmlnewname . $htmlfileExt;
    
        $htmlfolder = "../assets/image/user/userProfile";
    
        if (move_uploaded_file($htmlfileuploadTMP, $htmlfolder . '/' . $htmlnewfilename)) {
            $profileImage = $htmlnewfilename;
        }
    }
    

    $query = "
    UPDATE userinfo
    JOIN user ON user.userInfoID = userinfo.userInfoID
    SET 
        user.firstname = '$firstName',
        user.lastname = '$lastName',
        user.username = '$username',
        userinfo.userBio = '$userBio',
        userinfo.jobTitle = '$jobTitle',
        userinfo.userDescription = '$userDescription',
        userinfo.educationalDetails = '$educationalDetails',
        userinfo.employmentHistoryDetails = '$employmentHistoryDetails',
        userinfo.certificationDetails = '$certificationDetails',
        userinfo.skillDescription = '$skillDescription',
        userinfo.contactDetails = '$contactDetails'";

    if (isset($profileImage)) {
        $query .= ", userinfo.userProfileImage = '$profileImage'";
    }

    $query .= " WHERE user.userId = '$userId'";

    executeQuery($query);

    header("Location: ../user/userProfile.php?userId=$userId");
    exit;
}
