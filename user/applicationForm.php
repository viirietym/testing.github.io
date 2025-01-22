<?php
include '../connect.php';
include('../process/sessionStarting.php');

session_start();
date_default_timezone_set('Asia/Manila');

if (!isset($_SESSION['userID'])) {
  header("../process/loggingIn.php");
  exit();
}

$userID = $_SESSION['userID'];
$applicantFullName = $_SESSION['firstName'] . " " . $_SESSION['lastName'];

// Submit form
if (isset($_POST['submitForm'])) {
  $firstAnswer = $_POST['firstAnswer'];
  $secondAnswer = $_POST['secondAnswer'];

  // Handle file upload
  if (isset($_FILES['employeeResume']) && $_FILES['employeeResume']['error'] == 0) {
    $resumefileupload = $_FILES['employeeResume']['name'];
    $resumefileuploadTMP = $_FILES['employeeResume']['tmp_name'];

    // Rename file
    $resumefileExt = substr($resumefileupload, strripos($resumefileupload, '.'));
    $resumenewfilename = date("YmdHis") . "_" . pathinfo($resumefileupload, PATHINFO_FILENAME) . $resumefileExt;

    // Set the location
    $resumefolder = "../assets/image/user/userResume";

    // Move the file to the folder
    move_uploaded_file($resumefileuploadTMP, $resumefolder . "/" . $resumenewfilename);

    // Store the file path in the database
    $employeeResume = $resumefolder . "/" . $resumenewfilename;

    // Sent date
    $sentDate = date("Y-m-d H:i:s");

    // InsertQuery
    $insertApplicationFormQuery = "INSERT INTO applicationform(firstAnswer, secondAnswer, employeeResume, sentDate , userID) 
        VALUES ('$firstAnswer','$secondAnswer','$employeeResume','$sentDate','$userID');";
    executeQuery($insertApplicationFormQuery);
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>STBJOBS | Application Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/userCSS/applicationForm.css">
  <link rel="icon" href="../assets/image/userImage/stbLogo.ico">
</head>

<body>

  <?php include "../assets/shared/navbarHome.php" ?>

  <div class="form-container" style="margin: 150px auto;">
    <form action="applicationForm.php" method="POST" enctype="multipart/form-data">
      <h5 class="aformName mb-4"><?php echo $applicantFullName; ?>'s Application Form</h5>

      <div class="question1 mb-4 ">
        <label for="question1" class="form-label mb-2">Why should we hire you?</label>
        <textarea name="firstAnswer" class="form-control" id="question1" placeholder="Type your answer here"
          required></textarea>
      </div>

      <div class="question2 mb-4 ">
        <label for="question2" class="form-label mb-2">Please indicate your expected salary and provide a brief
          explanation of the factors that have contributed to this expectation, such as your qualifications, experience,
          and industry standards. </label>
        <textarea name="secondAnswer" class="form-control" id="question2" placeholder="Type your answer here"
          required></textarea>
      </div>

      <!-- file input -->
      <div class="mb-5">
        <label for="uploadCV" class="form-label mb-2">Upload your CV/Resume (<span class="pdf-format">PDF
            Format</span>):</label>
        <input class="form-control form-control-lg" id="uploadCV" name="employeeResume" type="file" accept=".pdf"
          required>
      </div>

      <!-- submit button -->
      <div class="button-container">
        <button name="submitForm" type="submit" class="submit-btn" style="width:180px;">Submit</button>
      </div>
    </form>
  </div>

  <?php include "../assets/shared/footer.php" ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>