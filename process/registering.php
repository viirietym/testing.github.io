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

    if ($password == $confirmPassword) {
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
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                $infoQuery = "INSERT INTO userinfo () VALUES ()";
                $result = mysqli_query($conn, $infoQuery);
                if ($result) {
                    $userInfoId = mysqli_insert_id($conn);

                    $userQuery = "INSERT INTO user (firstName, lastName, username, email, password, role, userInfoId) VALUES ('$firstName', '$lastName', '$username', '$email', '$hashedPassword', 'user', '$userInfoId')";
                    $userResult = mysqli_query($conn, $userQuery);
                    if ($userResult) {
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
    $shortbio = $_POST['shortbio'];
    $jobtitle = $_POST['jobtitle'];
    $longbio = $_POST['longbio'];

    if (!empty($profile['name']) && !empty($shortbio) && !empty($jobtitle) && !empty($longbio)) {
        $uploadDir = "../assets/image/user/";
        
        if (!is_dir($uploadDir) || !is_writable($uploadDir)) {
            die('Upload directory does not exist or is not writable.');
        }

        $profileFileName = uniqid() . '_' . basename($profile['name']);
        $profileUploadPath = $uploadDir . $profileFileName;

        if ($profile['error'] !== UPLOAD_ERR_OK) {
            die('File upload error for profile image: ' . $profile['error']);
        }

        if (move_uploaded_file($profile['tmp_name'], $profileUploadPath)) {
            
            $lastUserInfoQuery = "SELECT MAX(userInfoId) AS lastUserInfoId FROM userinfo";
            $result = $conn->query($lastUserInfoQuery);

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $userInfoId = $row['lastUserInfoId'];

                $checkUserIdQuery = "SELECT * FROM user WHERE userInfoId = $userInfoId";
                $checkUserIdResult = $conn->query($checkUserIdQuery);

                if ($checkUserIdResult->num_rows > 0) {
                    $userInfoQuery = "UPDATE userinfo SET 
                                      userProfileImage = '$profileFileName', 
                                      userBio = '$shortbio', 
                                      jobTitle = '$jobtitle', 
                                      userDescription = '$longbio' 
                                      WHERE userInfoId = $userInfoId";
                    if ($conn->query($userInfoQuery)) {
                        $signupSuccess = true;
                        header("Location: skillsBG.php");
                        exit();
                    } else {
                        $signupFailed = true;
                    }
                } else {
                    $signupFailed = true;
                }
            } else {
                $signupFailed = true;
            }
        } else {
            die('Failed to move uploaded profile image.');
        }
    } else {
        $signupFailed = true;
    }
}




// FOR THE SKILLS BG SECTION
if (isset($_POST['btnSignSkills'])) {
    $portfolioImages = $_FILES['portfolio'];
    $portfolioNames = $_POST['project-name'];
    $skillDesc = $_POST['skillDesc'];
    
    if (!empty($portfolioImages['name'][0]) && !empty($portfolioNames) && !empty($skillDesc)) {
        
        $lastUserInfoQuery = "SELECT MAX(userInfoId) AS lastUserInfoId FROM userinfo";
        $result = $conn->query($lastUserInfoQuery);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $userInfoId = $row['lastUserInfoId'];

            $insertUserInfoQuery = "UPDATE userinfo SET skillDescription = '$skillDesc' WHERE userInfoId = '$userInfoId'";
            if ($conn->query($insertUserInfoQuery)) {

                $uploadDir = "../assets/image/user/";
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
                        $portfolioQuery = "
                            INSERT INTO portfolio (userInfoId, projectImage, projectTitle)
                            VALUES ($userInfoId, '$fileName', '$projectName')
                        ";
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
        } else {
            die('Error fetching the last userInfoId.');
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
        $lastUserInfoQuery = "SELECT MAX(userInfoId) AS lastUserInfoId FROM userinfo";
        $result = $conn->query($lastUserInfoQuery);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $userInfoId = $row['lastUserInfoId'];

            $checkUserIdQuery = "SELECT * FROM user WHERE userInfoId = $userInfoId";
            $checkUserIdResult = $conn->query($checkUserIdQuery);

            if ($checkUserIdResult->num_rows > 0) {
                $userInfoQuery = "UPDATE userinfo SET 
                                  contactDetails = '$contact', 
                                  educationalDetails = '$education', 
                                  employmentHistoryDetails = '$employment', 
                                  certificationDetails = '$certificate' 
                                  WHERE userInfoId = $userInfoId";
                if ($conn->query($userInfoQuery)) {

                    $userQuery = "SELECT * FROM user WHERE userInfoId = $userInfoId";
                    $userResult = $conn->query($userQuery);
                    $userData = $userResult->fetch_assoc();

                    $userinfoQuery = "SELECT * FROM userinfo WHERE userInfoId = $userInfoId";
                    $userinfoResult = $conn->query($userinfoQuery);
                    $userInfoData = $userinfoResult->fetch_assoc();

                    $portfolioQuery = "SELECT * FROM portfolio WHERE userInfoId = $userInfoId";
                    $portfolioResult = $conn->query($portfolioQuery);
                    $portfolioData = [];
                    while ($portfolioRow = $portfolioResult->fetch_assoc()) {
                        $portfolioData[] = $portfolioRow; // Store all portfolio entries
                    }

                    $_SESSION['userInfoId'] = $userInfoId;
                    $_SESSION['username'] = $userData['username'];
                    $_SESSION['email'] = $userData['email'];
                    $_SESSION['firstName'] = $userData['firstName'];
                    $_SESSION['lastName'] = $userData['lastName'];
                    $_SESSION['role'] = $userData['role'];
                    $_SESSION['contactDetails'] = $contact;
                    $_SESSION['educationalDetails'] = $education;
                    $_SESSION['employmentHistoryDetails'] = $employment;
                    $_SESSION['certificationDetails'] = $certificate;

                    $_SESSION['profileImage'] = $userInfoData['userProfileImage'];
                    $_SESSION['shortBio'] = $userInfoData['userBio'];
                    $_SESSION['jobTitle'] = $userInfoData['jobTitle'];
                    $_SESSION['longBio'] = $userInfoData['userDescription'];

                    $_SESSION['portfolio'] = $portfolioData;

                    $signupSuccess = true;
                    header("Location: userJobList.php");
                    exit();
                } else {
                    $signupFailed = true;
                }
            } else {
                $signupFailed = true;
            }
        } else {
            $signupFailed = true;
        }
    }
}
?>