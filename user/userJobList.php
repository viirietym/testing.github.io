<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <title>STB Jobs</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f6f8f7;
            color: #333;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        header {
            background-color: #d7f0dc;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        header img {
            height: 70px;
            margin-left: 20px;
        }

        header nav {
            display: flex;
            align-items: center;
            margin-right: auto;
        }

        header nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #333;
            font-size: 20px;
            font-weight: bold;
        }

        header .icons {
            display: flex;
            align-items: center;
            margin-left: 20px;
        }

        header .icons img {
            height: 35px;
            margin-left: 15px;
        }

        .container {
            display: flex;
            flex: 1;
            padding: 20px;
            justify-content: space-between;
            gap: 20px;
        }

        .main-content {
            flex: 3;
        }

        .filters {
            width: 300px;
            background-color: #5A806A;
            padding: 15px;
            border-radius: 20px;
            margin-top: 20px;
        }

        .filters h4 {
            text-align: center;
            color: white;
        }

        .filters button {
            background-color: #FFFFFF;
            color: #3E8A5E;
            font-weight: bold;
            border: none;
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 10px;
            cursor: pointer;
            width: 100%;
        }

        .welcome {
            text-align: center;
        }

        .welcome h1 {
            color: #2b8444;
            margin: 0;
        }

        .stb {
            font-weight: 900;
        }

        .jobs {
            font-size: 70px;
            font-weight: 900;
            display: flex;
            justify-content: center;
            color: #3e8a5e;
            margin-top: 0;
        }

        .intro {
            text-align: center;
            margin-top: 10px;
        }

        .job-card {
            background-color: #3E8A5E;
            color: #ffffff;
            width: 100%;
            height: 500px;
            margin-bottom: 20px;
            border-radius: 20px;
            padding: 20px;
            font-family: Arial, sans-serif;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <header>
        <img src="Pictures/logo.png" alt="STB Logo">
        <nav>
            <a href="#">Home</a>
            <a href="#">Help</a>
            <a href="#">About</a>
        </nav>
        <div class="icons">
            <img src="Pictures/bell.png" alt="Notifications">
            <img src="Pictures/profile.png" alt="Profile">
        </div>
    </header>

    <div class="container">
        <div class="main-content">
            <div class="welcome">
                <h1>Welcome to <span class="stb">STB</span></h1>
            </div>
            <h1 class="jobs">Jobs</h1>
            <div class="intro fw-bold">
                <p>Connecting Opportunities in Santo Tomas, Batangas</p>
            </div>
            <div style="border-top: 5px solid #3E8A5E; width: 100%; margin: 10px 0;"></div>
            <div class="job-section">
                <div class="job-card">
                    <p class="posted-info">
                        <img src="location-icon.png" alt="Location Icon" class="icon"> San Antonio
                        <span class="posted-time">| posted 1 day ago</span>
                    </p>
                    <h3>Job Name | Company Name</h3>
                    <p class="job-details">
                        salary rate | exp. level [ex. entry level] | job Industry [ex. IT]
                    </p>
                    <div class="skills-section">
                        <p><strong>skills needed:</strong></p>
                        <p>
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                            ullamco."
                        </p>
                    </div>
                    <div class="description-section">
                        <p><strong>description:</strong> <a href="#" class="see-more">see more</a></p>
                    </div>
                    <div style="border-top: 5px solid white; width: 100%; margin: 10px 0;"></div>
                    <p class="another-entry">Another Entry...</p>
                </div>
            </div>
        </div>

        <div class="filters">
            <h4>FILTER BY:</h4>
            <button>Salary Rate</button>
            <button>Industry</button>
            <button>Location</button>
            <button>Exp Level</button>
            <button>Date Posted</button>
            <h4>Sort By:</h4>
            <button>Most Recent</button>
            <button>Salary [↑ - ↓]</button>
        </div>
    </div>

    <?php
    include("../assets/shared/footer.php");
    ?>
</body>

</html>