<?php
include("../connect.php");

$jobDetailquery = "SELECT jobdetail.jobDetailID,jobdetail.jobTitle, jobdetail.jobLocation, jobdetail.salaryRate, jobdetail.experienceLevel, jobdetail.jobIndustry, LEFT (jobdetail.jobSkillsDescription, 100) AS shortenedDesc, jobdetail.companyName, jobdetail.jobSkillsDescription, post.datePosted 
FROM `jobdetail` LEFT JOIN post ON jobdetail.jobDetailID = post.jobDetailID;";

$jobDetailresult = executeQuery($jobDetailquery);

$jobTitle = '';
$salaryRate = '';
$expLevel = '';
$companyName = '';
$location = '';
$industry = '';
$skillRequirements = '';
$jobDescription = '';
$datePosted = '';

$salary = isset($_GET['salary']) ? $_GET['salary'] : null;
$industry = isset($_GET['industry']) ? $_GET['industry'] : null;
$location = isset($_GET['location']) ? $_GET['location'] : null;
$expLevel = isset($_GET['expLevel']) ? $_GET['expLevel'] : null;
$datePosted = isset($_GET['datePosted']) ? $_GET['datePosted'] : null;
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'datePosted';
$order = isset($_GET['order']) ? $_GET['order'] : 'DESC';

$jobEntry = "SELECT jobdetail.*, post.userID, post.datePosted 
             FROM jobdetail 
             INNER JOIN post ON jobdetail.jobDetailID = post.jobDetailID 
             WHERE 1=1";

if ($salary) {
    if ($salary == 'below_20000') {
        $jobEntry .= " AND jobdetail.salaryRate < 20000";
    } elseif ($salary == '20000_40000') {
        $jobEntry .= " AND jobdetail.salaryRate BETWEEN 20000 AND 40000";
    } elseif ($salary == 'above_40000') {
        $jobEntry .= " AND jobdetail.salaryRate > 40000";
    }
}


if ($industry) {
    $industryMap = [
        'it' => 'Information Technology',
        'business' => 'Business and Administration',
        'manufacturing' => 'Manufacturing and Logistics',
    ];
    $industryValue = isset($industryMap[$industry]) ? $industryMap[$industry] : null;

    if ($industryValue) {
        $jobEntry .= " AND jobdetail.jobIndustry LIKE '%$industryValue%'";
    }
}

if ($location) {
    $locationMap = [
        'san_antonio' => 'San Antonio',
        'san_vicente' => 'San Vicente',
        'san_roque' => 'San Roque',
        'san_miguel' => 'San Miguel',
        'san_pedro' => 'San Pedro',
    ];

    $locationValue = isset($locationMap[$location]) ? $locationMap[$location] : null;

    if ($locationValue) {
        $jobEntry .= " AND jobdetail.jobLocation LIKE '%$locationValue%'";
    }
}

echo $jobEntry;

if ($expLevel) {
    $expLevelMap = [
        'entry' => 'Entry Level',
        'mid' => 'Mid Level',
        'senior' => 'Senior Level',
    ];
    $expLevelValue = isset($expLevelMap[$expLevel]) ? $expLevelMap[$expLevel] : null;

    if ($expLevelValue) {
        $jobEntry .= " AND jobdetail.experienceLevel LIKE '%$expLevelValue%'";
    }
}
if ($datePosted) {
    $jobEntry .= " AND post.datePosted >= DATE_SUB(CURDATE(), INTERVAL $datePosted DAY)";
}

$jobEntry .= " ORDER BY $sort $order";

$fetchJobEntry = executeQuery($jobEntry);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="icon" href="../assets/image/userImage/stbLogo.ico">
    <link href="../assets/css/usercss/userJobList.css" rel="stylesheet">
    <title>STB Jobs</title>
</head>

