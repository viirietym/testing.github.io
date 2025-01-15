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
    <link rel="stylesheet" href="../assets/css/adminCSS/jobCreate.css">
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
                <div class="row p-2 d-flex justify-content-center align-items-center">

                    <div class="col-12 col-sm-12 col-md-4 col-xl-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control forms" id="floatingInput" placeholder="Job Title">
                            <label for="floatingInput" class="titles">Job title</label>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-4 col-xl-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control forms" id="floatingInput" placeholder="Salary Rate">
                            <label for="floatingInput" class="titles">Salary Rate</label>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-4 col-xl-4">
                        <div class="form-floating mb-3">
                            <select class="form-select forms" required id="floatingSelect"
                                aria-label="Floating label select example">
                                <option selected>Select an Exp Level</option>
                                <option value="1">Common</option>
                                <option value="2">Intermediate</option>
                                <option value="3">Professional</option>
                            </select>
                            <label for="floatingSelect" class="titles">Experience Level</label>
                        </div>
                    </div>

                </div>

                <div class="row p-1 formBox d-flex justify-content-center align-items-center">

                    <div class="col-12 col-sm-12 col-md-4 col-xl-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control forms" id="floatingInput" placeholder="Company Name">
                            <label for="floatingInput" class="titles">Company Name</label>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-4 col-xl-4">
                        <div class="form-floating mb-3">
                            <select class="form-select forms" required id="floatingSelect"
                                aria-label="Floating label select example">
                                <option selected>Select a Barangay</option>
                                <option value="1">San Roque</option>
                                <option value="2">Santa Ana</option>
                                <option value="3">San Agustin</option>
                            </select>
                            <label for="floatingSelect" class="titles">Barangay</label>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-4 col-xl-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control forms" id="floatingInput" placeholder="Industry">
                            <label for="floatingInput" class="titles">Industry</label>
                        </div>
                    </div>

                </div>

                <div class="row p-1 formBox d-flex justify-content-center align-items-center">

                    <div class="col-12 col-sm-12 col-md-12 col-xl-12">
                        <div class="form-floating mb-3">
                            <textarea class="form-control forms" placeholder="Skill Details" id="floatingTextarea"
                                style="height: 100px"></textarea>
                            <label for="floatingTextarea" class="titles">Skill Requirements</label>
                        </div>
                    </div>

                </div>

                <div class="row p-1 formBox d-flex justify-content-center align-items-center">

                    <div class="col-12 col-sm-12 col-md-12 col-xl-12">
                        <div class="form-floating mb-3">
                            <textarea class="form-control forms" placeholder="Skill Details" id="floatingTextarea"
                                style="height: 150px"></textarea>
                            <label for="floatingTextarea" class="titles">Job Description</label>
                        </div>
                    </div>

                </div>

                <!-- Add btn -->
                <div class="row p-3 d-flex justify-content-center align-items-center">
                    <div class="container d-flex justify-content-center align-items-center p-2">
                        <a href="adminJobList.php"><button type="button" class="btn btn-light btnAdd">Add New
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