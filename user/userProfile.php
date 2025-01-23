<?php
include('../process/viewUserProfile.php');

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>STBjobs | Profile</title>
    <link rel="icon" href="../assets/image/userImage/stbLogo.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/userCSS/userProfile.css">

</head>

<body>
    <?php
    include("../assets/shared/navbarHome.php");
    ?>
    <div class="container" style="margin-top: 100px;">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($resultRow = mysqli_fetch_assoc($result)) {
                ?>
                <form id="editProfileForm" method="POST" action="../process/saveProfileChanges.php"
                    enctype="multipart/form-data">
                    <input type="hidden" name="userId" value="<?php echo $userId; ?>">
                    <div class="row">
                        <div class="col-12">
                            <div class="profileHeader d-flex flex-column flex-md-row align-items-center">
                                <div class="profileImage">
                                    <img id="profileImage"
                                        src="../assets/image/user/userProfile/<?php echo $resultRow['userProfileImage']; ?>"
                                        alt="Profile Image" style="cursor: pointer;">
                                    <input type="file" id="editProfileImage" name="userProfileImage" style="display: none;"
                                        onchange="previewProfileImage(event)">
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="profileText">
                                        <h2 id="fullName"><?php echo $resultRow['firstname'] . " " . $resultRow['lastname']; ?>
                                        </h2>
                                        <div id="editFullNameContainer" style="display:none">
                                            <label for="editFirstName">First Name:</label>
                                            <input type="text" id="editFirstName" name="firstname" class="textInput"
                                                placeholder="First Name">
                                            <label for="editLastName">Last Name:</label>
                                            <input type="text" id="editLastName" name="lastname" class="textInput"
                                                placeholder="Last Name">
                                        </div>
                                        <p id="username">@<?php echo $resultRow['username']; ?></p>
                                        <label for="editUsername" style="display:none">Username:</label>
                                        <input type="text" id="editUsername" name="username" class="textInput"
                                            style="display:none">
                                        <p id="shortDescription" style="text-align: justify;">
                                            <?php echo nl2br($resultRow['userBio']); ?>
                                        </p>
                                        <label for="editDescription" style="display:none">Short Description:</label>
                                        <textarea id="editDescription" name="userBio" class="textInput"
                                            style="display:none; overflow:hidden;"></textarea>
                                    </div>
                                    
                                </div>
                                <div class="buttons d-flex justify-content-center justify-content-md-start">
                                    <button type="button" onclick="editProfile()">EDIT PROFILE</button>
                                    <button type="submit" style="display:none" name="btnSave">SAVE CHANGES</button>
                                    <a href="userUpdateAccount.php?userId=<?php echo $userId; ?>">
                                        <button type="button">UPDATE ACCOUNT</button>
                                    </a>
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
                                            <span id="jobTitleText"><?php echo $resultRow['jobTitle']; ?></span>
                                            <label for="editJobTitle" style="display:none">Job Title:</label>
                                            <input type="text" id="editJobTitle" name="jobTitle" class="textContent"
                                                style="display:none;">
                                        </div>
                                        <div class="fullDescription">
                                            <b>Full Description:</b>
                                            <p id="fullDescriptionText" style="text-align: justify;">
                                                <?php echo nl2br($resultRow['userDescription']); ?>
                                            </p>
                                            <label for="editFullDescription" style="display:none">Full Description:</label>
                                            <textarea id="editFullDescription" name="userDescription" class="textContent"
                                                style="display:none; overflow:hidden;"></textarea>
                                        </div>
                                        <div class="row justify-content-center">
                                            <?php
                                            $portfolioQuery = "SELECT projectImage, projectTitle FROM portfolio WHERE userInfoID = '" . $resultRow['userInfoID'] . "'";
                                            $portfolioResult = executeQuery($portfolioQuery);
                                            while ($portfolioItem = mysqli_fetch_assoc($portfolioResult)) {
                                                ?>
                                                <div class="col-6 mb-2 justify-content-center">
                                                    <div class="card" style="border-radius: 20px;">
                                                        <img id="projectImage"
                                                            src="../assets/image/user/userPortfolio/<?php echo $portfolioItem['projectImage']; ?>"
                                                            class="cardImg" alt="Portfolio Image" style="cursor: pointer;">
                                                        <div class="cardBody" style="text-align:center;">
                                                            <b id="projectTitle" class="portfolioTitle">
                                                                <?php echo $portfolioItem['projectTitle']; ?>
                                                            </b>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="skills">
                                            <b>Skills</b>
                                            <p id="skillsText" style="text-align: justify;">
                                                <?php echo nl2br($resultRow['skillDescription']); ?>
                                            </p>
                                            <label for="editSkills" style="display:none">Skills:</label>
                                            <textarea id="editSkills" name="skillDescription" class="textContent"
                                                style="display:none; overflow:hidden;"></textarea>
                                        </div>
                                        <div class="contactInfo">
                                            <b>Contact Info</b>
                                            <p id="contactText"><?php echo nl2br($resultRow['contactDetails']); ?></p>
                                            <label for="editContact" style="display:none">Contact Info:</label>
                                            <textarea id="editContact" name="contactDetails" class="textContent"
                                                style="display:none; overflow:hidden;"></textarea>
                                        </div>
                                    </div>

                                    <div class="divider"></div>

                                    <div class="contentRight">
                                        <div class="educDetails">
                                            <b>Education Details</b>
                                            <p id="educDetailsText" style="text-align: justify;">
                                                <?php echo nl2br($resultRow['educationalDetails']); ?>
                                            </p>
                                            <label for="editEducDetails" style="display:none">Education Details:</label>
                                            <textarea id="editEducDetails" name="educationalDetails" class="textContent"
                                                style="display:none; overflow:hidden;"></textarea>
                                        </div>
                                        <div class="empHistory">
                                            <b>Employment History</b>
                                            <p id="empHistoryText" style="text-align: justify;">
                                                <?php echo nl2br($resultRow['employmentHistoryDetails']); ?>
                                            </p>
                                            <label for="editEmpHistory" style="display:none">Employment History:</label>
                                            <textarea id="editEmpHistory" name="employmentHistoryDetails" class="textContent"
                                                style="display:none; overflow:hidden;"></textarea>
                                        </div>
                                        <div class="certDetails">
                                            <b>Certification Details</b>
                                            <p id="certDetailsText" style="text-align: justify;">
                                                <?php echo nl2br($resultRow['certificationDetails']); ?>
                                            </p>
                                            <label for="editCertDetails" style="display:none">Certification Details:</label>
                                            <textarea id="editCertDetails" name="certificationDetails" class="textContent"
                                                style="display:none; overflow:hidden;"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <?php
            }
        }
        ?>
    </div>

    <?php
    include("../assets/shared/footer.php");
    ?>

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