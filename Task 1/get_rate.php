<html>
    <?php
$from=$_POST['fromLocation'];
$to=$_POST['toLocation'];
$connection=new mysqli("localhost","root","","system");
if($connection->connect_error)
{
    die("Connection failed:".$connection->connect_error);
}
$sql="SELECT * from bus_details where bus_from='$from' && bus_to='$to'";
$result=$connection->query($sql);
if(!$result)
{
    die("Invalid Query: " . $connection->error);
}
?>
<link rel="stylesheet" href="style.css">
<body>
<div class="homehead">
<center class="headtxt">
    BookmyTrip
</center>
</div><br><br><br>
<center class="getratediv">
<div class="aboutdiv"><br><br><br><br><br><br>
<form action="booked.php" method="post">
<table border=1>
<tr>
<th>Bus Number</th>
<th>Bus Name</th>
<th>From Location</th>
<th>To Location</th>
<th>Fare</th>
<th>Available Seats</th>
</tr>
<?php
while($row=$result->fetch_assoc())
{
    echo "<tr>
    <td>". $row["bus_no"]."</td>
    <td>". $row["bus_name"]."</td>
    <td>". $row["bus_from"]."</td>
    <td>". $row["bus_to"]."</td>
    <td>". $row["bus_ticket"]."</td>
    <td>". $row["bus_available"]."</td>
    </tr>";
}
?>
</table><br>

<label for="seats">Select Number of Seats:</label>
                <select name="seats" id="seats">
                    <option value="1">1 Seat</option>
                    <option value="2">2 Seats</option>
                    <option value="3">3 Seats</option>
                    <!-- Add more options as needed -->
                </select>
                <br><br>
                <input type="submit" class="loginbutton" value="Book Now">
            </form>
</div>
</center><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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