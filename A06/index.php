<?php
include('connect.php');

if (isset($_POST['btnDelete'])) {
  $userID = $_POST['btnDelete'];

  $deleteQuery = "DELETE FROM userInfo WHERE userID = '$userID'";
  $deleteResult = executeQuery($deleteQuery);
}

$query = "SELECT 
    ui.userID,
    u.username,
    u.email,
    ui.firstName,
    ui.lastName,
    ui.contactNumber,
    ui.birthDate,
    a.addressID,
    c.cityName,
    pr.provinceName
FROM userInfo ui
JOIN users u ON ui.userID = u.userID
JOIN addresses a ON ui.addressID = a.addressID
JOIN cities c ON a.cityID = c.cityID
JOIN provinces pr ON a.provinceID = pr.provinceID
ORDER BY ui.userID";
$result = executeQuery($query);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PostConnect</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <nav class="navbar shadow">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="assets/media/logo.png" alt="logo" width="70" height="60">
      </a>
    </div>
  </nav>

  <div class="container">
    <div class="row mt-4">
      <div class="title">
        <h1>User Information</h1>
      </div>
    </div>
    <div class="row">
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
          <div class="card mt-4  text-center">
            <div class="card-body">
              <h2 class="card-title"><?php echo $row['firstName'] . ' ' . $row['lastName']; ?></h2>
              <h4 class="card-title"><?php echo $row['username']; ?></h4>
              <h5 class="card-title"><?php echo $row['email']; ?></h5>
              <h5 class="card-title"><?php echo $row['cityName'] . ',' . ' ' . $row['provinceName']; ?></h5>
              <h5 class="card-title"><?php echo $row['contactNumber']; ?></h5>
              <h5 class="card-title"><?php echo $row['birthDate']; ?></h5>
            </div>
            <div class="d-flex justify-content-end p-2">
              <form method="POST">
                <input type="hidden" name="btnDelete" value="<?php echo $row['userID']; ?>">
                <button class="delete-button" style="background-color: transparent; border: none" type="submit">
                  <i class="bi bi-trash"></i>
                </button>
              </form>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</body>

</html>