<body>
    <?php
    include("../assets/shared/navbarHome.php");
    ?>

    <!-- Container for the Row -->
    <div class="container" style="margin:150px auto 50px auto">
        <div class="row">
            <!-- Welcome Section (Order 1) -->
            <div class="col-12 col-lg-8 order-1">
                <div class="main-content">
                    <div class="welcome">
                        <h1>Welcome to <span class="stb">STB</span></h1>
                    </div>
                    <h1 class="jobs">Jobs</h1>
                    <div class="intro fw-bold">
                        <p>Connecting Opportunities in Santo Tomas, Batangas</p>
                    </div>
                    <div style="border-top: 5px solid #3E8A5E; width: 100%;" class="m-auto"></div>
                </div>
            </div>

            <!-- Search Bar Section (Order 2) -->
            <div class="col-12 col-lg-4 order-2 d-flex align-items-center justify-content-center mt-3 mb-1 ">
                <div class="search-bar-section">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>


            <!-- Job Section (Order 3) -->
            <div class="col-12 col-lg-8 order-4 mt-5">
                <div class="job-section"
                    style="max-height: 400px; overflow-y: auto; padding: 15px; border-radius: 8px;">

                    <!-- Job Entry 1 -->
                    <div class="job-card">
                        <?php
                        while ($fetchJobEntryRow = mysqli_fetch_assoc($fetchJobEntry)) {
                            ?>
                            <span class="posted-time mb-2" style="font-size:10px;">
                                Posted by User ID: <?php echo $fetchJobEntryRow['userID']; ?> on
                                <?php echo $fetchJobEntryRow['datePosted']; ?>
                            </span>
                            <p class="posted-info mt-3">
                                <img src="../assets/image/userImage/location.png" alt="Location Icon" class="icon">
                                <?php echo $fetchJobEntryRow['jobLocation'] ?>
                            </p>
                            <h3 class="font-weight-bold mt-3"><?php echo $fetchJobEntryRow['jobTitle'] ?> |
                                <?php echo $fetchJobEntryRow['companyName'] ?>
                            </h3>
                            <p class="job-details mt-3">
                                <?php echo $fetchJobEntryRow['salaryRate'] ?> |
                                <?php echo $fetchJobEntryRow['experienceLevel'] ?> |
                                <?php echo $fetchJobEntryRow['jobIndustry'] ?>
                            </p>
                            <div class="skills-section mt-3">
                                <p><strong>Skills needed:</strong><br>
                                    <?php echo $fetchJobEntryRow['jobSkillsDescription'] ?>
                                </p>
                            </div>
                            <div class="description-section">
                            <p><?php echo $jobDescription ?><a href="userJobView.php"><button type="button"
                                            class="btn custom-button btn-link" style="color: #21a027;">See
                                            More...</button></a>
                                </p>
                            </div>
                            <hr>
                            <?php
                        }
                        ?>
                    </div>


                </div>
            </div>

            <!-- Filter Section (Order 4) -->
            <div class="col-12 col-lg-4 order-3 order-lg-4 mt-5">
                <div class="filter-section">
                    <div class="filters col-12 d-flex flex-column align-items-center py-5">
                        <h5>FILTER BY:</h5>

                        <!-- Dropdown for Salary Rate -->
                        <div class="row w-100 text-center">
                            <div class="col-4 col-lg-6 mb-2 mb-md-0 order-1 order-md-1">
                                <div class="dropdown w-100">
                                    <button class="my-3 btn btn-light w-100 dropdown-toggle" type="button"
                                        id="dropdownSalaryRate" data-bs-toggle="dropdown" aria-expanded="false">
                                        Salary Rate
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownSalaryRate">
                                        <li><a class="dropdown-item" href="?salary=Below 10,000 php">Below 10,000 php
                                            </a>
                                        </li>
                                        <li><a class="dropdown-item" href="?salary=10,000 - 30,000 php">10,000 - 30,000
                                                php </a>
                                        </li>
                                        <li><a class="dropdown-item" href="?salary=above_40000">30,000 above</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Dropdown for Industry -->
                            <div class="col-4 col-lg-6 mb-2 mb-md-0 order-2 order-md-2">
                                <div class="dropdown w-100">
                                    <button class="my-3 btn btn-light w-100 dropdown-toggle" type="button"
                                        id="dropdownIndustry" data-bs-toggle="dropdown" aria-expanded="false">
                                        Industry
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownIndustry">
                                        <li><a class="dropdown-item" href="?industry=it">Information Technology (IT)</a>
                                        </li>
                                        <li><a class="dropdown-item" href="?industry=business">Business and
                                                Administration</a></li>
                                        <li><a class="dropdown-item" href="?industry=manufacturing">Manufacturing and
                                                Logistics</a></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Dropdown for Location -->
                            <div class="col-4 col-lg-6 order-3 order-md-3">
                                <div class="dropdown w-100">
                                    <button class="my-3 btn btn-light w-100 dropdown-toggle" type="button"
                                        id="dropdownLocation" data-bs-toggle="dropdown" aria-expanded="false">
                                        Location
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownLocation">
                                        <li><a class="dropdown-item" href="?location=san_antonio">San Antonio</a></li>
                                        <li><a class="dropdown-item" href="?location=san_vicente">San Vicente</a></li>
                                        <li><a class="dropdown-item" href="?location=san_roque">San Roque</a></li>
                                        <li><a class="dropdown-item" href="?location=san_miguel">San Miguel</a></li>
                                        <li><a class="dropdown-item" href="?location=san_pedro">San Pedro</a></li>
                                    </ul>

                                </div>
                            </div>

                            <!-- Dropdown for Exp Level -->
                            <div class="col-6 col-lg-6 mb-2 mb-md-0 order-4 order-md-4">
                                <div class="dropdown w-100">
                                    <button class="my-3 btn btn-light w-100 dropdown-toggle" type="button"
                                        id="dropdownExpLevel" data-bs-toggle="dropdown" aria-expanded="false">
                                        Exp Level
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownExpLevel">
                                        <li><a class="dropdown-item" href="?expLevel=entry">Entry Level</a></li>
                                        <li><a class="dropdown-item" href="?expLevel=mid">Mid Level</a></li>
                                        <li><a class="dropdown-item" href="?expLevel=senior">Senior Level</a></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Dropdown for Date Posted -->
                            <div class="col-6 col-lg-12 mb-2 mb-md-0 order-5 order-md-6">
                                <div class="dropdown w-100">
                                    <button class="my-3 btn btn-light w-100 dropdown-toggle" type="button"
                                        id="dropdownDatePosted" data-bs-toggle="dropdown" aria-expanded="false">
                                        Date Posted
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownDatePosted">
                                        <li><a class="dropdown-item" href="?datePosted=1">Last 24 Hours</a></li>
                                        <li><a class="dropdown-item" href="?datePosted=7">Last 7 Days</a></li>
                                        <li><a class="dropdown-item" href="?datePosted=30">Last 30 Days</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <h5 class="mt-5">SORT BY:</h5>

                        <!-- Dropdown for Most Recent and Salary -->
                        <div class="row w-100 text-center">
                            <div class="col-6 col-lg-6 mb-2 mb-md-0">
                                <div class="dropdown w-100">
                                    <button class="my-3 btn btn-light w-100 dropdown-toggle" type="button"
                                        id="dropdownMostRecent" data-bs-toggle="dropdown" aria-expanded="false">
                                        Most Recent
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMostRecent">
                                        <li><a class="dropdown-item" href="?sort=datePosted&order=desc">Newest</a></li>
                                        <li><a class="dropdown-item" href="?sort=datePosted&order=asc">Oldest</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-6 col-lg-6">
                                <div class="dropdown w-100">
                                    <button class="my-3 btn btn-light w-100 dropdown-toggle" type="button"
                                        id="dropdownSalary" data-bs-toggle="dropdown" aria-expanded="false">
                                        Salary [↑ - ↓]
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownSalary">
                                        <li><a class="dropdown-item" href="?sort=salary&order=asc">Low to High</a></li>
                                        <li><a class="dropdown-item" href="?sort=salary&order=desc">High to Low</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        </div>
    </div>

    <?php
    include("../assets/shared/footer.php");
    ?>
</body>

</html>