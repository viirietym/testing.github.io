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
    <link href="../assets/css/adminCSS/viewForm.css" rel="stylesheet">
    <link rel="icon" href="../assets/image/userImage/stbLogo.ico">

</head>

<body>

    <?php
    include("../assets/shared/navbarAdmin.php");
    ?>

    <div class="form-container" style="margin: 150px auto;">
        <form>
            <h5 class="aformName mb-4">Jane Doe's Application Form</h5>
            <div class="question1 mb-4 ">
                <label for="question1" class="form-label mb-2">First Question:</label>
                <textarea name="question1" class="form-control" id="question1" rows="3" placeholder=""
                    required></textarea>
            </div>

            <div class="question2 mb-4 ">
                <label for="question2" class="form-label mb-2">Second Question:</label>
                <textarea name="question2" class="form-control" id="question2"  rows="3" placeholder=""></textarea>
            </div>

            <!-- file input -->
            <div class="mb-1">
                <label for="uploadCV" class="form-label mb-2">CV/Resume:</label>

            </div>
            <div class="button">
                <button type="button" class="btn btn-primary mb-4">View Attachment</button>
            </div>


        </form>

        <!-- submit button -->
        <!-- <div class="button-container">
            <button type="button" class="btn btn-success me-2 mt-2">ACCEPT</button>
            <button type="button" class="btn btn-danger me-2 mt-2">DECLINE</button>

        </div> -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <footer>
        <?php
        include("../assets/shared/footerAdmin.php");
        ?>
    </footer>


</body>

</html>