<?php
include('../connect.php');

$userId = $_POST['userId'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = mysqli_real_escape_string($conn, $_POST['userId']);
    $firstName = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $userBio = mysqli_real_escape_string($conn, $_POST['userBio']);
    $jobTitle = mysqli_real_escape_string($conn, $_POST['jobTitle']);
    $userDescription = mysqli_real_escape_string($conn, $_POST['userDescription']);
    $educationalDetails = mysqli_real_escape_string($conn, $_POST['educationalDetails']);
    $employmentHistoryDetails = mysqli_real_escape_string($conn, $_POST['employmentHistoryDetails']);
    $certificationDetails = mysqli_real_escape_string($conn, $_POST['certificationDetails']);
    $contactDetails = mysqli_real_escape_string($conn, $_POST['contactDetails']);
    $skillDescription = mysqli_real_escape_string($conn, $_POST['skillDescription']);

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
