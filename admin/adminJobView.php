<?php

include("../connect.php");

if (isset($_GET['jobDetailID'])) {

    $jobDetailID = $_GET['jobDetailID'];

} else {
    header('location:adminJobList.php');
}

$getJobViewQuery = "SELECT jobdetail.jobDetailID,jobdetail.jobTitle, jobdetail.jobLocation, jobdetail.salaryRate, jobdetail.experienceLevel, jobdetail.jobIndustry, jobdetail.fullDescription, jobdetail.companyName, jobdetail.jobSkillsDescription, post.datePosted FROM `jobdetail` LEFT JOIN post ON jobdetail.jobDetailID = post.jobDetailID WHERE jobdetail.jobDetailID = '$jobDetailID';";

$jobViewresult = executeQuery($getJobViewQuery);

$jobTitle = '';
$salaryRate = '';
$expLevel = '';
$companyName = '';
$location = '';
$industry = '';
$skillRequirements = '';
$jobDescription = '';
$datePosted = '';

while ($jobRow = mysqli_fetch_assoc($jobViewresult)) {

    $jobDetailID = $jobRow['jobDetailID'];
    $jobTitle = $jobRow['jobTitle'];
    $salaryRate = $jobRow['salaryRate'];
    $expLevel = $jobRow['experienceLevel'];
    $companyName = $jobRow['companyName'];
    $location = $jobRow['jobLocation'];
    $industry = $jobRow['jobIndustry'];
    $skillRequirements = $jobRow['jobSkillsDescription'];
    $jobDescription = $jobRow['fullDescription'];
    $datePosted = $jobRow['datePosted'];

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job View</title>
    <link rel="icon" href="../assets/image/adminImage/stbLogoAdmin.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/adminCSS/adminJobView.css">
</head>

<body>

    <!-- Navigation -->
    <?php
    include("../assets/shared/navbarAdmin.php");
    ?>


    <div class="container main p-5" style="margin-top: 100px;">

        <div class="container job">

            <!-- Date Posted -->
            <div class="row pt-4 mx-5">
                <p class="datePosted">Posted:&nbsp;<?php echo $datePosted ?></p>
            </div>

            <div class="row location mx-3">
                <!-- Location -->
                <div class="col-12 col-sm-12 col-xl-8 d-flex align-items-center" style="text-align: left;">
                    <img class="img-fluid locationImg mx-3" src="../assets/image/userImage/location.png">
                    <p class="barangay pt-3"><?php echo $location ?></p>
                </div>

                <!-- Edit Btn -->
                <div class="col-6 col-sm-6 col-xl-2 d-flex justify-content-center align-items-center">
                    <div class="container d-flex justify-content-end align-items-end">
                        <button type="button" class="btn custom-btn btnEdit"
                            onclick="location.href='jobEdit.php'">Edit</button>
                    </div>
                </div>

                <!-- Delete Btn -->
                <div class="col-6 col-sm-6 col-xl-2 d-flex justify-content-center align-items-center">
                    <div class="container d-flex justify-content-start align-items-start">
                        <button name="btnDelete" class="btn custom-btn btnDelete" data-bs-toggle="modal"
                            data-bs-target="#deleteModal">Delete</button>

                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Job Deletion</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this job?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn custom-button"
                                            style="background-color: #AF514C; color: #FFFFFF;">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <!-- Job Name -->
            <div class="row companyName p-3 mx-3">
                <h3 class="jobName"><?php echo $jobTitle ?>&nbsp;|&nbsp;<?php echo $companyName ?></h3>
            </div>

            <div class="row d-flex justify-content-center align-items-center">
                <hr class="bar">
            </div>

            <div class="row jobDetails p-2 mx-4">
                <p> <span class="jobDetailsLabel">Salary Rate:</span>
                    ₱&nbsp;<?php echo number_format($salaryRate) ?>&nbsp;&nbsp;&nbsp;
                    |&nbsp;&nbsp; <span class="jobDetailsLabel">Experience Level:</span>
                    <?php echo $expLevel ?>&nbsp;&nbsp; |&nbsp;&nbsp; <span class="jobDetailsLabel">Job
                        Industry:</span>&nbsp;&nbsp;<?php echo $industry ?>
                </p>
            </div>

            <div class="row skill px-2 mx-4">
                <p>Skill Requirements:</p>
            </div>

            <div class="row skillDesc px-2 mx-4">
                <p>
                    <?php echo $skillRequirements ?>
                </p>
            </div>

            <div class="row jobDescTitle px-2 mx-4">
                <p>Job Description:</p>
            </div>

            <div class="row jobDesc px-2 mx-4">
                <p>
                    <?php echo $jobDescription ?>
                </p>
            </div>

        </div>

    </div>

    <!-- Footer -->
    <?php
    include("../assets/shared/footerAdmin.php");
    ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>