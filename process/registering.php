<?php
include("../connect.php");

session_start();
$signupFailed = false;
$signupSuccess = false;
$passwordMismatch = false;
$emailExists = false;
$usernameExists = false;



// FOR THE SIGN UP SECTION
if (isset($_POST['btnSign'])) {
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmpassword'];

    if ($password === $confirmPassword) {
        if (!empty($username) && !empty($email) && !empty($password)) {

            $checkUsernameQuery = "SELECT * FROM user WHERE username = '$username'";
            $checkUsernameResult = mysqli_query($conn, $checkUsernameQuery);
            if (mysqli_num_rows($checkUsernameResult) > 0) {
                $usernameExists = true;
            }

            $checkEmailQuery = "SELECT * FROM user WHERE email = '$email'";
            $checkEmailResult = mysqli_query($conn, $checkEmailQuery);
            if (mysqli_num_rows($checkEmailResult) > 0) {
                $emailExists = true;
            }

            if (!$usernameExists && !$emailExists) {
                $infoQuery = "INSERT INTO userinfo () VALUES ()";
                $result = mysqli_query($conn, $infoQuery);
                if ($result) {
                    $userInfoId = mysqli_insert_id($conn);

                    $userQuery = "INSERT INTO user (firstName, lastName, username, email, password, role, userInfoId) VALUES ('$firstName', '$lastName', '$username', '$email', '$password', 'user', '$userInfoId')";
                    $userResult = mysqli_query($conn, $userQuery);
                    if ($userResult) {
                        $userId = mysqli_insert_id($conn); 

                        $_SESSION['userID'] = $userId;
                        $_SESSION['username'] = $username;
                        $_SESSION['email'] = $email;
                        $_SESSION['password'] = $password;
                        $_SESSION['firstName'] = $firstName;
                        $_SESSION['lastName'] = $lastName;
                        $_SESSION['role'] = 'user';
                        $_SESSION['userInfoID'] = $userInfoId;

                        $signupSuccess = true;
                        header("Location: personalBG.php");
                        exit();
                    } else {
                        $signupFailed = true;
                    }
                } else {
                    $signupFailed = true;
                }
            }
        } else {
            $signupFailed = true;
        }
    } else {
        $passwordMismatch = true;
    }
}



// FOR THE PERSONAL BG SECTION
if (isset($_POST['btnSignPersonal'])) {
    $profile = $_FILES['profile'];
    $shortbio = mysqli_real_escape_string($conn, $_POST['shortbio']); 
    $jobtitle = mysqli_real_escape_string($conn, $_POST['jobtitle']);
    $longbio = mysqli_real_escape_string($conn, $_POST['longbio']);

    if (!empty($profile['name']) && !empty($shortbio) && !empty($jobtitle) && !empty($longbio)) {
        $uploadDir = "../assets/image/user/userProfile/";

        if (!is_dir($uploadDir) || !is_writable($uploadDir)) {
            die('Upload directory does not exist or is not writable.');
        }

        $profileFileName = uniqid() . '_' . basename($profile['name']);
        $profileUploadPath = $uploadDir . $profileFileName;

        if ($profile['error'] !== UPLOAD_ERR_OK) {
            die('File upload error for profile image: ' . $profile['error']);
        }

        if (move_uploaded_file($profile['tmp_name'], $profileUploadPath)) {
            $userInfoId = $_SESSION['userInfoID'];

            $userInfoQuery = "UPDATE userinfo SET 
                              userProfileImage = '$profileFileName', 
                              userBio = '$shortbio', 
                              jobTitle = '$jobtitle', 
                              userDescription = '$longbio' 
                              WHERE userInfoId = $userInfoId";
            if ($conn->query($userInfoQuery)) {
                header("Location: skillsBG.php");
                exit();
            } else {
                die('Error updating personal background: ' . $conn->error);
            }
        } else {
            die('Failed to move uploaded profile image.');
        }
    }
}




// FOR THE SKILLS BG SECTION
if (isset($_POST['btnSignSkills'])) {
    $portfolioImages = $_FILES['portfolio'];
    $portfolioNames = $_POST['project-name'];
    $skillDesc = $_POST['skillDesc'];

    if (!empty($portfolioImages['name'][0]) && !empty($portfolioNames) && !empty($skillDesc)) {
        $userInfoId = $_SESSION['userInfoID']; 

        $insertUserInfoQuery = "UPDATE userinfo SET skillDescription = '$skillDesc' WHERE userInfoId = '$userInfoId'";
        if ($conn->query($insertUserInfoQuery)) {
            $uploadDir = "../assets/image/user/userPortfolio/";

            if (!is_dir($uploadDir) || !is_writable($uploadDir)) {
                die('Upload directory does not exist or is not writable.');
            }

            foreach ($portfolioImages['name'] as $index => $imageName) {
                $projectName = $portfolioNames[$index];
                $tmpName = $portfolioImages['tmp_name'][$index];
                $fileName = uniqid() . '_' . basename($imageName);
                $uploadPath = $uploadDir . $fileName;

                if ($portfolioImages['error'][$index] !== UPLOAD_ERR_OK) {
                    die('File upload error for file index ' . $index . ': ' . $portfolioImages['error'][$index]);
                }

                if (move_uploaded_file($tmpName, $uploadPath)) {
                    $portfolioQuery = "INSERT INTO portfolio (userInfoId, projectImage, projectTitle) VALUES ($userInfoId, '$fileName', '$projectName')";
                    if (!$conn->query($portfolioQuery)) {
                        die('Error inserting portfolio: ' . $conn->error);
                    }
                } else {
                    die('Failed to move uploaded file for ' . $imageName);
                }
            }

            header("Location: applicantDetails.php");
            exit();
        } else {
            die('Error inserting skill description: ' . $conn->error);
        }
    }
}



// FOR APPLICANTDETAILS SECTION
if (isset($_POST['btnSignDetails'])) {
    $contact = $_POST['contact'];
    $education = $_POST['education'];
    $employment = $_POST['employment'];
    $certificate = $_POST['certificate'];

    if (!empty($contact) && !empty($education)) {
        $userInfoId = $_SESSION['userInfoID']; 

        $userInfoQuery = "UPDATE userinfo SET 
                          contactDetails = '$contact', 
                          educationalDetails = '$education', 
                          employmentHistoryDetails = '$employment', 
                          certificationDetails = '$certificate' 
                          WHERE userInfoId = $userInfoId";
        if ($conn->query($userInfoQuery)) {
            header("Location: userJobList.php");
            exit();
        } else {
            die('Error updating applicant details: ' . $conn->error);
        }
    }
}
?>
