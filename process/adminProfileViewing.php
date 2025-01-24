<?php
include("../connect.php");
$userInfoID = $_GET['userInfoID'];
$query = $conn->prepare("
    SELECT user.firstName, user.lastName, user.username, userinfo.*, portfolio.projectImage, portfolio.projectTitle
    FROM user
    INNER JOIN userinfo ON user.userInfoID = userinfo.userInfoID
    LEFT JOIN portfolio ON userinfo.userInfoID = portfolio.userInfoID
    WHERE userinfo.userInfoID = ?
");
$query->bind_param("i", $userInfoID);
$query->execute();
$result = $query->get_result();
$user = $result->fetch_assoc();

$portfolios = [];
if ($user) {

    $firstName = $user['firstName'];
    $lastName = $user['lastName'];
    $username = $user['username'];
    $shortDescription = $user['userBio'];
    $fullDescription = $user['userDescription'] ?? "Description not available.";
    $jobTitle = $user['jobTitle'] ?? "Job Title not available.";
    $contactDetails = $user['contactDetails'] ?? "Contact details not available.";
    $educationalDetails = $user['educationalDetails'] ?? "Education details not available.";
    $employmentHistory = $user['employmentHistoryDetails'] ?? "Employment history not available.";
    $certifications = $user['certificationDetails'] ?? "Certification details not available.";
    $skills = $user['skillDescription'] ?? "Skills not available.";
    $profileImage = $user['userProfileImage'] ?? "defaultProfileImage.png";

    do {
        if (!empty($user['projectImage']) && !empty($user['projectTitle'])) {
            $portfolios[] = [
                'projectImage' => $user['projectImage'],
                'projectTitle' => $user['projectTitle']
            ];
        }
    } while ($user = $result->fetch_assoc());


} else {
    $firstName = $lastName = $username = $fullDescription = "User not found.";
}
?>