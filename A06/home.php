<?php
include('connect.php');

if (isset($_POST['btnLogin'])) {
  header("Location: login.php");
}

if(isset($_POST['btnSignup'])) {
  header("Location: signup.php");
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PostConnect</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://fonts.cdnfonts.com/css/droid-serif-2" rel="stylesheet">
  <link href="https://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
  <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">

  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <nav class="navbar">
    <div class="container d-flex justify-content-between align-items-center">
      <a class="navbar-brand" href="index.php" title="Home">
        <img src="assets/media/logo.png" alt="" width="70" height="60">
      </a>
    </div>
  </nav>

  <div class="container text-center my-5">
    <div class="row">
      <h1 style="font-family: 'Droid Serif', sans-serif; font-size:45px">Hello!</h1>
      <h1 class="mt-5" style="font-family: 'Montserrat', sans-serif; font-size:40px">Unite Through Stories,</h1>
      <h1 style="font-family: 'Montserrat', sans-serif; font-size:50px">Connect Through Content</h1>
    </div>

    <form method="POST">
      <div class="row mt-4">
        <div class="col d-flex justify-content-center">
          <div class="card p-3 text-center rounded-3 shadow" style="width: 150px; height: 115px;">
            <button class="mb-2 btn" type="submit" name="btnLogin" disabled>Log in</button>
            <button class="btn" type="submit" name="btnSignup">Sign up</button>
          </div>
        </div>
      </div>
    </form>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>
</html>