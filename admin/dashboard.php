<?php
include('../view/connection.php');
$sql = "select * from addflightTbl";
$Result = mysqli_query($con, $sql);

$countPassangerSql = "SELECT COUNT(username) AS c FROM userTbl";
$countPassangerResult = mysqli_query($con, $countPassangerSql);

$countFlightSql = "SELECT COUNT(flight_id) AS fid FROM addflightTbl";
$countFlightResult = mysqli_query($con, $countFlightSql);

$countAirlineSql = "SELECT COUNT(id) AS aid FROM airlineTbl";
$countAirlineResult = mysqli_query($con, $countAirlineSql);

$sumAmountSql = "SELECT SUM(price) AS amm FROM passangertbl";
$sumAmountResult = mysqli_query($con, $sumAmountSql);

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>
    <?php
    include('headerNav.php');
    if (isset($_SESSION['adminId']) || isset($_SESSION['adminlogin'])) {
    ?>
        <div class="box-container">

            <div class="box">
                <div class="box-label">
                    <img src="imgs/1.png" alt="Passenger Icon">Total Passengers
                </div>
                <div class="box-value"><?php while ($row = mysqli_fetch_assoc($countPassangerResult)){ echo $row['c'];}?></div>
            </div>
            
            <div class="box">
                <div class="box-label">
                    <img src="imgs/2.png" alt="Flight Icon">Flights
                </div>
                <div class="box-value"><?php while ($row = mysqli_fetch_assoc($countFlightResult)){ echo $row['fid'];}?></div>
            </div>
            <div class="box">
                <div class="box-label">
                    <img src="imgs/3.png" alt="Airline Icon">Available Airlines
                </div>
                <div class="box-value"><?php while ($row = mysqli_fetch_assoc($countAirlineResult)){ echo $row['aid'];}?></div>
            </div>
            <div class="box">
                <div class="box-label">
                    <img src="imgs/4.png" alt="Airline Icon">Amount
                </div>
                <div class="box-value"><?php while ($row = mysqli_fetch_assoc($sumAmountResult)){ echo $row['amm'];}?></div></div>
            </div>
        </div>
        <div id="main-content">
            <table cellpadding="7px">
                <thead>
                    <h1 align="center">Today's Flight</h1>
                    <th>#</th>
                    <th>Arrival</th>
                    <th>Departure</th>
                    <th>Destination</th>
                    <th>Source</th>
                    <th>Airlines</th>
                    <th>Action</th>
                </thead>
                <tbody>

                    <?php while ($row = mysqli_fetch_assoc($Result)) { ?>
                        <tr>
                            <td><?php echo $row['flight_id'] ?></td>
                            <td><?php echo $row['departureDate'] ?></td>
                            <td><?php echo $row['arrivalDate'] ?></td>
                            <td><?php echo $row['Origin'] ?></td>
                            <td><?php echo $row['Destination'] ?></td>
                            <td><?php echo $row['airlineName'] ?></td>
                            <td>
                                <!-- style="pointer-events: none; -->
                                <form action="action/departed.php" method="POST">
                                    <input type="hidden" type="number" name="flight_id" value="<?php echo $row['flight_id']; ?>">
                                    <button type="submit" <?php if ($row['status'] == "Departed") { 
                                        echo 'style="pointer-events: none; font-weight: bold; background-color: #5cff7c; color: #333;"';
                                        } ?>>DEPARTED</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    <?php
    } else {
        echo '<h1>Please Login to Continue</h1>';
    }
    ?>
</body>

</html>