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

if (isset($_POST['btnDelete'])) {

    $jobID = $_POST['jobID'];
    $jobDeletequery1 = "DELETE FROM `jobdetail` WHERE jobDetailID = '$jobID';";
    $jobDeletequery2 = "DELETE FROM `post` WHERE jobDetailID = '$jobID';";
    executeQuery($jobDeletequery1);
    executeQuery($jobDeletequery2);
    header('location:adminJobList.php');
}

?>