<?php
include("../process/adminJobEdit2.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit a Job</title>
    <link rel="icon" href="../assets/image/adminImage/stbLogoAdmin.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/adminCSS/adminJobEdit.css">
</head>

<body>

    <!-- Navigation -->
    <?php
    include("../assets/shared/navbarAdmin.php");
    ?>


    <div class="container main p-5" style="margin-top: 100px;">

        <form method="POST">
            <div class="container jobEdit">

                <!-- Job Form Title-->
                <div class="row pt-4 mx-5">
                    <p class="jobInfo">JOB INFORMATION FORM</p>
                </div>

                <!-- Forms -->
                <div class="row p-1 d-flex justify-content-center align-items-center">

                    <div class="col-12 col-sm-12 col-md-4 col-xl-4">
                        <div class="form-floating mb-3">
                            <input type="text" name="jobTitle" value="<?php echo $jobTitle ?>"
                                class="form-control forms" id="floatingInput" placeholder="Job Title">
                            <label for="floatingInput" class="titles">Job title</label>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-4 col-xl-4">
                        <div class="form-floating mb-3">
                            <input type="text" name="salaryRate" value="<?php echo $salaryRate ?>"
                                class="form-control forms" id="floatingInput" placeholder="Salary Rate">
                            <label for="floatingInput" class="titles">Salary Rate</label>
                        </div>
                    </div>

                    <?php


                    $entryLevelSelect = ($expLevel == 'Entry Level') ? 'selected' : '';
                    $midLevelSelect = ($expLevel == 'Mid Level') ? 'selected' : '';
                    $seniorLevelSelect = ($expLevel == 'Senior Level') ? 'selected' : '';


                    ?>
                    <div class="col-12 col-sm-12 col-md-4 col-xl-4">
                        <div class="form-floating mb-3">
                            <select name="expLevel" class="form-select forms" required id="floatingSelect"
                                aria-label="Floating label select example">
                                <option selected>Select an Exp Level</option>
                                <option value="Entry Level" <?php echo $entryLevelSelect ?>>Entry Level</option>
                                <option value="Mid Level" <?php echo $midLevelSelect ?>>Mid Level</option>
                                <option value="Senior Level" <?php echo $seniorLevelSelect ?>>Senior Level</option>
                            </select>
                            <label for="floatingSelect" class="titles">Experience Level</label>
                        </div>
                    </div>

                </div>

                <div class="row p-1 formBox d-flex justify-content-center align-items-center">

                    <div class="col-12 col-sm-12 col-md-4 col-xl-4">
                        <div class="form-floating mb-3">
                            <input type="text" name="companyName" value="<?php echo $companyName ?>"
                                class="form-control forms" id="floatingInput" placeholder="Company Name">
                            <label for="floatingInput" class="titles">Company Name</label>
                        </div>
                    </div>

                    <?php
                    $Barangay1Select = ($location == 'San Antonio') ? 'selected' : '';
                    $Barangay2Select = ($location == 'San Miguel') ? 'selected' : '';
                    $Barangay3Select = ($location == 'San Pedro') ? 'selected' : '';
                    $Barangay4Select = ($location == 'San Roque') ? 'selected' : '';
                    $Barangay5Select = ($location == 'San Vicente') ? 'selected' : '';
                    ?>

                    <div class="col-12 col-sm-12 col-md-4 col-xl-4">
                        <div class="form-floating mb-3">
                            <select name="barangay" class="form-select forms" required id="floatingSelect"
                                aria-label="Floating label select example">
                                <option selected>Select a Barangay</option>
                                <option value="San Antonio" <?php echo $Barangay1Select ?>>San Antonio</option>
                                <option value="San Miguel" <?php echo $Barangay2Select ?>>San Miguel</option>
                                <option value="San Pedro" <?php echo $Barangay3Select ?>>San Pedro</option>
                                <option value="San Roque" <?php echo $Barangay4Select ?>>San Roque</option>
                                <option value="San Vicente" <?php echo $Barangay5Select ?>>San Vicente</option>

                            </select>
                            <label for="floatingSelect" class="titles">Barangay</label>
                        </div>
                    </div>

                    <?php
                    $industry1Select = ($industry == 'Information Technology') ? 'selected' : '';
                    $industry2Select = ($industry == 'Business and Administration') ? 'selected' : '';
                    $industry3Select = ($industry == 'Manufacturing and Logistics') ? 'selected' : '';
                    ?>

                    <div class="col-12 col-sm-12 col-md-4 col-xl-4">
                        <div class="form-floating mb-3">
                        <select name="industry" class="form-select forms" required id="floatingSelect"
                                aria-label="Floating label select example">
                                <option selected>Select an Industry</option>
                                <option value="Information Technology" <?php echo $industry1Select ?>>Information Technology</option>
                                <option value="Business and Administration" <?php echo $industry2Select ?>>Business and Administration</option>
                                <option value="Manufacturing and Logistics" <?php echo $industry3Select ?>>Manufacturing and Logistics</option>
                            </select>
                            <label for="floatingInput" class="titles">Industry</label>
                        </div>
                    </div>

                </div>

                <div class="row p-1 formBox d-flex justify-content-center align-items-center">

                    <div class="col-12 col-sm-12 col-md-12 col-xl-12">
                        <div class="form-floating mb-3">
                            <textarea name="skillRequirements" class="form-control forms" placeholder="Skill Details"
                                id="floatingTextarea" style="height: 100px"><?php echo $skillRequirements ?></textarea>
                            <label for="floatingTextarea" class="titles">Skill Requirements</label>
                        </div>
                    </div>

                </div>

                <div class="row p-1 formBox d-flex justify-content-center align-items-center">

                    <div class="col-12 col-sm-12 col-md-12 col-xl-12">
                        <div class="form-floating mb-3">
                            <textarea name="jobDescription" class="form-control forms" placeholder="Skill Details"
                                id="floatingTextarea" style="height: 150px"><?php echo $jobDescription ?></textarea>
                            <label for="floatingTextarea" class="titles">Job Description</label>
                        </div>
                    </div>

                </div>

                <!-- Add btn -->
                <div class="row p-3 d-flex justify-content-center align-items-center">
                    <div class="container d-flex justify-content-center align-items-center p-2">
                        <button name="editButton" type="submit" class="btn btn-light btnEdit">Save
                            Changes</button></a>
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