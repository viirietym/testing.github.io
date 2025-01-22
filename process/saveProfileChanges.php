<?php
include('../connect.php');

session_start();

$userId = $_POST['userId'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['userId'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $username = $_POST['username'];
    $userBio = $_POST['userBio'];
    $jobTitle = $_POST['jobTitle'];
    $userDescription = $_POST['userDescription'];
    $skillDescription = $_POST['skillDescription'];
    $contactDetails = $_POST['contactDetails'];
    $portfolioTitle = $_POST['projectTitle'];

    // Handle project image upload
    if (isset($_FILES['projectImage']) && $_FILES['projectImage']['error'] === UPLOAD_ERR_OK) {
        $htmlfileupload = $_FILES['projectImage']['name'];
        $htmlfileuploadTMP = $_FILES['projectImage']['tmp_name'];

        $htmlfileExt = substr($htmlfileupload, strripos($htmlfileupload, '.'));
        $htmlnewname = date("YMdHisu");
        $htmlnewfilename = $htmlnewname . $htmlfileExt;

        $htmlfolder = "../assets/image/userImage/";

        if (move_uploaded_file($htmlfileuploadTMP, $htmlfolder . $htmlnewfilename)) {
            $projectImage = $htmlnewfilename;
        }
    }

    // Handle user profile image upload
    if (isset($_FILES['userProfileImage']) && $_FILES['userProfileImage']['error'] === UPLOAD_ERR_OK) {
        $htmlfileupload = $_FILES['userProfileImage']['name'];
        $htmlfileuploadTMP = $_FILES['userProfileImage']['tmp_name'];

        $htmlfileExt = substr($htmlfileupload, strripos($htmlfileupload, '.'));
        $htmlnewname = date("YMdHisu");
        $htmlnewfilename = $htmlnewname . $htmlfileExt;

        $htmlfolder = "../assets/image/userImage/";

        if (move_uploaded_file($htmlfileuploadTMP, $htmlfolder . $htmlnewfilename)) {
            $profileImage = $htmlnewfilename;
        }
    }

    // Update user and userinfo
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
        userinfo.skillDescription = '$skillDescription',
        userinfo.contactDetails = '$contactDetails'";

    if (isset($profileImage)) {
        $query .= ", userinfo.userProfileImage = '$profileImage'";
    }

    $query .= " WHERE user.userId = '$userId'";

    executeQuery($query);

    // Update portfolio title if provided
    if (!empty($portfolioTitle)) {
        $portfolioID = $_POST['portfolioID'];

        $portfolioQuery = "
        UPDATE portfolio
        SET projectTitle = '$portfolioTitle'
        WHERE portfolioID = '$portfolioID'";

        executeQuery($portfolioQuery);
    }

    if (isset($projectImage)) {
        $portfolioQuery = "
        UPDATE portfolio
        SET projectImage = '$projectImage'
        WHERE userInfoID = (SELECT userInfoID FROM user WHERE userId = '$userId')";

        executeQuery($portfolioQuery);
    }

    header("Location: ../user/userProfile.php?userId=$userId");
    exit;
}
?>