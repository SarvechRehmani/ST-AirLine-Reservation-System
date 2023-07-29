<?php
include('view/connection.php');

$origin = trim($_POST['origin']);
$destination = trim($_POST['destination']);
if($origin == $destination){
    $_SESSION['sameCityError'] = "Origin and Destination cannot be same !";
    die("<script>location.href = 'booking.php'</script>");
    
}


$sTime = '00:00:00';
$eTime = '23:59:59';
$sDate = $_POST['date'].' '.$sTime;
$eDate = $_POST['date'].' '.$eTime;
$flightClass = $_POST['flightClass'];

// Count Passanger
$passengers = $_POST['passengers'];

$sql = "Select * from addflightTbl where origin = '$origin' AND destination = '$destination' AND departureDate >= '$sDate' AND departureDate <= '$eDate'";
$Result = mysqli_query($con, $sql);

$num =mysqli_num_rows($Result);

?>


<!DOCTYPE html>
<html>

<head>
    <title>ST Awesome Airline</title>
    <link rel="stylesheet" href="css/getSearchFlight.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <?php
    include('view/header.php');
    ?>

    <section class="hero-section">
        <div class="hero-content">
            <table cellpadding="7px">
                <thead>
                    <h1 align="center">FLIGHTS FROM: <br>
                        <?php echo $origin; ?>
                        to:
                        <?php echo $destination; ?></h1>
                    <th>Airline</th>
                    <th>Departure</th>
                    <th>Arrival</th>
                    <th>Status</th>
                    <th>Fare</th>
                    <th>Buy</th>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($Result)) { ?>
                        <tr>
                            <td><?php echo $row['airlineName']; ?></td>
                            <td><?php echo $row['departureDate']; ?></td>
                            <td><?php echo $row['arrivalDate']; ?></td>
                            <td><?php if ($row['status']  == "") {
                                    echo "Not Departed";
                                } else {
                                    echo $row['status'];
                                } ?></td>
                            <td><?php if ($flightClass == "business") {
                                    
                                    echo 'RS ' . $passengers * (150 + $row['Price']);
                                } else {

                                    echo 'RS ' . $passengers * $row['Price'];
                                } ?></td>
                            <td>
                                <form action="PassangerDetail.php" method="POST">
                                    <input name='flight_id' type='hidden' type='number' value="<?php echo  $row['flight_id']; ?> ">
                                    <input name='airlineName' type='hidden'type='text' value="<?php echo  $row['airlineName']; ?>">
                                    <input name='flightClass' type='hidden' type='text' value="<?php echo  $flightClass; ?>">
                                    <input name='passengers' type='hidden' type='number' value=" <?php echo $passengers; ?>">
                                    <input name='price' type='hidden' type='number' value="<?php echo  $row['Price']; ?>">
                                    <button type="submit">✔ Book</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
            <?php if($num >= 1){
                echo '<h2 align="center" style="color:black; background-color:#f7d418; ;">Note: Price is for: <br>
                '.$passengers.' Seats</h2>';
            }else{
                echo '<h2 align="center" style="color:black; background-color:#f7d418; ;">Note available Flight <br>
                Right Now</h2>';  
            } ?>
            
        </div>
    </section>

    <?php
    include('view/footer.php');
    ?>
</body>

</html>