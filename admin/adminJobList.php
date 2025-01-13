<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STBjobs: Admin</title>
    <link rel="icon" href="../assets/image/adminImage/stbLogoAdmin.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/adminCSS/jobList.css">
</head>

<body>

    <!-- Home -->
    <div class="container content">

        <div class="row">

            <!-- Tagline -->
            <div class="col-12 col-sm-12 col-md-8 col-xl-8 order-1">

                <p class="greet">
                    Welcome to&nbsp;<span class="stb">STB</span><br>
                    &nbsp;<span class="jobs">JOBS</span>
                </p>

                <p class="tagline">
                    Connecting Opportunities in Santo Tomas, Batangas
                </p>

                <hr class="new5">

            </div>

            <!-- Add New Job Btn -->
            <div
                class="col-12 col-sm-12 col-md-4 col-xl-4 order-2 p-3 d-flex justify-content-center align-items-center">
                <a href="jobCreate.php"><button type="button" class="btn btn-light btnAdd">+ Add New Job</button></a>
            </div>

            <!-- Job List -->

            <div class="col-12 col-sm-12 col-md-8 col-xl-8 order-4 order-sm-4 order-md-3 order-xl-3 p-1">

                <div class="container" style="background-color: #4D4D4D; border-radius: 20px 20px 20px 20px; height:500px; overflow-y: auto;">

                    <div class="container">

                        <div class="row pt-4">
                            <p class="datePosted">Posted 1 day ago</p>
                        </div>

                        <div class="row location">

                            <div class="col-12 col-sm-12 col-md-8 col-xl-8 d-flex align-items-center"
                                style="text-align: left;">
                                <img class="img-fluid locationImg" src="../assets/image/userImage/location.png">
                                <p class="barangay pt-4 mx-2">San Antonio</p>
                            </div>

                            <div
                                class="col-6 col-sm-6 col-md-2 col-xl-2 d-flex justify-content-center align-items-center">
                                <a href="jobEdit.php" name="btnEdit" class="btnEdit">Edit</a>
                            </div>

                            <div
                                class="col-6 col-sm-6 col-md-2 col-xl-2 d-flex justify-content-center align-items-center">
                                <button name="btnDelete" class="btnDelete" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">Delete</button>


                                <div class="modal fade" id="deleteModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                        <div class="row companyName p-2">
                            <h3 class="jobName">Job Name | Company Name</h3>
                        </div>

                        <div class="row jobDetails p-2">
                            <p>Salary Rate&nbsp;&nbsp; |&nbsp;&nbsp; Experience Level&nbsp;&nbsp; |&nbsp;&nbsp; Job
                                Industry
                            </p>
                        </div>

                        <div class="row skill px-2">
                            <p>Skill Description:</p>
                        </div>

                        <div class="row skillDesc px-2">
                            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco.
                            </p>
                        </div>

                        <div class="row jobDescTitle px-2">
                            <p>Job Description:</p>
                        </div>

                        <div class="row jobDesc px-2">
                            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut
                                labore et dolore magna aliqua.<a href="adminJobView.php"><button type="button"
                                        class="btn custom-button btn-link" style="color: #21a027;">See
                                        More...</button></a>
                            </p>

                        </div>

                        <div class="row">
                            <hr class="bar">
                        </div>

                    </div>

                    <div class="container">

                        <div class="row pt-4">
                            <p class="datePosted">Posted 1 day ago</p>
                        </div>

                        <div class="row location">

                            <div class="col-12 col-sm-12 col-md-8 col-xl-8 d-flex align-items-center"
                                style="text-align: left;">
                                <img class="img-fluid locationImg" src="../assets/image/userImage/location.png">
                                <p class="barangay pt-4 mx-2">San Antonio</p>
                            </div>

                            <div
                                class="col-6 col-sm-6 col-md-2 col-xl-2 d-flex justify-content-center align-items-center">
                                <a href="jobEdit.php" name="btnEdit" class="btnEdit">Edit</a>
                            </div>

                            <div
                                class="col-6 col-sm-6 col-md-2 col-xl-2 d-flex justify-content-center align-items-center">
                                <button name="btnDelete" class="btnDelete" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">Delete</button>


                                <div class="modal fade" id="deleteModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Job Deletion</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Sure kana diyan?
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

                        <div class="row companyName p-2">
                            <h3 class="jobName">Job Name | Company Name</h3>
                        </div>

                        <div class="row jobDetails p-2">
                            <p>Salary Rate&nbsp;&nbsp; |&nbsp;&nbsp; Experience Level&nbsp;&nbsp; |&nbsp;&nbsp; Job
                                Industry
                            </p>
                        </div>

                        <div class="row skill px-2">
                            <p>Skill Description:</p>
                        </div>

                        <div class="row skillDesc px-2">
                            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut
                                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco.
                            </p>
                        </div>

                        <div class="row jobDescTitle px-2">
                            <p>Job Description:</p>
                        </div>

                        <div class="row jobDesc px-2">
                            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut
                                labore et dolore magna aliqua.<a href="adminJobView.php"><button type="button"
                                        class="btn custom-button btn-link" style="color: #21a027;">See
                                        More...</button></a>
                            </p>

                        </div>

                        <div class="row">
                            <hr class="bar">
                        </div>

                    </div>


    
                </div>

            </div>

            <!-- Filter and Sort -->
            <div class="col-12 col-sm-12 col-md-4 col-xl-4 order-3 order-sm-3 order-md-4 order-xl-4 p-1">
                <div class="container" style="background-color: #4D4D4D; border-radius: 20px 20px 20px 20px;">

                    <div class="row pt-4 d-flex justify-content-center align-items-center">
                        <p class="filter">FILTER BY:</p>
                    </div>

                    <div class="row pt-2 d-flex justify-content-center align-items-center">
                        <div
                            class="col-4 col-sm-4 col-md-6 col-xl-6 p-2 d-flex justify-content-center align-items-center">
                            <div class="dropdown">
                                <button class="btn custom-button dropdown-toggle filterbtn p-1" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Salary Rate
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">25k</a></li>
                                </ul>
                            </div>
                        </div>

                        <div
                            class="col-4 col-sm-4 col-md-6 col-xl-6 p-2 d-flex justify-content-center align-items-center">
                            <div class="dropdown">
                                <button class="btn custom-button dropdown-toggle filterbtn p-1" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Indsutry
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">IT</a></li>
                                </ul>
                            </div>
                        </div>

                        <div
                            class="col-4 col-sm-4 col-md-6 col-xl-6 p-2 d-flex justify-content-center align-items-center">
                            <div class="dropdown">
                                <button class="btn custom-button dropdown-toggle filterbtn p-1" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Location
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">San Antonio</a></li>
                                </ul>
                            </div>
                        </div>

                        <div
                            class="col-6 col-sm-6 col-md-6 col-xl-6 p-2 d-flex justify-content-center align-items-center">
                            <div class="dropdown">
                                <button class="btn custom-button dropdown-toggle filterbtn p-1" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Exp Level
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Intermediate</a></li>
                                </ul>
                            </div>
                        </div>

                        <div
                            class="col-6 col-sm-6 col-md-12 col-xl-12 p-2 d-flex justify-content-center align-items-center">
                            <div class="dropdown">
                                <button class="btn custom-button dropdown-toggle filterbtn p-1" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Date Posted
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Jan 24, 2025</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <div class="row pt-4 d-flex justify-content-center align-items-center">
                        <p class="filter">SORT BY:</p>
                    </div>

                    <div class="row pt-2 d-flex justify-content-center align-items-center">
                        <div
                            class="col-6 col-sm-6 col-md-6 col-xl-6 p-2 d-flex justify-content-center align-items-center pb-3">
                            <div class="dropdown">
                                <button class="btn custom-button dropdown-toggle filterbtn p-1" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Most Recent
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">2025</a></li>
                                </ul>
                            </div>
                        </div>

                        <div
                            class="col-6 col-sm-6 col-md-6 col-xl-6 p-2 d-flex justify-content-center align-items-center pb-3 ">
                            <div class="dropdown">
                                <button class="btn custom-button dropdown-toggle filterbtn p-1" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Salary [↑ - ↓]
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Higher than 20k</a></li>
                                    <li><a class="dropdown-item" href="#">Lower than 20k</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>


                </div>


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