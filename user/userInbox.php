<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STBJobs: Notifications </title>

    <link href="../assets/css/userCSS/userInbox.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../assets/image/userImage/stbLogo.ico">
</head>

<body>


    <!-- Header -->
    <div class="notification-box mt-5 mb-5">
        <div class="notification-header mb-2">
            <h3 class="display-5 text-center">Notifications</h3>
        </div>

    <!-- Notification Box -->
        <ul class="list-group-flush notification-list">
            <div class="filter-links ms-3 d-flex justify-content mt-4">
                <div class="filter-option">
                    <label for="unread" class="fw-bold fs-4 text-decoration-none text-white filter-link"
                        id="unread-label">Unread</label>
                </div>
                <div class="filter-option">
                    <label for="read" class="fw-bold fs-4 ms-3 text-decoration-none text-white filter-link"
                        id="read-label">Read</label>
                </div>
            </div>

    <!-- Notification List -->
            <li class="list-group-item mt-3 mb-3 notification-item">
                <a href="page1.html" class="text-decoration-none text-white d-flex align-items-center">
                <img src="../assets/image/userImage/stbJobsNotification.png" alt="icon" class="rounded-circle me-2 img-fluid" style="max-width: 80px; height: auto;">
                    <div class="d-flex flex-column">
                        <div class="fw-bold fs-5">New message from John</div>
                        <small class="text-muted">Lorem ipsum dolor</small>
                    </div>
                </a>
            </li>

            <li class="list-group-item mb-3 notification-item">

                <a href="page2.html" class="text-decoration-none text-white d-flex align-items-center">
                <img src="../assets/image/stbJobsNotification.png" alt="icon" class="rounded-circle me-2 img-fluid" style="max-width: 80px; height: auto;">
                    <div class="d-flex flex-column">
                        <div class="fw-bold fs-5">New message from John</div>
                        <small class="text-muted">Lorem ipsum dolor</small>
                    </div>
                </a>
            </li>

            <li class="list-group-item mb-3 notification-item">
                <a href="page3.html" class="text-decoration-none text-white d-flex align-items-center">
                    <img src="../assets/image/stbJobsNotification.png" alt="icon" class="rounded-circle me-2 img-fluid" style="max-width: 80px; height: auto;">
                    <div class="d-flex flex-column">
                        <div class="fw-bold fs-5">New message from John</div>
                        <small class="text-muted">Lorem ipsum dolor</small>
                    </div>
                </a>
            </li>

            <li class="list-group-item mb-3 notification-item">
                <a href="page4.html" class="text-decoration-none text-white d-flex align-items-center">
                <img src="../assets/image/stbJobsNotification.png" alt="icon" class="rounded-circle me-2 img-fluid" style="max-width: 80px; height: auto;">
                    <div class="d-flex flex-column">
                        <div class="fw-bold fs-5">New message from John</div>
                        <small class="text-muted">Lorem ipsum dolor</small>
                    </div>
                </a>
            </li>

            <li class="list-group-item mt-3 mb-3  notification-item">
                <a href="page5.html" class="text-decoration-none text-white d-flex align-items-center">
                <img src="../assets/image/stbJobsNotification.png" alt="icon" class="rounded-circle me-2 img-fluid" style="max-width: 80px; height: auto;">
                    <div class="d-flex flex-column">
                        <div class="fw-bold fs-5">New message from John</div>
                        <small class="text-muted">Lorem ipsum dolor</small>
                    </div>
                </a>
            </li>

        </ul>

    </div>

    <footer>
        <?php include("../assets/shared/footer.php"); ?>
    </footer>

    <!-- Link to external JS -->
    <script src = "../js/userInboxToggle.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>