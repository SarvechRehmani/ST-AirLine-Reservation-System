<?php
include('../view/connection.php');

$Error = false;
$Succuss = false;

$fromCitySql = "select * from cityTbl;";
$fromCityResult = mysqli_query($con, $fromCitySql);

$toCitySql = "select * from cityTbl;";
$toCityResult = mysqli_query($con, $toCitySql);

$airlineSql = "Select * from airlineTbl";
$airlineResult = mysqli_query($con, $airlineSql);


if ($_SERVER['REQUEST_METHOD'] == "POST") {

	$departureDate = trim($_POST['departureDate']);
	$arrivalDate = trim($_POST['arrivalDate']);

	$origin = trim($_POST['origin']);
	$destination = trim($_POST['destination']);

	$price = trim($_POST['price']);
	$airline = trim($_POST['airline']);

	if ($origin === $destination || $destination === '' || $destination === '') {
		// Error handel here latter
		header('Location: addflight.php');
		exit();
	} else {
		$seatsSql = "select * from airlineTbl where AirlineName = '$airline'";
		$seatsResult = mysqli_query($con, $seatsSql);
		if ($row = mysqli_fetch_assoc($seatsResult)) {
			$airline = $row['AirlineName'];
			$seats = $row['Seats'];
			$sql = "INSERT INTO `addflighttbl` (departureDate, arrivalDate, Origin, Destination, seats, Price, airlineName, status) VALUES ('$departureDate', '$arrivalDate', '$origin', '$destination', '$seats', '$price', '$airline', '')";
			$result = mysqli_query($con, $sql);
			if ($result) {
				$Succuss = "Flight Added.";
			} else {
				$Error = "Something went wrong. Please Chech or try again.";
			}
		} else {
			$Error = "Can not fetch Data from database";
		}
	}
}
?>

<head>
	<title>ADD FLIGHT DETAILS</title>
	<link rel="stylesheet" href="css/addflight.css">
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>
	<?php
	include('headerNav.php');

	?>
	<?php
    if ($Succuss) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success !</strong> '.$Succuss.' !
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            </div>';
    }elseif ($Error) {
        echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                <strong>Error ! </strong> ' . $Error . ' !
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
	if($Succuss || $Error){
		$Succuss = false;
		$Error = false;
	}
	?>
	<main>
		<form method="POST">
			<div id="formhead">
				<h1>ADD FLIGHT DETAILS</h1>
			</div>
			<div class="form-row">
				<label for="departure-time">Departure Time:</label>
				<input type="datetime-local" id="departure-time" name="departureDate" required>

			</div>
			<div class="form-row">
				<label for="arrival-time">Arrival Time:</label>
				<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<input type="datetime-local" id="arrival-time" name="arrivalDate" required>

			</div>
			<div class="form-row">
				<label for="origin">Origin:</label>
				<select name="origin" id="origin">
					<option value="" selected disabled>From:</option>
					<?php
					while ($row = mysqli_fetch_array($fromCityResult)) {
					?>
						<option value="<?php echo $row['City']; ?>"><?php echo $row['City']; ?></option>
					<?php
					}
					?>
				</select>
				<span>&nbsp;&nbsp;</span>
				<label for="destination">Destination:</label>
				<select name="destination" id="destination">
					<option value="" selected disabled>To:</option>
					<?php while ($row = mysqli_fetch_assoc($toCityResult)) { ?>
						<option value="<?php echo $row['City']; ?>"><?php echo $row['City']; ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="form-row">
				<label for="price">Price:</label>
				<span>&nbsp;&nbsp;</span>
				<input type="number" id="price" name="price" required>
				<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
				<label for="airline">Airline:</label>
				<select id="airline" name="airline" required>
					<option value="" selected disabled>Select Airline</option>
					<?php while ($row = mysqli_fetch_assoc($airlineResult)) { ?>
						<option value="<?php echo $row['AirlineName']; ?>"><?php echo $row['AirlineName']; ?></option>
					<?php } ?>
				</select>
			</div>
			<button type="submit">Add Flight</button>
		</form>
	</main>