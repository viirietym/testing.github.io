<?php

include("../connect.php");

session_start();

if (isset($_GET['jobID'])) {

    $jobID = $_GET['jobID'];

    $getEditQuery = "SELECT `jobLocation`, `jobTitle`, `salaryRate`, `experienceLevel`, `jobIndustry`, `fullDescription`, `companyName`, `jobSkillsDescription` FROM `jobdetail` WHERE jobDetailID = $jobID;";
    $jobEditResult = executeQuery($getEditQuery);

    while ($jobRow = mysqli_fetch_assoc($jobEditResult)) {

        $jobTitle = $jobRow['jobTitle'];
        $salaryRate = $jobRow['salaryRate'];
        $expLevel = $jobRow['experienceLevel'];
        $companyName = $jobRow['companyName'];
        $location = $jobRow['jobLocation'];
        $industry = $jobRow['jobIndustry'];
        $skillRequirements = $jobRow['jobSkillsDescription'];
        $jobDescription = $jobRow['fullDescription'];

    }

}

if (isset($_POST['editButton'])) {

    $jobTitle = $_POST['jobTitle'];
    $salaryRate = $_POST['salaryRate'];
    $expLevel = $_POST['expLevel'];
    $companyName = $_POST['companyName'];
    $location = $_POST['barangay'];
    $industry = $_POST['industry'];
    $skillRequirements = $_POST['skillRequirements'];
    $jobDescription = $_POST['jobDescription'];

    $jobTitle = addslashes($jobTitle);
    $salaryRate = addslashes($salaryRate);
    $companyName = addslashes($companyName);
    $industry = addslashes($industry);
    $skillRequirements = addslashes($skillRequirements);
    $jobDescription = addslashes($jobDescription);

    $salaryRate = explode(",", $salaryRate);
    $formattedSalary = implode("", $salaryRate);

    $updateJobDetailQuery = "UPDATE `jobdetail` SET `jobLocation`='$location',`jobTitle`='$jobTitle',`salaryRate`='$formattedSalary',`experienceLevel`='$expLevel',`jobIndustry`='$industry',`fullDescription`='$jobDescription',`companyName`='$companyName',`jobSkillsDescription`='$skillRequirements' WHERE jobDetailID = $jobID;";
    executeQuery($updateJobDetailQuery);

    $lastInsertedID = mysqli_insert_id($conn);

    $updatePostQuery = "UPDATE `post` SET `updatedAt` = CURRENT_TIMESTAMP() WHERE jobDetailID = $jobID;";
    executeQuery($updatePostQuery);

    header('location:adminJobList.php');  

}


?>