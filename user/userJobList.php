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

    <!-- Welcome -->
    <div class="container" style="margin:150px auto 50px auto">
        <div class="main-content">
            <div class="welcome">
                <h1>Welcome to <span class="stb">STB</span></h1>
            </div>
            <h1 class="jobs">Jobs</h1>
            <div class="intro fw-bold">
                <p>Connecting Opportunities in Santo Tomas, Batangas</p>
            </div>
            <div style="border-top: 5px solid #3E8A5E; width: 80%;" class="m-auto"></div>

            <!-- Job section -->
            <div class="job-section mt-5">
                <div class="job-card">
                    <span class="posted-time mb-2" style="margin-left: 140px; font-size:10px;"> posted 1 day ago</span>
                    <p class="posted-info mt-3">
                        <img src="../assets/image/userImage/location.png" alt="Location Icon" class="icon"> San Antonio
                    </p>
                    <h3 class="mt-3">Job Name | Company Name</h3>
                    <p class="job-details mt-3">

                        salary rate | exp. level [ex. entry level] | job Industry [ex. IT]
                    </p>
                    <div class="skills-section mt-3">
                        <p><strong>skills needed:</strong><br>
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                            ullamco."
                        </p>
                    </div>
                    <div class="description-section">
                        <p>Description: <a href="#" class="see-more">see more</a></p>
                    </div>
                    <div style="border-top: 5px solid white; width: 100%; margin: 10px 0;"></div>
                    <p class="another-entry">Another Entry...</p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row mb-3">
                <div class="col-12 mt-5">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
                <div class="filters col-12 d-flex flex-column align-items-center py-5">
                    <h4>FILTER BY:</h4>
                    <div class="row w-100 text-center">
                        <div class="col-12 col-lg-6">
                            <button class="btn btn-light w-100">Salary Rate</button>
                        </div>
                        <div class="col-12 col-lg-6">
                            <button class="btn btn-light w-100">Industry</button>
                        </div>
                    </div>
                    <div class="row w-100 text-center mt-2">
                        <div class="col-12 col-lg-6">
                            <button class="btn btn-light w-100">Location</button>
                        </div>
                        <div class="col-12 col-lg-6">
                            <button class="btn btn-light w-100">Exp Level</button>
                        </div>
                    </div>
                    <div class="row w-100 text-center mt-2">
                        <div class="col-12 col-lg-6 mx-auto">
                        <button class="btn btn-light w-100">Date Posted</button>
                        </div>
                    </div>
                    <h4 class="mt-5">Sort By:</h4>
                    <div class="row w-100 text-center">
                        <div class="col-12 col-lg-6">
                            <button class="btn btn-light w-100">Most Recent</button>
                        </div>
                        <div class="col-12 col-lg-6">
                            <button class="btn btn-light w-100">Salary [↑ - ↓]</button>
                        </div>
                    </div>
                </div>



            </div>
        </div>


    </div>

    <?php
    include("../assets/shared/footer.php");
    ?>
</body>

</html>