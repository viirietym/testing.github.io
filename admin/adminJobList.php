<?php

include("../connect.php");
session_start();

$jobDetailquery = "SELECT jobdetail.jobDetailID, jobdetail.jobTitle, jobdetail.jobLocation, jobdetail.salaryRate, jobdetail.experienceLevel, jobdetail.jobIndustry, LEFT (jobdetail.fullDescription, 100) AS shortenedDesc, jobdetail.companyName, jobdetail.jobSkillsDescription, post.datePosted 
FROM `jobdetail` LEFT JOIN post ON jobdetail.jobDetailID = post.jobDetailID";

$jobDetailID = '';
$jobTitle = '';
$salaryRate = '';
$expLevel = '';
$companyName = '';
$location = '';
$industry = '';
$skillRequirements = '';
$jobDescription = '';
$datePosted = '';

$jobFilter = [];

if (isset($_GET['salaryRate'])) {

    $salary = $_GET['salaryRate'];

    switch ($salary) {
        case "1":
            $jobFilter[] = "salaryRate <= 10000";
            break;

        case "2":
            $jobFilter[] = "salaryRate >= 10000 and salaryRate <= 30000";
            break;

        case "3":
            $jobFilter[] = "salaryRate >= 30000";
            break;

        default:
            $jobFilter[] = "salaryRate = null";

    }

}

if (isset($_GET['industry'])) {

    $industry = $_GET['industry'];

    switch ($industry) {
        case "1":
            $jobFilter[] = "jobIndustry = 'Information Technology'";
            break;

        case "2":
            $jobFilter[] = "jobIndustry = 'Business and Administration'";
            break;

        case "3":
            $jobFilter[] = "jobIndustry = 'Manufacturing and Logistics'";
            break;

        default:
            $jobFilter[] = "jobIndustry = null";

    }

}

if (isset($_GET['location'])) {

    $location = $_GET['location'];

    switch ($location) {
        case "1":
            $jobFilter[] = "jobLocation = 'San Antonio'";
            break;

        case "2":
            $jobFilter[] = "jobLocation = 'San Vicente'";
            break;

        case "3":
            $jobFilter[] = "jobLocation = 'San Roque'";
            break;

        case "4":
            $jobFilter[] = "jobLocation = 'San Miguel'";
            break;

        case "5":
            $jobFilter[] = "jobLocation = 'San Pedro'";
            break;

        default:
            $jobFilter[] = "jobLocation = null";

    }

}

if (isset($_GET['expLevel'])) {

    $expLevel = $_GET['expLevel'];

    switch ($expLevel) {
        case "1":
            $jobFilter[] = "experienceLevel = 'Entry Level'";
            break;

        case "2":
            $jobFilter[] = "experienceLevel = 'Mid Level'";
            break;

        case "3":
            $jobFilter[] = "experienceLevel = 'Senior Level'";
            break;

        default:
            $jobFilter[] = "experienceLevel = null";

    }

}

if (isset($_GET['datePosted'])) {

    $datePosted = $_GET['datePosted'];

    switch ($datePosted) {
        case "1":
            $jobFilter[] = "datePosted >= UNIX_TIMESTAMP(DATE_SUB(NOW(),INTERVAL 1 DAY))";
            break;

        case "2":
            $jobFilter[] = "datePosted >= UNIX_TIMESTAMP(DATE_SUB(NOW(),INTERVAL 7 DAY))";
            break;

        case "3":
            $jobFilter[] = "datePosted >= UNIX_TIMESTAMP(DATE_SUB(NOW(),INTERVAL 30 DAY))";
            break;

        default:
            $jobFilter[] = "datePosted = null";

    }

}

if (count($jobFilter) > 0) {
    $jobDetailquery = $jobDetailquery . " WHERE " . implode(' AND ', $jobFilter);
}

$jobDetailresult = executeQuery($jobDetailquery);

