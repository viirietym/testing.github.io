<?php

session_start ();
$userID = $_SESSION['userID']; 

if (isset($_POST['addJobButton'])) {

    $jobTitle = $_POST['jobTitle'];
    $salaryRate = $_POST['salaryRate'];
    $expLevel = $_POST['expLevel'];
    $companyName = $_POST['companyName'];
    $location = $_POST['barangay'];
    $industry = $_POST['industry'];
    $skillRequirements = $_POST['skillRequirements'];
    $jobDescription = $_POST['jobDescription'];


    $insertJobDetailQuery = "INSERT INTO jobdetail(jobTitle, salaryRate, experienceLevel, companyName , jobLocation, jobIndustry, jobSkillsDescription, fullDescription) 
    VALUES ('$jobTitle','$salaryRate','$expLevel','$companyName','$location','$industry','$skillRequirements','$jobDescription');";
    executeQuery($insertJobDetailQuery);

    $lastInsertedID = mysqli_insert_id($conn); 

    $insertPostQuery = "INSERT INTO `post`(`userID`, `jobDetailID`) VALUES ('$userID','$lastInsertedID');";
    executeQuery($insertPostQuery);

    header('location:adminJobList.php');

}

?>