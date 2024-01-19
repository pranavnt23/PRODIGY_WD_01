<?php
$seats = $_POST['seats'];

$connection = new mysqli("localhost", "root", "", "system");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Retrieve the rate per ticket from the table
$rateQuery = "SELECT bus_ticket FROM bus_details LIMIT 1";
$rateResult = $connection->query($rateQuery);
if (!$rateResult) {
    die("Invalid Query: " . $connection->error);
}
$row = $rateResult->fetch_assoc();
$rate = $row['bus_ticket'];

// Calculate the total fare
$totalFare = $seats * $rate;

$connection->close();
?>

<html>
<head>
    <title>BookMyTrip - Booking Confirmation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="homehead">
        <center class="headtxt">
            BookmyTrip
        </center>
    </div>
    <br><br><br>
    <center class="getratediv">
        <div class="aboutdiv"><br><br><br><br><br><br>
            <h2>Booking Confirmation</h2>
            <p>Number of Seats: <?php echo $seats; ?></p>
            <p>Total Fare: <?php echo $totalFare; ?></p>
            <!-- Additional confirmation details can be displayed here -->
        </div>
    </center>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div class="homepagebottom">
        <center>
            BookmyTrip<br><br><br>
            <img src="fb.png" height="20px">&nbsp;&nbsp;<i style="font-size: 25px;">BookmyTrip </i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <img src="insta.png" height="20px">&nbsp;&nbsp;<i style="font-size: 25px;">BookmyTrip </i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <img src="twit.png" height="20px">&nbsp;&nbsp;<i style="font-size: 25px;">BookmyTrip </i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </center>
    </div>
</body>
</html>
