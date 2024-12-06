<?php
include("connect.php");

$airlineNameFilter = $_GET['airlineName'] ?? '';
$aircraftTypeFilter = $_GET['aircraftType'] ?? '';
$sort = $_GET['sort'] ?? '';
$order = $_GET['order'] ?? '';

$flightlogsQuery = "SELECT * FROM flightlogs";

if ($airlineNameFilter || $aircraftTypeFilter) {
  $flightlogsQuery .= " WHERE";

  if ($airlineNameFilter) {
      $flightlogsQuery .= " airlineName='$airlineNameFilter'";
  }

  if ($airlineNameFilter && $aircraftTypeFilter) {
      $flightlogsQuery .= " AND";
  }

  if ($aircraftTypeFilter) {
      $flightlogsQuery .= " aircraftType='$aircraftTypeFilter'";
  }
}

if ($sort != ''){
  $flightlogsQuery = $flightlogsQuery." ORDER BY $sort";

  if($order != ''){
    $flightlogsQuery = $flightlogsQuery." $order";
  }
}

$flightlogsResults = executeQuery($flightlogsQuery);

$airlineNameQuery = "SELECT DISTINCT(airlineName) FROM flightlogs";
$airlineNameResults = executeQuery($airlineNameQuery);

$aircraftTypeQuery = "SELECT DISTINCT(aircraftType) FROM flightlogs";
$aircraftTypeResults = executeQuery($aircraftTypeQuery);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PUP Airport</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <nav class="navbar">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="assets/imgs/logo.png" alt="Bootstrap" width="160" height="80">
      </a>
    </div>
  </nav>
  <div class="container">
    <div class="row m-2 my-5">
      <div class="col">
        <form method="GET">
          <div class="card p-3 rounded-4 d-flex justify-content-between">
            <button type="button" id="showFilter" onclick="filterOptions()" class="d-flex justify-content-start btn"
              style="background-color:transparent; border:none;">
              <i class="bi bi-funnel" style="font-size:30px;"></i> 
            </button>
            <div class="row p-5" id="filter" style="display: none;"></div>
          </div>
        </form>
      </div>
    </div>
    <div class="row m-2">
      <div class="col">
        <div class="card p-5 rounded-4">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Flight Number</th>
                  <th scope="col">Departure Airport Code</th>
                  <th scope="col">Arrival Airport Code</th>
                  <th scope="col">Flight Duration Minutes</th>
                  <th scope="col">Pilot Name</th>
                  <th scope="col">Airline Name</th>
                  <th scope="col">Aircraft Type</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (mysqli_num_rows($flightlogsResults) > 0) {
                  while ($flightlogsRow = mysqli_fetch_assoc($flightlogsResults)) {
                    ?>
                    <tr>
                      <td><?php echo $flightlogsRow['flightNumber'] ?></td>
                      <td><?php echo $flightlogsRow['departureAirportCode'] ?></td>
                      <td><?php echo $flightlogsRow['arrivalAirportCode'] ?></td>
                      <td><?php echo $flightlogsRow['flightDurationMinutes'] ?></td>
                      <td><?php echo $flightlogsRow['pilotName'] ?></td>
                      <td><?php echo $flightlogsRow['airlineName'] ?></td>
                      <td><?php echo $flightlogsRow['aircraftType'] ?></td>
                    </tr>
                    <?php
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>

    <script>
      function filterOptions() {
        var filterContainer = document.getElementById("filter");
        if (filterContainer.style.display == "none" || filterContainer.style.display == "") {
          filterContainer.style.display = "block";
          filterContainer.innerHTML = `
          <div class="d-flex flex-wrap align-items-center">
            <div class="d-flex align-items-center me-3 mb-3">
              <label for="airlineSelect" class="me-2">Airline Name</label>
              <select id="airlineSelect" name="airlineName" class="form-control" style="width: fit-content">
                <option value="">Any</option>
                <?php
                if (mysqli_num_rows($airlineNameResults) > 0) {
                  while ($airlineNameRow = mysqli_fetch_assoc($airlineNameResults)) {
                    ?>
                    <option <?php if ($airlineNameFilter == $airlineNameRow['airlineName']) {
                      echo "selected";
                    } ?> value="<?php echo $airlineNameRow['airlineName'] ?>">
                      <?php echo $airlineNameRow['airlineName'] ?>
                    </option>
                    <?php
                  }
                }
                ?>
              </select>
            </div>
            <div class="d-flex align-items-center me-3 mb-3">
              <label for="aircraftSelect" class="me-2">Aircraft Type</label>
              <select id="aircraftSelect" name="aircraftType" class="form-control" style="width: fit-content">
                <option value="">Any</option>
                <?php
                if (mysqli_num_rows($aircraftTypeResults) > 0) {
                  while ($aircraftTypeRow = mysqli_fetch_assoc($aircraftTypeResults)) {
                    ?>
                    <option <?php if ($aircraftTypeFilter == $aircraftTypeRow['aircraftType']) {
                      echo "selected";
                    } ?> value="<?php echo $aircraftTypeRow['aircraftType'] ?>">
                      <?php echo $aircraftTypeRow['aircraftType'] ?>
                    </option>
                    <?php
                  }
                }
                ?>
              </select>
            </div>

            <div class="d-flex align-items-center me-3 mb-3">
              <label for="sort" class="me-2">Sort By</label>
              <select id="sort" name="sort" class="form-control" style="width: fit-content">
                <option value="">None</option>
                <option <?php if ($sort == "pilotName") {
                  echo "selected";
                } ?> value="pilotName">Pilot Name</option>
                <option <?php if ($sort == "flightNumber") {
                  echo "selected";
                } ?> value="flightNumber">Flight Number</option>
                <option <?php if ($sort == "departureAirportCode") {
                  echo "selected";
                } ?> value="departureAirportCode">Departure Code</option>
                <option <?php if ($sort == "arrivalAirportCode") {
                  echo "selected";
                } ?> value="arrivalAirportCode">Arrival Code</option>
                <option <?php if ($sort == "flightDurationMinutes") {
                  echo "selected";
                } ?> value="flightDurationMinutes">Flight Duration Minutes</option>
              </select>
            </div>

            <div class="d-flex align-items-center me-3 mb-3">
              <label for="order" class="me-2">Order</label>
              <select id="order" name="order" class="form-control" style="width: fit-content">
                <option <?php if ($order == "ASC") {
                  echo "selected";
                } ?> value="ASC">Ascending</option>
                <option <?php if ($order == "DESC") {
                  echo "selected";
                } ?> value="DESC">Descending</option>
              </select>
            </div>

            <div class="w-100 d-flex justify-content-end">
              <button class="btn" type="submit" style="width: fit-content">Submit</button>
            </div>
          </div>
        `;
        } else {
          filterContainer.style.display = "none";
          filterContainer.innerHTML = "";
        }
      }
    </script>
  </div>
</body>

</html>