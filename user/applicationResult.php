<?php include("../process/applicationResultQuery.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STBJobs: Application Result </title>

    <link href="../assets/css/userCSS/applicationResult.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="../assets/image/userImage/stbLogo.ico">
</head>

<body>

    <?php
    include("../assets/shared/navbarHome.php");
    ?>

    <!-- Application Letter -->
    <div class="container mb-5 mt-5 d-flex justify-content" >
    
        <!-- Head -->
        <div class="text rounded bg-light box mb-3" style="margin-top: 100px;">
            <h1 class="fw-bold mb-4 ms-3 mt-2" style="font-weight: 600;">Result of Job Application</h1>
            <div class="border-top-custom border-success">

                <!-- Profile Of the Sender -->
                <div class="d-flex justify-content-between mb-4 mt-4">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle">
                            <a href="#">
                                <img src="../assets/image/user/userProfile/<?php echo "$userProfileImage"?>" alt="Profile Picture"
                                    class="w-100 h-100 object-fit-cover">
                            </a>
                        </div>

                        <!-- Details Of the Sender -->
                        <div class="ms-3 mt-3">
                            <strong class="ms-1">From: Admin</strong><br>
                            <span class="text-muted">&lt;<?php echo $email;?>&gt;</span> <br>
                            <span class="text-muted ms-1">to me</span>
                        </div>
                    </div>
                </div>

                <!-- Letter Title -->
                <div class="title">
                    <strong>Subject:</strong> Job Title
                    <p><strong>Good day! <?php echo $firstName . " " . $lastName ;?>,</strong></p>
                </div>

                <!-- Letter Body -->
                <div class="body">
                    <?php
                    if ($isAccepted == 1) {
                        // Accepted message
                        echo "<p>Congratulations! We are thrilled to inform you that you have been accepted for an interview. Our HR team will contact you shortly with further details regarding the next steps, including the date, time, location, and any necessary paperwork for the interview.</p>";
                    } else {
                        // Not accepted message
                        echo "<p>We regret to inform you that you did not make it to the final Interview.</p>";
                    }
                    ?>
                    <p>Thank you.</p>
                    <p><strong>Sincerely, from the Admin</strong></p>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <?php include("../assets/shared/footer.php"); ?>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
