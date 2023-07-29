<?php
include('view/connection.php');
$oCitysql = "select * from cityTbl";
$oCityResult = mysqli_query($con, $oCitysql);

$dCitysql = "select * from cityTbl";
$dCityResult = mysqli_query($con, $dCitysql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>ST Awesome Airline</title>
    <link rel="stylesheet" href="css/booking.css">
</head>
<body>
    <?php
    include('view/header.php');
    ?>
    <section class="hero-section">
        <div id="oneWay" class="tabcontent">
            <h1>One Way Flight Booking</h1>
            <form action="getSearchFlight.php" method="POST">
                <label for="origin">Origin:</label>
                <select id="origin" name="origin" required>
                    <option value="" disabled selected>Select Origin</option>
                    <?php while ($row = mysqli_fetch_assoc($oCityResult)) { ?>
                        <option value="<?php echo $row['City']; ?>"><?php echo $row['City']; ?></option>
                    <?php } ?>
                </select>
                <label for="destination">Destination:</label>
                <select id="destination" name="destination" required>
                    <option value="" disabled selected>Select Destination</option>
                    <?php while ($row = mysqli_fetch_assoc($dCityResult)) { ?>
                        <option value="<?php echo $row['City']; ?>"><?php echo $row['City']; ?></option>
                    <?php } ?>
                </select>
                <label for="date">Departure Date:</label>
                <input type="date" data-date-format="YYYY-MM-DD" id="date" name="date">

                <label for="flightClass">Flight Class:</label>
                <select id="flightClass" name="flightClass" required>
                    <option value="economy">Economy</option>
                    <option value="business">Business</option>
                </select>
                <label for="passengers">Number of Passengers:</label>
                <input type="number" id="passengers" name="passengers" min="1" max="10" required>
                <input type="submit" value="Search Now">
            </form>
        </div>
    </section>


    <?php
    include('view/footer.php');
    ?>


</body>

</html>