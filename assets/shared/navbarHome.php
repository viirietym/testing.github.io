<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nav Bar Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./navbarHome.css">
</head>

<body>

    <header>
        <div class="logo">
            <img src="../image/STBJOBS 2 1.png" alt="" width="55%">
        </div>

        <!-- MOBILE SCREEN -->
        <div class="menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <!-- END MOBILE SCREEN -->

        <nav>
            <a href="#" style="color: #2ECC71">Home</a>
            <a href="#">Help</a>
            <a href="#">About</a>
            <a href="#">
                <img src="image/Group 25.png" alt="" class="notifImg">
            </a>
            <div class="profileImg">
                <a href="#">
                    <img src="image/profile.png" alt="" class="profImg">
                </a>
            </div>

        </nav>
    </header>

    <div class="profile">
        <ul>
            <div style="margin-bottom: 15px;">
                <h4 class="username">Username</h4>
            </div>
            <div style="margin-bottom: 15px;">
                <img src="image/profile.png" alt="" width="20%" style="margin-bottom: 10px;">
                <h4>Full Name</h4>
            </div>
            <div><a href="#" class="viewProfile">View Profile</a></div>
            <div><a href="#" class="logout">Log out</a></div>
        </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script src="../nav.js"></script>
</body>

</html>