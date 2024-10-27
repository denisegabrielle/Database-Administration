<?php
include("connect.php");

$query = "SELECT * FROM Users LEFT JOIN Addresses ON Users.address_id = Addresses.ID LEFT JOIN Access ON Users.access_level = Access.AccessID";
$result = executeQuery($query);

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <div class="container-fluid shadow mb-5 p-3">
    <h1>This is a logo</h1>
  </div>
  <div class="container">
    <div class="row">

      <!-- PHP BLOCK -->
      <?php
      if (mysqli_num_rows($result)) {
        while ($user = mysqli_fetch_assoc($result)) {
          ?>

          <div class="col-12">
            <div class="card rounded-4 shadow my-3 mx-5"
              <?php if($user["is_deleted"] == "yes"){
                echo "style='background-color: pink'";
              } ?>
            >
              <div class="card-body">
                <h5 class="card-title">
                  <?php echo $user["first_name"] . " " . $user["last_name"] ?>
                </h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">
                  <?php
                  if ($user["city"] != "") {
                    echo $user["city"] . ", " . $user["province"];
                  } else {
                    echo "-----";
                  }
                  ?>
                </h6>
                <p class="card-text">
                  <?php
                    if($user['AccessDescription'] != ""){
                      echo $user['AccessDescription'];
                    } else {
                      echo "<i style='color: grey'>No data to show</i>";
                    }
                    
                  ?>
                </p>
              </div>
            </div>
          </div>

          <?php
        }
      }
      ?>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>