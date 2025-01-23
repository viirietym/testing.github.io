<?php
include("../connect.php");
include('../process/sessionStarting.php');

// Get the jobDetailID from the URL
if (isset($_GET['jobDetailID'])) {

  $jobDetailID = $_GET['jobDetailID'];

} else {
  header('location:userJobList.php');
}

// Query to get the full details of the job
$jobViewQuery = "SELECT jobdetail.*, post.datePosted, post.userID 
  FROM jobdetail 
  LEFT JOIN post ON jobdetail.jobDetailID = post.jobDetailID 
  WHERE jobdetail.jobDetailID = $jobDetailID";

$jobViewResult = executeQuery($jobViewQuery);

if ($jobViewRow = mysqli_fetch_assoc($jobViewResult)) {
  $jobTitle = $jobViewRow['jobTitle'];
  $companyName = $jobViewRow['companyName'];
  $salaryRate = $jobViewRow['salaryRate'];
  $experienceLevel = $jobViewRow['experienceLevel'];
  $jobIndustry = $jobViewRow['jobIndustry'];
  $jobLocation = $jobViewRow['jobLocation'];
  $jobSkillsDescription = $jobViewRow['jobSkillsDescription'];
  $datePosted = $jobViewRow['datePosted'];
  $userID = $jobViewRow['userID'];
  $fullDescription = $jobViewRow['fullDescription'];
} else {
  echo "<p>Job not found.</p>";
  exit;
}

$jobViewresult = executeQuery($jobViewQuery);

$jobTitle = '';
$salaryRate = '';
$expLevel = '';
$companyName = '';
$location = '';
$industry = '';
$skillRequirements = '';
$jobDescription = '';
$datePosted = '';

while ($jobViewRow = mysqli_fetch_assoc($jobViewresult)) {

$jobDetailID = $jobViewRow['jobDetailID'];
$jobTitle = $jobViewRow['jobTitle'];
$salaryRate = $jobViewRow['salaryRate'];
$expLevel = $jobViewRow['experienceLevel'];
$companyName = $jobViewRow['companyName'];
$location = $jobViewRow['jobLocation'];
$industry = $jobViewRow['jobIndustry'];
$skillRequirements = $jobViewRow['jobSkillsDescription'];
$jobDescription = $jobViewRow['fullDescription'];
$datePosted = $jobViewRow['datePosted'];

}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>STBJOBS | View Job Full</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/userCSS/userJobView.css">
  <link rel="icon" href="../assets/image/userImage/stbLogo.ico">
</head>

<body>
  <?php include "../assets/shared/navbarHome.php"; ?>

  <div class="jobview-container">
    <?php
    // timeAgo function
    function timeAgo($timestamp)
    {
      $time = strtotime($timestamp);
      $currentTime = time();
      $timeDifference = $currentTime - $time;

      if ($timeDifference < 60) {
        return $timeDifference . " seconds ago";
      } elseif ($timeDifference < 3600) {
        return floor($timeDifference / 60) . " minutes ago";
      } elseif ($timeDifference < 86400) {
        return floor($timeDifference / 3600) . " hours ago";
      } else {
        return floor($timeDifference / 86400) . " days ago";
      }
    }

    $timeAgo = timeAgo($datePosted);
    ?>
    <p class="small mx-5">
      <?php echo "Posted " . $timeAgo; ?>
    </p>
    <p class="fw-normal mb-1 mx-1">
      <img class="img-fluid locationImg mx-1" src="../assets/image/userImage/location.png">
      <?php echo $jobLocation; ?>
    </p>
    <p class="h5 mb-1"><b><?php echo $jobTitle; ?> | <?php echo $companyName; ?></b></p>

    <hr class="my-2">

    <div class="row">
      <p class="col-auto mb-2">
        <small>
          Salary Rate: PHP <?php echo $salaryRate; ?> |
          Exp. Level: <?php echo $experienceLevel; ?> |
          Job Industry: <?php echo $jobIndustry; ?>
        </small>
      </p>
    </div>

    <h6 class="h5 mt-4"><b>Skills Needed</b></h6>
    <p>
    <ul>
      <?php

      $skills = explode(',', $jobSkillsDescription);
      foreach ($skills as $skill) {
        echo "<li>" . trim($skill) . "</li>";
      }
      ?>
    </ul>
    </p>

    <h6 class="h5 mt-4"><b>Description</b></h6>
    <p><?php echo nl2br($fullDescription); ?></p>

    <div class="button-container">
      <a href="../user/ApplicationForm.php?applicationFormID=">
        <button class="apply-now-btn" style="width:180px;">Apply Now</button>
      </a>

    </div>
  </div>

  <?php include "../assets/shared/footer.php"; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>