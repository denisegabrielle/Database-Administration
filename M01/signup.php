<?php
include('connect.php');

if (isset($_POST['btnSignup'])) {
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $contactNumber = $_POST['contactNumber'];
    $birthDate = $_POST['birthDate'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $cityQuery = "SELECT cityID FROM cities WHERE cityName = '$city'";
    $cityResult = executeQuery($cityQuery);

    if (mysqli_num_rows($cityResult) == 0) {
        $insertCityQuery = "INSERT INTO cities(cityName) VALUES ('$city')";
        executeQuery($insertCityQuery);
        $cityResult = executeQuery("SELECT cityID FROM cities WHERE cityName = '$city'");
    }

    $cityRow = mysqli_fetch_assoc($cityResult);
    $cityID = $cityRow['cityID'];

    $provinceQuery = "SELECT provinceID FROM provinces WHERE provinceName = '$province'";
    $provinceResult = executeQuery($provinceQuery);

    if (mysqli_num_rows($provinceResult) == 0) {
        $insertProvinceQuery = "INSERT INTO provinces(provinceName) VALUES ('$province')";
        executeQuery($insertProvinceQuery);
        $provinceResult = executeQuery("SELECT provinceID FROM provinces WHERE provinceName = '$province'");
    }

    $provinceRow = mysqli_fetch_assoc($provinceResult);
    $provinceID = $provinceRow['provinceID'];

    $addressQuery = "INSERT INTO addresses(cityID, provinceID) VALUES ('$cityID', '$provinceID')";
    executeQuery($addressQuery);

    $addressResult = executeQuery("SELECT addressID FROM addresses WHERE cityID = '$cityID' AND provinceID = '$provinceID' ORDER BY addressID DESC LIMIT 1");
    $addressRow = mysqli_fetch_assoc($addressResult);
    $addressID = $addressRow['addressID'];

    $addUserQuery = "INSERT INTO users(username, email, password) VALUES ('$username', '$email', '$password')";
    executeQuery($addUserQuery);

    $userIDQuery = "SELECT userID FROM users ORDER BY userID DESC LIMIT 1";
    $userIDResult = executeQuery($userIDQuery);
    $userIDRow = mysqli_fetch_assoc($userIDResult);
    $userID = $userIDRow['userID'];

    $userInfoQuery = "INSERT INTO userinfo(userID, firstName, lastName, contactNumber, birthDate, addressID) 
                    VALUES ('$userID', '$fName', '$lName', '$contactNumber', '$birthDate', '$addressID')";
    executeQuery($userInfoQuery);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PostConnect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

    <div class="container">
        <div class="row my-4">
            <div class="col d-flex justify-content-center">
                <div class="card p-3 text-center rounded-5 shadow" style="width: 400px; height: 650px;">
                    <form method="POST">
                        <div class="h3 mb-4">Sign up</div>
                        <div class="h5 text-start">Name</div>
                        <input class="my-2 form-control" placeholder="First Name" name="fName" type="text" required>
                        <input class="my-2 form-control" placeholder="Last Name" name="lName" type="text" required>

                        <div class="h5 text-start mt-3">Address</div>
                        <input class="my-2 form-control" placeholder="City" name="city" type="text" required>
                        <input class="my-2 form-control" placeholder="Province" name="province" type="text" required>
                        <input class="my-2 form-control" placeholder="Contact Number" name="contactNumber" type="tel" pattern="09[0-9]{2}-[0-9]{3}-[0-9]{4}" title="Format: 09XX-XXX-XXXX" required>
                        <input class="my-2 form-control" placeholder="Birth Date" name="birthDate" type="date" required>

                        <input class=" mt-4 my-2 form-control" placeholder="Username" name="username" type="text" required>
                        <input class="my-2 form-control" placeholder="Email" name="email" type="email" required>
                        <input class="my-2 form-control" placeholder="Password" name="password" type="password" required>

                        <button class="my-4 btn btn-secondary" type="submit" name="btnSignup">Sign-up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>