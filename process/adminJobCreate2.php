<?php

if (isset($_POST['addJobButton'])) {

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

    $insertJobDetailQuery = "INSERT INTO jobdetail(jobTitle, salaryRate, experienceLevel, companyName , jobLocation, jobIndustry, jobSkillsDescription, fullDescription) 
    VALUES ('$jobTitle','$formattedSalary','$expLevel','$companyName','$location','$industry','$skillRequirements','$jobDescription');";
    executeQuery($insertJobDetailQuery);

    $lastInsertedID = mysqli_insert_id($conn);

    $insertPostQuery = "INSERT INTO `post`(jobDetailID) VALUES ('$lastInsertedID');";
    executeQuery($insertPostQuery);

    header('location:adminJobList.php');

}

?>