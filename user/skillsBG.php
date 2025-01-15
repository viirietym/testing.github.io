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
    <link rel="stylesheet" href="../assets/css/userCSS/skillsBG.css">
</head>

<body>
    <?php
    include("../assets/shared/navbarSignUp.php");
    ?>

    <div class="container" id="signUpForm" style="margin: 150px auto 50px auto;">
        <div class="row">
            <div class="col-12 signUpTitle">
                <p>SKILLS BACKGROUND</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 signUpField">
                <form method="POST" class="Post">
                    <div class="mb-5 projectDetails">
                        <div class="col-12" id="portfolioContainer">
                            <div class="project-item">
                                <p>Add Portfolio:</p>
                                <label for="portfolioInput" id="profileImageLabel">
                                    <img id="profileImage" src="../assets/image/userImage/project.png"
                                        alt="Profile Picture" class="form-control frm-sign">
                                </label>
                                <input type="file" name="portfolio[]" id="portfolioInput"
                                    class="form-control projectFile" accept="image/*" onchange="previewImage(event)"
                                    required style="display: none;">
                                <input type="text" name="project-name[]" class="form-control projectName"
                                    placeholder="Project Name" required>
                            </div>
                        </div>
                        <div class="col-12 addProject">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#confirmationModal">
                                <img src="../assets/image/userImage/addProject.png" alt="Add Project" style="overflow: hidden">
                            </button>
                        </div>
                    </div>
                    <div class="mb-3 skillDetail">
                        <label for="skillDesc" class="form-label">Skills Description</label>
                        <textarea name="skillDesc" class="form-control frm-sign" id="skillDesc" required></textarea>
                    </div>
                    <div class="mb-3 submit">
                        <button name="btnSign" type="submit" class="btnSign" data-bs-toggle="modal"
                        data-bs-target="#addNew">Proceed</button>
                    </div>

                    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmationLabel">ADD NEW PORTFOLIO</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to add a new portfolio? This action will allow you to upload a new project.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn" style="background-color:rgb(81, 175, 76); color: #FFFFFF;" data-bs-dismiss="modal"
                                     onclick="addProject()">Yes, Add Project</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    include("../assets/shared/footer.php");
    ?>

    <script src="../js/skillBGAddProject.js"></script>
</body>

</html>
