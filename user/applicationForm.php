<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>STBJOBS | Application Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/userCSS/applicationForm.css">
  <link rel="icon" href="../assets/image/userImage/stbLogo.ico">
</head>

<body>

  <?php include "../assets/shared/navbarHome.php" ?>

  <div class="form-container" style="margin: 150px auto;">
    <form>
      <h5 class="aformName mb-4">Jane Doe's Application Form</h5>
      <div class="question1 mb-4 ">
        <label for="question1" class="form-label mb-2">First Question:</label>
        <textarea name="question1" class="form-control" id="question1" placeholder="Type your answer here" required></textarea>
      </div>

      <div class="question2 mb-4 ">
        <label for="question2" class="form-label mb-2">Second Question:</label>
        <textarea name="question2" class="form-control" id="question2" placeholder="Type your answer here"required></textarea>
      </div>

      <!-- file input -->
      <div class="mb-5">
        <label for="uploadCV" class="form-label mb-2">Upload your CV/Resume (<span class="pdf-format">PDF
            Format</span>):</label>
        <input class="form-control form-control-lg" id="uploadCV" type="file"  accept=".pdf">
      </div>
    </form>

    <!-- submit button -->
    <div class="button-container">
      <button type="submit" class="submit-btn" style="width:180px;">Submit</button>
    </div>
  </div>
  <?php include "../assets/shared/footer.php" ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>