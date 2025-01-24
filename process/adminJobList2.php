<?php

include("../connect.php");

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
$jobSort = '';
$jobID = '';

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
            $jobFilter[] = "datePosted >= CURRENT_TIMESTAMP()-INTERVAL 1 DAY";
            break;

        case "2":
            $jobFilter[] = "datePosted >= CURRENT_TIMESTAMP()-INTERVAL 7 DAY";
            break;

        case "3":
            $jobFilter[] = "datePosted <= CURRENT_TIMESTAMP()-INTERVAL 30 DAY";
            break;

        default:
            $jobFilter[] = "datePosted = null";

    }

}

if (isset($_GET['recent'])) {

    $recent = $_GET['recent'];

    switch ($recent) {
        case "1":
            $jobSort = "datePosted DESC";
            break;

        case "2":
            $jobSort = "datePosted ASC";
            break;

        default:
            $jobSort = "recent = null";

    }

}

if (isset($_GET['salaryRange'])) {

    $salaryRange = $_GET['salaryRange'];

    switch ($salaryRange) {
        case "1":
            $jobSort = "salaryRate ASC";
            break;

        case "2":
            $jobSort = "salaryRate DESC";
            break;

        default:
            $jobSort = "recent = null";

    }

}

if (count($jobFilter) > 0) {
    $jobDetailquery = $jobDetailquery . " WHERE " . implode(' AND ', $jobFilter);
}

if ($jobSort != '') {

    $jobDetailquery = $jobDetailquery . " ORDER BY " . $jobSort;

}

$jobDetailresult = executeQuery($jobDetailquery);

if (isset($_POST['btnDelete'])) {

    $jobID = $_POST['jobID'];
    $jobDeletequery1 = "DELETE FROM `jobdetail` WHERE jobDetailID = '$jobID';";
    $jobDeletequery2 = "DELETE FROM `post` WHERE jobDetailID = '$jobID';";
    executeQuery($jobDeletequery1);
    executeQuery($jobDeletequery2);
    header('location:adminJobList.php');
}

?>

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
            
                <div class="col-12 col-sm-12 col-md-8 col-xl-8 d-flex align-items-center" style="text-align: left;">
                    <img class="img-fluid locationImg" src="../assets/image/userImage/location.png">
                    <p class="barangay pt-4 mx-2"><?php echo $location ?></p>
                    
                </div>
                
                <!-- Edit Btn -->
                
                <div class="col-6 col-sm-6 col-xl-2 d-flex justify-content-center align-items-center">
                    <a href="jobEdit.php?jobID=<?php echo $jobDetailID?>" name="btnEdit" class="btnEdit">Edit</a>
                </div>
        
                
                <!-- Delete Btn -->
                <div class="col-6 col-sm-6 col-xl-2 d-flex justify-content-center align-items-center">
                    <button  class="btnDelete" data-bs-toggle="modal"
                        data-bs-target="#deleteModal<?php echo $jobDetailID?>">Delete</button>

                    <form method="POST">
                    <input type="hidden" name="jobID" value="<?php echo $jobDetailID?>">
                    <div class="modal fade" id="deleteModal<?php echo $jobDetailID?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
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
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" name="btnDelete" class="btn custom-button"
                                        style="background-color: #AF514C; color: #FFFFFF;">Delete</button>
                                </div>
                                </form>
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
                    ₱&nbsp;<?php echo number_format($salaryRate) ?>&nbsp;&nbsp;
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
                <p><?php echo $jobDescription ?><a href="adminJobView.php?jobDetailID=<?php echo $jobDetailID ?>"><button
                            name="btnSeeMore" type="button" class="btn custom-button btn-link" style="color: #21a027;">See
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