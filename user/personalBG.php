<?php
include("../process/registering.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STBjobs: Sign up</title>
    <link rel="icon" href="../assets/image/userImage/stbLogo.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/userCSS/personalBG.css">
</head>

<body>
    <?php
    include("../assets/shared/navbarSignUp.php");
    ?>


    <div class="wrapper" style="padding: 20px; background-color: #f8f9fa;">
        <div class="container" id="signUpForm" style="margin: 150px auto 50px auto;">
            <div class="row">
                <div class="col-12 signUpTitle">
                    <p>PERSONAL BACKGROUND</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 signUpField">
                    <form method="POST" class="Post" enctype="multipart/form-data">
                        <div class="mb-3 profileDetails">
                            <div class="col-12 col-md-4 profile ">
                                <label for="profile">
                                    <img id="profileImage" src="../assets/image/userImage/profile.png"
                                        alt="Profile Picture" class="form-control frm-sign"
                                        style="overflow: hidden; border-radius: 100%">
                                </label>
                                <input type="file" name="profile" class="form-control frm-sign" id="profile"
                                    accept="image/*" onchange="previewImage(event)" required>
                            </div>
                            <div class="col-12 col-md-8 shortBio mt-3">
                                <label for="shortbio" class="form-label required">Short Description</label>
                                <textarea name="shortbio" class="form-control frm-sign" id="shortbio"
                                    required></textarea>
                            </div>
                        </div>
                        <div class="mb-3 personalDetail">
                            <label for="jobtitle" class="form-label required">Job Title (Ex. Web Developer | Designer)</label>
                            <textarea name="jobtitle" class="form-control frm-sign" id="jobtitle" required></textarea>
                        </div>
                        <div class="mb-3 personalDetail">
                            <label for="longbio" class="form-label required">Full Description about Yourself</label>
                            <textarea name="longbio" class="form-control frm-sign" id="longbio" required></textarea>
                        </div>
                        <div class="mb-3 submit">
                            <button name="btnSignPersonal" type="submit" class="btnSignPersonal">Proceed</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



    <?php
    include("../assets/shared/footer.php");
    ?>

    <script src="../js/personalBGImage.js"></script>
</body>

</html>