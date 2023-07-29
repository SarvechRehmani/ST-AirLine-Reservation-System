<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    .container {
        background-image: url('view/logo/passanger.png');
        background-position: left;
        background-repeat: no-repeat;
        background-size: 190px;

        margin: 20px auto;
        /* Add auto margin to center the form */
        max-width: 700px;
        border: 1px solid yellow;
        border-radius: 5px;
        /* Add border to the form */
        background-color: #f7d418;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    .form-row {
        display: flex;
        align-items: center;
        margin: 10px 0;
        width: 100%;
        color: black;
        font-size: 20px;
    }

    .form-row label {
        margin: 10px;
        font-size: 16px;
        font-weight: bold;

    }

    .form-row input[type="text"] {
        padding: 10px;
        border-style: solid;
        border-radius: 5px;
        width: 100%;
    }

    .form-row input[type="date"] {
        padding: 10px;
        width: 100%;
        border-style: solid;
        border-radius: 5px;
        margin-left: 6%;
        margin-right: 3%;


    }

    .form-row select {
        padding: 10px;
        width: 30px;
        border-style: solid;
        border-radius: 5px;
        flex: 1;
    }

    button {
        padding: 12px;
        border: none;
        border-radius: 5px;
        background-color: #007bff;
        color: white;
        /* font-weight: bold; */
        margin-bottom: 20px;
        cursor: pointer;
        font-size: 20px;
        transition: 0.2s;
    }

    button:hover {
        background-color: #0062cc;
    }
</style>
<?php
include('view/header.php');
$flight_id = $_POST['flight_id'];
$airlineName = $_POST['airlineName'];
$passengers = $_POST['passengers'];
$price = $_POST['price'];
$flightClass = $_POST['flightClass'];
if($flightClass == "business"){
    $price = (int)(150 + $price);
}
?>
<section class="hero-section">
    <form action="view/addPassanger.php" method="POST">
        <?php
        for ($i = 1; $i <= $passengers; $i++) {
        ?>
            <input type="hidden" type="number" name="flight_id" value=<?php echo $flight_id; ?>>
            <input type="hidden" name="airlineName" value=<?php echo $airlineName; ?>>
            <input type="hidden"  type="text" name="flightClass" value=<?php echo $flightClass; ?>>
            <input type="hidden"  type="number" name="passengers" value=<?php echo $passengers; ?>>
            <input type="hidden"  type="number" name="price" value=<?php echo $price; ?>>

            <div class="container">
                <div id="formhead">
                    <h1>Passenger <?php echo $i ?> Details</h1>
                </div>
                <div class="form-row">
                    <label for="fname">FirstName</label>
                    <input type="text" id="fname" name="fname[]" required>
                    <label for="lname">LastName</label>
                    <input type="text" id="lname" name="lname[]" required>
                </div>
                <div class="form-row">
                    <label for="dob">DOB</label>
                    <input type="date" id="dob" name="dob[]" required>
                    <label for="phone">Contact</label>
                    <input type="text" id="phone" name="phone[]" required>
                </div>
            </div>
        <?php
        }
        ?>
        <button type="submit">Proceed</button>
    </form>


</section>
<?php
include('view/footer.php');
?>