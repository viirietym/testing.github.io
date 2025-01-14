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
</head>

<body>
    <?php
    include("../assets/shared/footerAdmin.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="profileHeader d-flex flex-column flex-md-row align-items-center">
                    <div class="profileImage">
                        <img src="">
                        <span>Profile</span>
                    </div>

                    <div class="profileText">
                        <h2 id="fullName">Full Name</h2>
                        <div id="editFullNameContainer" style="display:none">
                            <input type="text" id="editFirstName" class="textInput" placeholder="First Name">
                            <input type="text" id="editLastName" class="textInput" placeholder="Last Name">

                        </div>
                        <p id="username">@username</p>
                        <input type="text" id="editUsername" class="textInput" style="display:none">
                        <p id="shortDescription">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco.</p>
                        <textarea id="editDescription" class="textInput" style="display:none; overflow:hidden;"
                            placeholder="Enter your description"></textarea>
                    </div>

                    <div class="buttons d-flex justify-content-center justify-content-md-start">
                        <button onclick="editProfile()">EDIT PROFILE</button>
                        <button style="display:none" onclick="saveChanges()">SAVE CHANGES</button>
                        <a href="userUpdateAccount.php">
                            <button>UPDATE ACCOUNT</button>
                        </a>
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
                            <span id="jobTitleText">Quality Assurance | Web Developer</span>
                            <input type="text" id="editJobTitle" class="textContent" style="display:none;">
                        </div>
                        <div class="fullDescription">
                            <b>Full Description:</b>
                            <p id="fullDescriptionText">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                nostrud
                                exercitation ullamco.</p>
                            <textarea id="editFullDescription" class="textContent"
                                style="display:none; overflow:hidden;"></textarea>
                        </div>
                        <div class="card" style="border-radius: 20px">
                            <img src="" class="cardImg" alt="...">
                            <div class="cardBody">
                                <b class="portfolioTitle">Portfolio #1</b>
                            </div>
                        </div>
                        <div class="skills">
                            <b>Skills</b>
                            <p id="skillsText">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation
                                ullamco.</p>
                            <textarea id="editSkills" class="textContent"
                                style="display:none; overflow:hidden;"></textarea>
                        </div>
                        <div class="contactInfo">
                            <b>Contact Info</b>
                            <p id="contactText"></p>
                            <textarea id="editContact" class="textContent"
                                style="display:none; overflow:hidden;"></textarea>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <div class="contentRight">
                        <div class="educDetails">
                            <b>Education Details</b>
                            <p id="educDetailsText">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do
                                eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>
                            <textarea id="editEducDetails" class="textContent"
                                style="display:none; overflow:hidden;"></textarea>
                        </div>
                        <div class="empHistory">
                            <b>Employment History</b>
                            <p id="empHistoryText">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do
                                eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>
                            <textarea id="editEmpHistory" class="textContent"
                                style="display:none; overflow:hidden;"></textarea>
                        </div>
                        <div class="certDetails">
                            <b>Certification Details</b>
                            <p id="certDetailsText">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do
                                eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>
                            <textarea id="editCertDetails" class="textContent"
                                style="display:none; overflow:hidden;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

    <script src="../js/userPeofileEdit.js"></script>

</body>

</html>