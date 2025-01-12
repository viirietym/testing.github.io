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
    include("../assets/shared/footerAdmin.php");
    ?>



    <div class="container my-5" id="signUpForm">
        <div class="row">
            <div class="col-12 signUpTitle">
                <p>SKILLS BACKGROUND</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 signUpField">
                <form method="POST" class="Post">
                    <div class="mb-3 projectDetails">
                        <div class="col-8" id="portfolioContainer">
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
                        <div class="col-4 addProject mt-3">
                            <button type="button" onclick="addProject()">
                                <img src="../assets/image/userImage/addProject.png" alt="Add Project">
                            </button>
                        </div>
                    </div>
                    <div class="mb-3 skillDetail">
                        <label for="skillDesc" class="form-label">Skills Description</label>
                        <textarea name="skillDesc" class="form-control frm-sign" id="skillDesc" required></textarea>
                    </div>
                    <div class="mb-3 submit">
                        <button name="btnSign" type="submit" class="btnSign">Proceed</button>
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