?>

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

                    while ($jobRow = mysqli_fetch_assoc($jobDetailresult)) {

                        $jobDetailID = $jobRow['jobDetailID'];
                        $jobTitle = $jobRow['jobTitle'];
                        $salaryRate = $jobRow['salaryRate'];
                        $expLevel = $jobRow['experienceLevel'];
                        $companyName = $jobRow['companyName'];
                        $location = $jobRow['jobLocation'];
                        $industry = $jobRow['jobIndustry'];
                        $skillRequirements = $jobRow['jobSkillsDescription'];
                        $jobDescription = $jobRow['shortenedDesc'];
                        $datePosted = $jobRow['datePosted'];


                        ?>

                        <div class="container">

                            <div class="row pt-4">
                                <p class="datePosted" id="timeAgo<?php echo $jobRow['jobDetailID'] ?>">Posted:&nbsp; </p>
                            </div>

                            <div class="row location">

                                <div class="col-12 col-sm-12 col-md-8 col-xl-8 d-flex align-items-center"
                                    style="text-align: left;">
                                    <img class="img-fluid locationImg" src="../assets/image/userImage/location.png">
                                    <p class="barangay pt-4 mx-2"><?php echo $location ?></p>
                                </div>

                                <div class="col-6 col-sm-6 col-xl-2 d-flex justify-content-center align-items-center">
                                    <a href="jobEdit.php" name="btnEdit" class="btnEdit">Edit</a>
                                </div>

                                <div class="col-6 col-sm-6 col-xl-2 d-flex justify-content-center align-items-center">
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
                                <h3 class="jobName"><?php echo $jobTitle ?>&nbsp;|&nbsp;<?php echo $companyName ?></h3>
                            </div>

                            <div class="row jobDetails p-2">
                                <p> <span class="jobDetailsLabel">Salary Rate:</span>
                                ₱&nbsp;<?php echo number_format($salaryRate) ?>&nbsp;&nbsp;&nbsp;
                                    |&nbsp;&nbsp; <span class="jobDetailsLabel">Experience Level:</span>
                                    <?php echo $expLevel ?>&nbsp;&nbsp; |&nbsp;&nbsp; <span class="jobDetailsLabel">Job
                                        Industry:</span>&nbsp;&nbsp;<?php echo $industry ?>
                                </p>
                            </div>

                            <div class="row skill px-2">
                                <p>Skill Requirements</p>
                            </div>

                            <div class="row skillDesc px-2">
                                <p><?php echo $skillRequirements ?>
                                </p>
                            </div>

                            <div class="row jobDescTitle px-2">
                                <p>Job Description:</p>
                            </div>


                            <div class="row jobDesc px-2">
                                <p><?php echo $jobDescription ?><a
                                        href="adminJobView.php?jobDetailID=<?php echo $jobDetailID ?>"><button
                                            name="btnSeeMore" type="button" class="btn custom-button btn-link"
                                            style="color: #21a027;">See
                                            More...</button></a>
                                </p>

                            </div>



                            <div class="row">
                                <hr class="bar">
                            </div>

                        </div>

                        <script>
                            function timeAgo(timestamp) {
                                const now = new Date();
                                const past = new Date(timestamp);
                                const diffInSeconds = Math.floor((now - past) / 1000);

                                if (diffInSeconds < 60) return `${diffInSeconds} seconds ago`;
                                const diffInMinutes = Math.floor(diffInSeconds / 60);
                                if (diffInMinutes < 60) return `${diffInMinutes} minutes ago`;
                                const diffInHours = Math.floor(diffInMinutes / 60);
                                if (diffInHours < 24) return `${diffInHours} hours ago`;
                                const diffInDays = Math.floor(diffInHours / 24);
                                return `${diffInDays} day${diffInDays > 1 ? 's' : ''} ago`;
                            }

                            document.getElementById('timeAgo<?php echo $jobRow['jobDetailID'] ?>').innerText += timeAgo('<?php echo $datePosted ?>');

                        </script>


                        <?php

                    }
                    if (isset($_POST['btnSeeMore'])) {

                        $_SESSION['jobDetailID'] = $jobDetailID;
                        header("Location: adminJobView.php");

                    }
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
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?salaryRate=1&<?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['location']) ? 'location=' . $_GET['location'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?>">
                                                Below 10,000php</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?salaryRate=2&<?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['location']) ? 'location=' . $_GET['location'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?>">
                                                10,000-30,000 php</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?salaryRate=3&<?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['location']) ? 'location=' . $_GET['location'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?>">
                                                30,000Above</a></li>
                                        <li><a class="dropdown-item" href="adminJobList.php">Reset</a></li>
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
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?industry=1&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['location']) ? 'location=' . $_GET['location'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?>">
                                                Information Technology</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?industry=2&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['location']) ? 'location=' . $_GET['location'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?>">
                                                Business and Administration</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?industry=3&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['location']) ? 'location=' . $_GET['location'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?>">
                                                Manufacturing and Logistics</a></li>
                                        <li><a class="dropdown-item" href="adminJobList.php">Reset</a></li>
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
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?location=1&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?>">
                                                San Antonio</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?location=2&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?>">
                                                San Vicente</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?location=3&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?>">
                                                San Roque</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?location=4&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?>">
                                                San Miguel</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?location=5&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?>">
                                                San Pedro</a></li>
                                        <li><a class="dropdown-item" href="adminJobList.php">Reset</a></li>
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
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?expLevel=1&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['location']) ? 'location=' . $_GET['location'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?>">
                                                Entry Level</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?expLevel=2&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['location']) ? 'location=' . $_GET['location'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?>">
                                                Mid Level</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?expLevel=3&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['location']) ? 'location=' . $_GET['location'] . '&' : ''; ?><?php echo isset($_GET['datePosted']) ? 'datePosted=' . $_GET['datePosted'] . '&' : ''; ?>">
                                                Senior Level</a></li>
                                        <li><a class="dropdown-item" href="adminJobList.php">Reset</a></li>
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
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?datePosted=1&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['location']) ? 'location=' . $_GET['location'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?>">
                                                Last 24 Hours</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?datePosted=2&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['location']) ? 'location=' . $_GET['location'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?>">
                                                Last 7 Days</a></li>
                                        <li><a class="dropdown-item"
                                                href="adminJobList.php?datePosted=3&<?php echo isset($_GET['salaryRate']) ? 'salaryRate=' . $_GET['salaryRate'] . '&' : ''; ?><?php echo isset($_GET['industry']) ? 'industry=' . $_GET['industry'] . '&' : ''; ?><?php echo isset($_GET['location']) ? 'location=' . $_GET['location'] . '&' : ''; ?><?php echo isset($_GET['expLevel']) ? 'expLevel=' . $_GET['expLevel'] . '&' : ''; ?>">
                                                Last 30 Days</a></li>
                                        <li><a class="dropdown-item" href="adminJobList.php">Reset</a></li>
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
                                        <li><a class="dropdown-item" href="#">Newest</a></li>
                                        <li><a class="dropdown-item" href="#">Oldest</a></li>
                                        <li><a class="dropdown-item" href="#">Reset</a></li>
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
                                        <li><a class="dropdown-item" href="#">Low to High</a></li>
                                        <li><a class="dropdown-item" href="#">High to Low</a></li>
                                        <li><a class="dropdown-item" href="#">Reset</a></li>
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