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
    <link rel="stylesheet" href="../assets/css/adminCSS/adminJobList.css">
</head>

<body>

    <!-- Navigation -->
    <?php
    include("../assets/shared/navbarAdmin.php");
    ?>

    <!-- Home -->
    <div class="container content" style="margin-top: 150px; margin-bottom: 80px">

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
                <div class="container buttonContainer d-flex justify-content-center align-items-center">
                    <a href="jobCreate.php"><button type="button" class="btn btn-light btnAdd">+ Add New
                            Job</button></a>
                </div>
            </div>

            <!-- Job List -->

            <div class="col-12 col-sm-12 col-md-8 col-xl-8 order-4 order-sm-4 order-md-3 order-xl-3 p-1">

                <div class="container jobListContainer">

                    <?php
                    include("../process/adminJobList2.php");
                    ?>

                </div>

            </div>

            <!-- Filter and Sort -->
            <div class="col-12 col-sm-12 col-md-4 col-xl-4 order-3 order-sm-3 order-md-4 order-xl-4 p-1">
                <div class="container" style="background-color: #4D4D4D; border-radius: 20px 20px 20px 20px;">

                    <div class="filters col-12 d-flex flex-column align-items-center py-5">
                        <h5>FILTER BY:</h5>

                        <!-- Salary Rate -->
                        <div class="row w-100 text-center mt-2">
                            <div class="col-4 col-lg-6 mb-2 mb-md-0 order-1 order-md-1 p-1">
                                <div class="dropdown w-100">
                                    <button class="btn btn-light w-100 dropdown-toggle" type="button"
                                        id="dropdownSalaryRate" data-bs-toggle="dropdown" aria-expanded="false">
                                        Salary Rate
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownSalaryRate">
                                        <li><a class="dropdown-item" href="adminJobList.php">---</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?salaryRate=1&<?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['location']) ? 'location=' . $_GET['location'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?><?php echo isset($_GET['recent']) ? 'recent=' . $_GET['recent'] . '&' : ''; ?><?php echo isset($_GET['salaryRange']) ? 'salaryRange=' . $_GET['salaryRange'] . '&' : ''; ?>">
                                                Below 10,000php</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?salaryRate=2&<?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['location']) ? 'location=' . $_GET['location'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?><?php echo isset($_GET['recent']) ? 'recent=' . $_GET['recent'] . '&' : ''; ?><?php echo isset($_GET['salaryRange']) ? 'salaryRange=' . $_GET['salaryRange'] . '&' : ''; ?>">
                                                10,000-30,000 php</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?salaryRate=3&<?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['location']) ? 'location=' . $_GET['location'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?><?php echo isset($_GET['recent']) ? 'recent=' . $_GET['recent'] . '&' : ''; ?><?php echo isset($_GET['salaryRange']) ? 'salaryRange=' . $_GET['salaryRange'] . '&' : ''; ?>">
                                                30,000Above</a></li>
                                        
                                    </ul>
                                </div>
                            </div>

                            <!-- Industry -->
                            <div class="col-4 col-lg-6 mb-2 mb-md-0 order-2 order-md-2 p-1">
                                <div class="dropdown w-100">
                                    <button class="btn btn-light w-100 dropdown-toggle" type="button"
                                        id="dropdownIndustry" data-bs-toggle="dropdown" aria-expanded="false">
                                        Industry
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownIndustry">
                                        <li><a class="dropdown-item" href="adminJobList.php">---</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?industry=1&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['location']) ? 'location=' . $_GET['location'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?><?php echo isset($_GET['recent']) ? 'recent=' . $_GET['recent'] . '&' : ''; ?><?php echo isset($_GET['salaryRange']) ? 'salaryRange=' . $_GET['salaryRange'] . '&' : ''; ?>">
                                                Information Technology</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?industry=2&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['location']) ? 'location=' . $_GET['location'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?><?php echo isset($_GET['recent']) ? 'recent=' . $_GET['recent'] . '&' : ''; ?><?php echo isset($_GET['salaryRange']) ? 'salaryRange=' . $_GET['salaryRange'] . '&' : ''; ?>">
                                                Business and Administration</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?industry=3&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['location']) ? 'location=' . $_GET['location'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?><?php echo isset($_GET['recent']) ? 'recent=' . $_GET['recent'] . '&' : ''; ?><?php echo isset($_GET['salaryRange']) ? 'salaryRange=' . $_GET['salaryRange'] . '&' : ''; ?>">
                                                Manufacturing and Logistics</a></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Location -->
                            <div class="col-4 col-lg-6 order-3 order-md-3 p-1">
                                <div class="dropdown w-100">
                                    <button class="btn btn-light w-100 dropdown-toggle" type="button"
                                        id="dropdownLocation" data-bs-toggle="dropdown" aria-expanded="false">
                                        Location
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownLocation">
                                        <li><a class="dropdown-item" href="adminJobList.php">---</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?location=1&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?><?php echo isset($_GET['recent']) ? 'recent=' . $_GET['recent'] . '&' : ''; ?><?php echo isset($_GET['salaryRange']) ? 'salaryRange=' . $_GET['salaryRange'] . '&' : ''; ?>">
                                                San Antonio</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?location=2&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?><?php echo isset($_GET['recent']) ? 'recent=' . $_GET['recent'] . '&' : ''; ?><?php echo isset($_GET['salaryRange']) ? 'salaryRange=' . $_GET['salaryRange'] . '&' : ''; ?>">
                                                San Vicente</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?location=3&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?><?php echo isset($_GET['recent']) ? 'recent=' . $_GET['recent'] . '&' : ''; ?><?php echo isset($_GET['salaryRange']) ? 'salaryRange=' . $_GET['salaryRange'] . '&' : ''; ?>">
                                                San Roque</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?location=4&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?><?php echo isset($_GET['recent']) ? 'recent=' . $_GET['recent'] . '&' : ''; ?><?php echo isset($_GET['salaryRange']) ? 'salaryRange=' . $_GET['salaryRange'] . '&' : ''; ?>">
                                                San Miguel</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?location=5&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?><?php echo isset($_GET['recent']) ? 'recent=' . $_GET['recent'] . '&' : ''; ?><?php echo isset($_GET['salaryRange']) ? 'salaryRange=' . $_GET['salaryRange'] . '&' : ''; ?>">
                                                San Pedro</a></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Exp Level -->
                            <div class="col-6 col-lg-6 mb-2 mb-md-0 order-4 order-md-4 p-1">
                                <div class="dropdown w-100">
                                    <button class="btn btn-light w-100 dropdown-toggle" type="button"
                                        id="dropdownExpLevel" data-bs-toggle="dropdown" aria-expanded="false">
                                        Exp Level
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownExpLevel">
                                        <li><a class="dropdown-item" href="adminJobList.php">---</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?expLevel=1&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['location']) ? 'location=' . $_GET['location'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?><?php echo isset($_GET['recent']) ? 'recent=' . $_GET['recent'] . '&' : ''; ?><?php echo isset($_GET['salaryRange']) ? 'salaryRange=' . $_GET['salaryRange'] . '&' : ''; ?>">
                                                Entry Level</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?expLevel=2&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['location']) ? 'location=' . $_GET['location'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?><?php echo isset($_GET['recent']) ? 'recent=' . $_GET['recent'] . '&' : ''; ?><?php echo isset($_GET['salaryRange']) ? 'salaryRange=' . $_GET['salaryRange'] . '&' : ''; ?>">
                                                Mid Level</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?expLevel=3&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['location']) ? 'location=' . $_GET['location'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?><?php echo isset($_GET['recent']) ? 'recent=' . $_GET['recent'] . '&' : ''; ?><?php echo isset($_GET['salaryRange']) ? 'salaryRange=' . $_GET['salaryRange'] . '&' : ''; ?>">
                                                Senior Level</a></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Date Posted -->
                            <div class="col-6 col-lg-12 mb-2 mb-md-0 order-5 order-md-6 p-1">
                                <div class="dropdown w-100">
                                    <button class="btn btn-light w-100 dropdown-toggle" type="button"
                                        id="dropdownDatePosted" data-bs-toggle="dropdown" aria-expanded="false">
                                        Date Posted
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownDatePosted">
                                        <li><a class="dropdown-item" href="adminJobList.php">---</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?datePosted=1&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['location']) ? 'location=' . $_GET['location'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?><?php echo isset($_GET['recent']) ? 'recent=' . $_GET['recent'] . '&' : ''; ?><?php echo isset($_GET['salaryRange']) ? 'salaryRange=' . $_GET['salaryRange'] . '&' : ''; ?>">
                                                Last 24 Hours</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?datePosted=2&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['location']) ? 'location=' . $_GET['location'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?><?php echo isset($_GET['recent']) ? 'recent=' . $_GET['recent'] . '&' : ''; ?><?php echo isset($_GET['salaryRange']) ? 'salaryRange=' . $_GET['salaryRange'] . '&' : ''; ?>">
                                                Last 7 Days</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?datePosted=3&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['location']) ? 'location=' . $_GET['location'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?><?php echo isset($_GET['recent']) ? 'recent=' . $_GET['recent'] . '&' : ''; ?><?php echo isset($_GET['salaryRange']) ? 'salaryRange=' . $_GET['salaryRange'] . '&' : ''; ?>">
                                                Last 30 Days</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <h5 class="mt-4">SORT BY:</h5>

                        <!-- Most Recent and Salary -->
                        <div class="row w-100 text-center mt-2">
                            <div class="col-6 col-lg-6 mb-2 mb-md-0 p-1">
                                <div class="dropdown w-100">
                                    <button class="btn btn-light w-100 dropdown-toggle" type="button"
                                        id="dropdownMostRecent" data-bs-toggle="dropdown" aria-expanded="false">
                                        Most Recent
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMostRecent">
                                        <li><a class="dropdown-item" href="adminJobList.php">---</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?recent=1&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['location']) ? 'location=' . $_GET['location'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?>">
                                                Newest</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?recent=2&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['location']) ? 'location=' . $_GET['location'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?>">
                                                Oldest</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-6 col-lg-6 p-1">
                                <div class="dropdown w-100 ">
                                    <button class="btn btn-light w-100 dropdown-toggle" type="button"
                                        id="dropdownSalary" data-bs-toggle="dropdown" aria-expanded="false">
                                        Salary [↑ - ↓]
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownSalary">
                                        <li><a class="dropdown-item" href="adminJobList.php">---</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?salaryRange=1&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['location']) ? 'location=' . $_GET['location'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?>">
                                                Low to High</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?salaryRange=2&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['location']) ? 'location=' . $_GET['location'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?>">
                                                High to Low</a></li>
                                    </ul>
                                </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">

        </script>

</body>

</html>