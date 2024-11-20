<?php
include('connect.php');

if (isset($_POST['btnDelete'])) {
  $userID = $_POST['btnDelete'];
  $deleteQuery = "DELETE FROM userInfo WHERE userID = '$userID'";
  $deleteResult = executeQuery($deleteQuery);
}

if (isset($_POST['btnEditForm'])) {
  $userID = $_POST['userID'];
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $cityName = $_POST['cityName'];
  $provinceName = $_POST['provinceName'];
  $contactNumber = $_POST['contactNumber'];
  $birthDate = $_POST['birthDate'];
  $username = $_POST['userName'];
  $email = $_POST['email'];

  $editQuery = "UPDATE userInfo ui
        JOIN users u ON ui.userID = u.userID
        JOIN addresses a ON ui.addressID = a.addressID
        JOIN cities c ON a.cityID = c.cityID
        JOIN provinces pr ON a.provinceID = pr.provinceID
        SET 
            ui.firstName = '$firstName',
            ui.lastName = '$lastName',
            u.username = '$username',
            u.email = '$email',
            c.cityName = '$cityName',
            pr.provinceName = '$provinceName',
            ui.contactNumber = '$contactNumber',
            ui.birthDate = '$birthDate'
        WHERE ui.userID = '$userID'";
  $editResult = executeQuery($editQuery);
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
          <div class="card mt-4 text-center">
            <div class="card-body">
              <h2 class="card-title"><?php echo $row['firstName'] . ' ' . $row['lastName']; ?></h2>
              <h4 class="card-title"><?php echo $row['username']; ?></h4>
              <h5 class="card-title"><?php echo $row['email']; ?></h5>
              <h5 class="card-title"><?php echo $row['cityName'] . ', ' . $row['provinceName']; ?></h5>
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
              <a onclick="showEditForm(
                  '<?php echo $row['userID']; ?>',
                  '<?php echo $row['firstName']; ?>',
                  '<?php echo $row['lastName']; ?>',
                  '<?php echo $row['username']; ?>',
                  '<?php echo $row['email']; ?>',
                  '<?php echo $row['cityName']; ?>',
                  '<?php echo $row['provinceName']; ?>',
                  '<?php echo $row['contactNumber']; ?>',
                  '<?php echo $row['birthDate']; ?>'
                )">
                <button id="btnEditForm" class="edit-button" style="background-color: transparent; border: none" type="button">
                  <i class="bi bi-pencil-square"></i>
                </button>
              </a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <div class="modal fade p-0" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true" data-bs-theme="light">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title w-100 text-center" id="confirmationModalLabel">Edit information</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" method="POST">
            <input type="hidden" id="userID" name="userID">
            <div class="row">
              <div class="col">
                <input type="text" id="firstName" class="form-control info-input mb-2" name="firstName">
              </div>
            </div>
            <div class="row">
              <div class="col">
                <input type="text" id="lastName" class="form-control info-input mb-2" name="lastName">
              </div>
            </div>
            <div class="row">
              <div class="col">
                <input type="text" id="userName" class="form-control info-input mb-2" name="userName">
              </div>
            </div>
            <div class="row">
              <div class="col">
                <input type="text" id="email" class="form-control info-input mb-2" name="email">
              </div>
            </div>
            <div class="row">
              <div class="col">
                <input type="text" id="cityName" class="form-control info-input mb-2" name="cityName">
              </div>
            </div>
            <div class="row">
              <div class="col">
                <input type="text" id="provinceName" class="form-control info-input mb-2" name="provinceName">
              </div>
            </div>
            <div class="row">
              <div class="col">
                <input type="text" id="contactNumber" class="form-control info-input mb-2" name="contactNumber">
              </div>
            </div>
            <div class="row">
              <div class="col">
                <input type="text" id="birthDate" class="form-control info-input mb-2" name="birthDate">
              </div>
            </div>
            <button type="submit" class="btn-post w-100 text-center align-content-center" name="btnEditForm">
              Save
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    function showEditForm(userID, firstName, lastName, username, email, cityName, provinceName, contactNumber, birthDate) {
      document.getElementById("firstName").value = firstName;
      document.getElementById("lastName").value = lastName;
      document.getElementById("userName").value = username;
      document.getElementById("email").value = email;
      document.getElementById("cityName").value = cityName;
      document.getElementById("provinceName").value = provinceName;
      document.getElementById("contactNumber").value = contactNumber;
      document.getElementById("birthDate").value = birthDate;
      document.getElementById("userID").value = userID;
      var modal = new bootstrap.Modal(document.getElementById("editModal"));
      modal.show();
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>