<?php
include("../connect.php");




$applicationFormID = isset($_GET['applicationFormID']) ? intval($_GET['applicationFormID']) : 0;
$userID = isset($_GET['userID']) ? intval($_GET['userID']) : 0;


$query = "SELECT applicationForm.*, user.firstName, user.lastName 
          FROM applicationForm
          JOIN user ON applicationForm.userID = user.userID
          WHERE applicationForm.applicationFormID = ? AND applicationForm.userID = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $applicationFormID, $userID);
$stmt->execute();
$result = $stmt->get_result();

$data = $result->fetch_assoc();
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
    <link href="../assets/css/adminCSS/viewForm.css" rel="stylesheet">
    <link rel="icon" href="../assets/image/adminImage/stbLogoAdmin.png">
</head>

<body>

    <?php include("../assets/shared/navbarAdmin.php"); ?>

    <div class="form-container" style="margin: 150px auto;">
        <form>
       
            <h5 class="aformName mb-4">
                <?= htmlspecialchars($data['firstName'] ?? '') ?> <?= htmlspecialchars($data['lastName'] ?? '') ?>'s
                Application Form
            </h5>

            <div class="question1 mb-4">
                <label for="question1" class="form-label mb-2">First Question:</label>
                <textarea name="question1" class="form-control" id="question1" rows="3" placeholder="" required>
                <?= htmlspecialchars($data['firstAnswer'] ?? '') ?>
            </textarea>
            </div>

            <div class="question2 mb-4">
                <label for="question2" class="form-label mb-2">Second Question:</label>
                <textarea name="question2" class="form-control" id="question2" rows="3" placeholder="">
                <?= htmlspecialchars($data['secondAnswer'] ?? '') ?>
            </textarea>
            </div>

           
            <div class="mb-1">
                <label for="uploadCV" class="form-label mb-2">CV/Resume:</label>
            </div>
            <div class="button">
                <a href="../assets/image/user/userResume/<?= urlencode($data['employeeResume'] ?? '') ?>"
                    class="btn btn-primary mb-4" target="_blank">View Attachment</a>
            </div>
        </form>

        <div class="button-container">
            <button id="acceptButton" type="button" class="btn btn-success me-2 mt-2">ACCEPT</button>
            <button id="declineButton" type="button" class="btn btn-danger me-2 mt-2">DECLINE</button>
        </div>
    </div>

    <script>
        document.getElementById('acceptButton').addEventListener('click', function () {
            updateStatus(1); 
        });

        document.getElementById('declineButton').addEventListener('click', function () {
            updateStatus(0); 
        });

        function updateStatus(status) {
            const userID = <?= $userID ?>; 
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "../process/updateStatus.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onload = function () {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        const message = status === 1 ? "Applicant has been accepted." : "Applicant has been declined.";
                        alert(message);
                    } else {
                        alert("An error occurred: " + response.error);
                    }
                } else {
                    alert("Failed to update status. Please try again.");
                }
            };
            xhr.send("userID=" + userID + "&isAccepted=" + status);
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <footer>
        <?php include("../assets/shared/footerAdmin.php"); ?>
    </footer>

</body>

</html>