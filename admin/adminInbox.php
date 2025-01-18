<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Inbox</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="../assets/css/adminCSS/navbarAdmin.css" rel="stylesheet">
    <link href="../assets/css/adminCSS/adminInbox.css" rel="stylesheet">
    <link rel="icon" href="../assets/image/userImage/stbLogo.ico">
 
</head>

<body>

    <?php
    include("../assets/shared/navbarAdmin.php");
    ?>
    <div class="notification-header mb-5" style="margin-top:150px; margin-bottom: 5px;">
        <h3 class="text-center"><b>Applications</b></h3>
    </div>

    <!-- Header -->
    <div class="notification-box mb-5 ">


        <!-- Notification Box -->
        <ul class="list-group-flush notification-list">
            <div class="filter-links ms-3 d-flex justify-content mt-4">
                <div class="filter-option">
                    <label for="All" class="fw-bold fs-4 ms-3 text-decoration-none text-white filter-link"
                        id="read-label">All</label>
                </div>
                <div class="filter-option">
                    <label for="unread" class="fw-bold fs-4 ms-3 text-decoration-none text-white filter-link"
                        id="unread-label">Unread</label>
                </div>
                <div class="filter-option">
                    <label for="read" class="fw-bold fs-4 ms-3 text-decoration-none text-white filter-link"
                        id="read-label">Read</label>
                </div>

            </div>

            <!-- Notification List -->
            <li class="list-group-item mx-4 my-5 d-flex align-items-center notification-item">
                <a href="profilepage.php">
                    <img src="../assets/image/userImage/profile.png" alt="icon" class="rounded-circle me-2 img-fluid"
                        style="max-width: 100px; height: auto;">
                </a>
                <div class="d-flex flex-column mx-2">
                    <small class="text-white">Date, Time</small>
                    <div class="fw-bold fs-5 text-white">First Name, Last Name, applied for <u><a href="profilepage.php"
                                class="text-decoration-none text-white">this job.</a></u></div>
                    <div class="list-buttons d-flex p-1 d-md-flex">
                        <button type="button" class="btn btn-light me-2 mt-2">APPLICATION FORM</button>
                        <button type="button" class="btn btn-success me-2 mt-2">ACCEPT</button>
                        <button type="button" class="btn btn-danger me-2 mt-2">DECLINE</button>
                    </div>
                </div>
            </li>

            <li class="list-group-item mx-4 my-5 d-flex align-items-center notification-item">
                <a href="profilepage.php">
                    <img src="../assets/image/userImage/profile.png" alt="icon" class="rounded-circle me-2 img-fluid"
                        style="max-width: 100px; height: auto;">
                </a>
                <div class="d-flex flex-column mx-2">
                    <small class="text-white">Date, Time</small>
                    <div class="fw-bold fs-5 text-white">First Name, Last Name, applied for <u><a href="profilepage.php"
                                class="text-decoration-none text-white">this job.</a></u></div>
                    <div class="list-buttons d-flex p-1 d-md-flex">
                        <button type="button" class="btn btn-light me-2 mt-2">APPLICATION FORM</button>
                        <button type="button" class="btn btn-success me-2 mt-2">ACCEPT</button>
                        <button type="button" class="btn btn-danger me-2 mt-2">DECLINE</button>
                    </div>
                </div>
            </li>

            <li class="list-group-item mx-4 my-5 d-flex align-items-center notification-item">
                <a href="profilepage.php">
                    <img src="../assets/image/userImage/profile.png" alt="icon" class="rounded-circle me-2 img-fluid"
                        style="max-width: 100px; height: auto;">
                </a>
                <div class="d-flex flex-column mx-2">
                    <small class="text-white">Date, Time</small>
                    <div class="fw-bold fs-5 text-white">First Name, Last Name, applied for <u><a href="profilepage.php"
                                class="text-decoration-none text-white">this job.</a></u></div>
                    <div class="list-buttons d-flex p-1 d-md-flex">
                        <button type="button" class="btn btn-light me-2 mt-2">APPLICATION FORM</button>
                        <button type="button" class="btn btn-success me-2 mt-2">ACCEPT</button>
                        <button type="button" class="btn btn-danger me-2 mt-2">DECLINE</button>
                    </div>
                </div>
            </li>

            <li class="list-group-item mx-4 my-5 d-flex align-items-center notification-item">
                <a href="profilepage.php">
                    <img src="../assets/image/userImage/profile.png" alt="icon" class="rounded-circle me-2 img-fluid"
                        style="max-width: 100px; height: auto;">
                </a>
                <div class="d-flex flex-column mx-2">
                    <small class="text-white">Date, Time</small>
                    <div class="fw-bold fs-5 text-white">First Name, Last Name, applied for <u><a href="profilepage.php"
                                class="text-decoration-none text-white">this job.</a></u></div>
                    <div class="list-buttons d-flex p-1 d-md-flex">
                        <button type="button" class="btn btn-light me-2 mt-2">APPLICATION FORM</button>
                        <button type="button" class="btn btn-success me-2 mt-2">ACCEPT</button>
                        <button type="button" class="btn btn-danger me-2 mt-2">DECLINE</button>
                    </div>
                </div>
            </li>

            <li class="list-group-item mx-4 my-5 d-flex align-items-center notification-item">
                <a href="profilepage.php">
                    <img src="../assets/image/userImage/profile.png" alt="icon" class="rounded-circle me-2 img-fluid"
                        style="max-width: 100px; height: auto;">
                </a>
                <div class="d-flex flex-column mx-2">
                    <small class="text-white">Date, Time</small>
                    <div class="fw-bold fs-5 text-white">First Name, Last Name, applied for <u><a href="profilepage.php"
                                class="text-decoration-none text-white">this job.</a></u></div>
                    <div class="list-buttons d-flex p-1 d-md-flex">
                        <button type="button" class="btn btn-light me-2 mt-2">APPLICATION FORM</button>
                        <button type="button" class="btn btn-success me-2 mt-2">ACCEPT</button>
                        <button type="button" class="btn btn-danger me-2 mt-2">DECLINE</button>
                    </div>
                </div>
            </li>

        </ul>

    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <footer>
        <?php
        include("../assets/shared/footerAdmin.php");
        ?>
    </footer>


</body>

</html>