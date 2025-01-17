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
                <div class="job-section">
                    <div class="job-card">
                        <span class="posted-time mb-2" style="margin-left: 140px; font-size:10px;"> posted 1 day
                            ago</span>
                        <p class="posted-info mt-3">
                            <img src="../assets/image/userImage/location.png" alt="Location Icon" class="icon"> San
                            Antonio
                        </p>
                        <h3 class="font-weight-bold mt-3">Job Name | Company Name</h3>
                        <p class="job-details mt-3">
                            salary rate | exp. level [ex. entry level] | job Industry [ex. IT]
                        </p>
                        <div class="skills-section mt-3">
                            <p><strong>Skills needed:</strong><br>
                                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco."
                            </p>
                        </div>
                        <div class="description-section">
                            <p><strong>Description:</strong> <a href="#" class="see-more">see more</a></p>
                        </div>
                        <div style="border-top: 5px solid white; width: 100%; margin: 10px 0;"></div>
                        <p class="another-entry">Another Entry...</p>
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
                                        <li><a class="dropdown-item" href="#">Below 20,000 PHP</a></li>
                                        <li><a class="dropdown-item" href="#">20,000 - 40,000 PHP</a></li>
                                        <li><a class="dropdown-item" href="#">Above 40,000 PHP</a></li>
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
                                        <li><a class="dropdown-item" href="#">Information Technology (IT)</a></li>
                                        <li><a class="dropdown-item" href="#">Business and Administration</a></li>
                                        <li><a class="dropdown-item" href="#">Manufacturing and Logistics</a></li>
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
                                        <li><a class="dropdown-item" href="#">Option 1</a></li>
                                        <li><a class="dropdown-item" href="#">Option 2</a></li>
                                        <li><a class="dropdown-item" href="#">Option 3</a></li>
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
                                        <li><a class="dropdown-item" href="#">Entry Level</a></li>
                                        <li><a class="dropdown-item" href="#">Mid Level</a></li>
                                        <li><a class="dropdown-item" href="#">Senior Level</a></li>
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
                                        <li><a class="dropdown-item" href="#">Last 24 Hours</a></li>
                                        <li><a class="dropdown-item" href="#">Last 7 Days</a></li>
                                        <li><a class="dropdown-item" href="#">Last 30 Days</a></li>
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
                                        <li><a class="dropdown-item" href="#">Newest</a></li>
                                        <li><a class="dropdown-item" href="#">Oldest</a></li>
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
                                        <li><a class="dropdown-item" href="#">Low to High</a></li>
                                        <li><a class="dropdown-item" href="#">High to Low</a></li>
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