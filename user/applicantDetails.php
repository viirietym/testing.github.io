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
    <link rel="stylesheet" href="../assets/css/userCSS/applicantDetails.css">
</head>

<body>
    <?php
    include("../assets/shared/navbarSignUp.php");
    ?>


<div class="wrapper" style="padding: 20px; background-color: #f8f9fa;">
    <div class="container" id="signUpForm" style="margin: 150px auto 50px auto;">
        <div class="row">
            <div class="col-12 signUpTitle">
                <p>APPLICANT DETAILS</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 signUpField">
                <form method="POST" class="Post">
                    <div class="mb-3 applicantDetail">
                        <label for="contact" class="form-label required">Contact Details</label>
                        <textarea name="contact" class="form-control frm-sign" id="contact" required></textarea>
                    </div>
                    <div class="mb-3 applicantDetail">
                        <label for="education" class="form-label required">Educational History</label>
                        <textarea name="education" class="form-control frm-sign" id="education" required></textarea>
                    </div>
                    <div class="mb-3 applicantDetail">
                        <label for="employment" class="form-label">Employment History</label>
                        <textarea name="employment" class="form-control frm-sign" id="employment"></textarea>
                    </div>
                    <div class="mb-3 applicantDetail">
                        <label for="certificate" class="form-label">Certification Details</label>
                        <textarea name="certificate" class="form-control frm-sign" id="certificate" ></textarea>
                    </div>
                    <div class="mb-3 submit">
                        <button name="btnSign" type="submit" class="btnSign">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <?php
    include("../assets/shared/footer.php");
    ?>
</body>

</html>