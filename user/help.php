<?php
include("../connect.php");

$helpQuery = "SELECT * FROM help";
$results = executeQuery($helpQuery);

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Help</title>
  <link rel="icon" href="../assets/image/userImage/stbLogo.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/userCSS/help.css">

</head>

<body>

  <?php
  include("../assets/shared/navbarSignUp.php");
  ?>

  <div class="container">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="h2">
            WANT TO LEARN MORE ABOUT OUR <br> WEBSITE?
          </div>
          <div class="h6">
            FAQS:
          </div>
          <?php
          if (mysqli_num_rows($results) > 0) {
            while ($help = mysqli_fetch_assoc($results)) {
              ?>
              <div class="accordion-container">
                <div class="accordion accordion-flush px-10px" id="accordionFlushExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#<?php echo $help['helpID'] ?>" aria-expanded="false" aria-controls="flush-collapseOne">
                        <?php echo $help['shortDescription'] ?>
                      </button>
                    </h2>
                    <div id="<?php echo $help['helpID'] ?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                      <div class="accordion-body"><?php echo $help['longDescription'] ?></div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <?php
  include("../assets/shared/footer.php");
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>