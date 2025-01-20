<?php

include("../connect.php");

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

    header('location:adminJobList.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Job</title>
    <link rel="icon" href="../assets/image/adminImage/stbLogoAdmin.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/adminCSS/adminJobCreate.css">
</head>

<body>

    <!-- Navigation -->
    <?php
    include("../assets/shared/navbarAdmin.php");
    ?>


    <div class="container main p-5" style="margin-top: 100px;">

        <form method="POST">
            <div class="container jobCreate">

                <!-- Job Form Title-->
                <div class="row pt-4 mx-5">
                    <p class="jobInfo">JOB INFORMATION FORM</p>
                </div>

                <!-- Forms -->
                <div class="row p-1 d-flex justify-content-center align-items-center">

                    <div class="col-12 col-sm-12 col-md-4 col-xl-4">
                        <div class="form-floating mb-3">
                            <input name="jobTitle" type="text" class="form-control forms" required id="floatingInput"
                                placeholder="Job Title">
                            <label for="floatingInput" class="titles">Job title</label>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-4 col-xl-4">
                        <div class="form-floating mb-3">
                            <input name="salaryRate" type="text" class="form-control forms" required id="floatingInput"
                                placeholder="Salary Rate">
                            <label for="floatingInput" class="titles">Salary Rate</label>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-4 col-xl-4">
                        <div class="form-floating mb-3">
                            <select name="expLevel" class="form-select forms" required id="floatingSelect"
                                aria-label="Floating label select example">
                                <option selected>Select an Exp Level</option>
                                <option value="Entry Level">Entry Level</option>
                                <option value="Mid Level">Mid Level</option>
                                <option value="Expert Level">Expert Level</option>
                            </select>
                            <label for="floatingSelect" class="titles">Experience Level</label>
                        </div>
                    </div>

                </div>

                <div class="row p-1 formBox d-flex justify-content-center align-items-center">

                    <div class="col-12 col-sm-12 col-md-4 col-xl-4">
                        <div class="form-floating mb-3">
                            <input name="companyName" type="text" class="form-control forms" required id="floatingInput"
                                placeholder="Company Name">
                            <label for="floatingInput" class="titles">Company Name</label>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-4 col-xl-4">
                        <div class="form-floating mb-3">
                            <select name="barangay" class="form-select forms" required id="floatingSelect"
                                aria-label="Floating label select example">
                                <option selected>Select a Barangay</option>
                                <option value="San Agustin">San Agustin</option>
                                <option value="Santa Ana">Santa Ana</option>
                                <option value="Santa Clara">Santa Clara</option>
                                <option value="San Roque">San Roque</option>
                                <option value="San Vicente">San Vicente</option>
                            </select>
                            <label for="floatingSelect" class="titles">Barangay</label>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-4 col-xl-4">
                        <div class="form-floating mb-3">
                            <input name="industry" type="text" class="form-control forms" required id="floatingInput"
                                placeholder="Industry">
                            <label for="floatingInput" class="titles">Industry</label>
                        </div>
                    </div>

                </div>

                <div class="row p-1 formBox d-flex justify-content-center align-items-center">

                    <div class="col-12 col-sm-12 col-md-12 col-xl-12">
                        <div class="form-floating mb-3">
                            <textarea name="skillRequirements" class="form-control forms" placeholder="Skill Details"
                            required id="floatingTextarea" style="height: 100px"></textarea>
                            <label for="floatingTextarea" class="titles">Skill Requirements</label>
                        </div>
                    </div>

                </div>

                <div class="row p-1 formBox d-flex justify-content-center align-items-center">

                    <div class="col-12 col-sm-12 col-md-12 col-xl-12">
                        <div class="form-floating mb-3">
                            <textarea name="jobDescription" class="form-control forms" placeholder="Skill Details"
                            required  id="floatingTextarea" style="height: 150px"></textarea>
                            <label for="floatingTextarea" class="titles">Job Description</label>
                        </div>
                    </div>

                </div>

                <!-- Add btn -->
                <div class="row p-3 d-flex justify-content-center align-items-center">
                    <div class="container d-flex justify-content-center align-items-center p-2">
                        <button name="addJobButton" type="submit"
                                class="btn btn-light btnAdd">Add New
                                Job</button></a>
                    </div>
                </div>

            </div>

        </form>
    </div>

    <!-- Footer -->
    <?php
    include("../assets/shared/footerAdmin.php");
    ?>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</html>