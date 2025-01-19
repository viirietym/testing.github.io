<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMIN | Nav Bar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/adminCSS/navbarAdmin.css">
</head>

<body>


    <div class="header">
        <div class="logo">
            <img src="../assets/image/adminImage/stbLogoAdmin.png" alt="">
            <h1>Admin Dashboard</h1>
        </div>

        <!-- MOBILE SCREEN -->
        <div class="menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <!-- END MOBILE SCREEN -->

        <nav>
            <a href="../admin/adminJobList.php">
                <img src="../assets/image/adminImage/adminHome.png" alt="" class="homeImg">
            </a>
            <a href="../admin/adminInbox.php">
                <img src="../assets/image/adminImage/notif.png" alt="" class="notifImg">
            </a>
            <a href="../admin/index.php">
                <img src="../assets/image/adminImage/Logout.png" alt="" class="logoutImg">
            </a>
        </nav>
    </div>


    <script src="../js/nav.js"></script>
</body>

</html>