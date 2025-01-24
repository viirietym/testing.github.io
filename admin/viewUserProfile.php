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


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin View Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="../assets/css/adminCSS/navbarAdmin.css" rel="stylesheet">
    <link href="../assets/css/adminCSS/viewUserProfile.css" rel="stylesheet">
    <link rel="icon" href="../assets/image/adminImage/stbLogoAdmin.png">

</head>

<body>

    <?php
    include("../assets/shared/navbarAdmin.php");
    ?>

    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-12">
                <div class="profileHeader d-flex flex-column flex-md-row align-items-center">
                    <div class="profileImage">
                        <img src="../assets/image/user/userProfile/<?php echo htmlspecialchars($profileImage); ?>"
                            alt="Profile Image">
                        <span>Profile</span>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="profileText">

                            <h2 id="fullName"><?php echo htmlspecialchars($firstName . " " . $lastName); ?></h2>
                            <div id="editFullNameContainer" style="display:none">

                                <input type="text" id="editFirstName" class="textInput" placeholder="First Name">
                                <input type="text" id="editLastName" class="textInput" placeholder="Last Name">
                            </div>
                            <p id="username"><?php echo htmlspecialchars($username); ?></p>
                            <input type="text" id="editUsername" class="textInput" style="display:none">
                            <p id="shortDescription"><?php echo htmlspecialchars($shortDescription); ?></p>
                            <textarea id="editDescription" class="textInput" style="display:none; overflow:hidden;"
                                placeholder="Enter your description"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="profileContent">
                    <div class="contentLeft">
                        <div class="jobTitle">
                            <span id="jobTitleText"><?php echo htmlspecialchars($jobTitle); ?></span>
                            <input type="text" id="editJobTitle" class="textContent" style="display:none;">
                        </div>
                        <div class="fullDescription">
                            <b>Full Description:</b>
                            <p id="fullDescriptionText"><?php echo htmlspecialchars($fullDescription); ?></p>
                            <textarea id="editFullDescription" class="textContent"
                                style="display:none; overflow:hidden;"></textarea>
                        </div>
                        <div class="row justify-content-center">
                            <?php foreach ($portfolios as $portfolio): ?>
                                <div class="col-6 mb-2 justify-content-center">
                                    <div class="card"
                                        style="display:flex; border-radius: 20px; position: relative;display: flex; align-items:center; justify-content: center">
                                        <img src="../assets/image/user/userPortfolio/<?php echo htmlspecialchars($portfolio['projectImage']); ?>"
                                            class="cardImg" alt="...">
                                        <div class="cardBody">
                                            <b
                                                class="portfolioTitle; justify-content: center;"><?php echo htmlspecialchars($portfolio['projectTitle']); ?></b>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="skills">
                            <b>Skills</b>
                            <p id="skillsText"> <?php echo htmlspecialchars($skills) ?> </p>
                            <textarea id="editSkills" class="textContent"
                                style="display:none; overflow:hidden;"></textarea>
                        </div>
                        <div class="contactInfo">
                            <b>Contact Info</b>
                            <p id="contactText"> <?php echo htmlspecialchars($contactDetails) ?> </p>
                            </p>
                            <textarea id="editContact" class="textContent"
                                style="display:none; overflow:hidden;"></textarea>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <div class="contentRight">
                        <div class="educDetails">
                            <b>Education Details</b>
                            <p id="educDetailsText"><?php echo htmlspecialchars($educationalDetails); ?></p>
                            <textarea id="editEducDetails" class="textContent"
                                style="display:none; overflow:hidden;"></textarea>
                        </div>
                        <div class="empHistory">
                            <b>Employment History</b>
                            <p id="empHistoryText"><?php echo htmlspecialchars($employmentHistory); ?></p>
                            <textarea id="editEmpHistory" class="textContent"
                                style="display:none; overflow:hidden;"></textarea>
                        </div>
                        <div class="certDetails">
                            <b>Certification Details</b>
                            <p id="certDetailsText"><?php echo htmlspecialchars($certifications); ?></p>
                            <textarea id="editCertDetails" class="textContent"
                                style="display:none; overflow:hidden;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer>
        <?php
        include("../assets/shared/footerAdmin.php");
        ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

    <script src="../js/userProfileEdit.js"></script>


</body>

</html>