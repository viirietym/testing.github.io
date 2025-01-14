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
    <link rel="stylesheet" href="../assets/css/adminCSS/jobView.css">
</head>

<body>
    <div class="container p-5">

        <div class="container job">

            <!-- Date Posted -->
            <div class="row pt-4 mx-5">
                <p class="datePosted">Posted 1 day ago</p>
            </div>

            <div class="row location mx-3">
                <!-- Location -->
                <div class="col-12 col-sm-12 col-md-9 col-xl-9 d-flex align-items-center" style="text-align: left;">
                    <img class="img-fluid locationImg mx-3" src="../assets/image/userImage/location.png">
                    <p class="barangay pt-3">San Antonio</p>
                </div>

                <!-- Edit Btn -->
                <div class="col-6 col-sm-6 col-md-1 col-xl-1 d-flex justify-content-center align-items-center">
                    <a href="jobEdit.php"><button type="button" class="btn custom-btn btnEdit">Edit</button></a>
                </div>

                <!-- Delete Btn -->
                <div class="col-6 col-sm-6 col-md-2 col-xl-2 d-flex justify-content-center align-items-center">
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

            <!-- Job Name -->
            <div class="row companyName p-3 mx-3">
                <h3 class="jobName">Job Name | Company Name</h3>
            </div>

            <div class="row d-flex justify-content-center align-items-center">
                <hr class="bar">
            </div>

            <div class="row jobDetails p-2 mx-4">
                <p>Salary Rate&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Experience
                    Level&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Job
                    Industry
                </p>
            </div>

            <div class="row skill px-2 mx-4">
                <p>Skill Description:</p>
            </div>

            <div class="row skillDesc px-2 mx-4">
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco.
                </p>
            </div>

            <div class="row jobDescTitle px-2 mx-4">
                <p>Job Description:</p>
            </div>

            <div class="row jobDesc px-2 mx-4">
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum."
                </p>
            </div>

        </div>

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