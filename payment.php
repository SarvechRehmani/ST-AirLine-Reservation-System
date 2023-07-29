<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
    }

    h1 {

        margin-top: 20px;
        text-align: center;
    }

    .form-container {
        margin: 20px auto;
        max-width: 400px;
        border: 1px solid yellow;
        border-radius: 5px;
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

    h2 {
        font-size: 24px;
        margin-bottom: 20px;
        text-align: center;
    }

    .form-row {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        margin: 10px;
    }

    img {
        width: 60px;
    }

    input[type="text"] {
        padding: 10px;
        border: 1px solid;
        border-radius: 5px;
        font-size: 16px;
        width: 100%;
    }

    button[type="submit"] {
        background-color: #007bff;
        font-weight: bold;
        color: #fff;
        padding: 15px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: 0.2s;
    }

    button[type="submit"]:hover {
        background-color: #0062cc;
    }

    .card-logos {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card-logos img {
        height: 30px;
        margin-right: 10px;
    }

    #formhead {
        margin-top: 25px;
    }
</style>
<?php
include('view/header.php');
?>

<?php
$Error = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('view/connection.php');
    $cardNumber = $_POST['cardNumber'];
    $expiryDate = $_POST['expiryDate'];
    $cvv = $_POST['cvv'];
    if (strlen($cardNumber) != 16) {
        $Error = "Enter valid card number !";
    } elseif (strlen($expiryDate) != 4) {
        $Error = "Enter valid Expiry Date of your card !";
    } elseif (strlen($cvv) != 3) {
        $Error = "Enter valid CVV number of your card !";
    } else {
        $sql = "select * from paymentcardtbl where Card_no = '$cardNumber' AND expiry = '$expiryDate' AND cvv = '$cvv'";
        $Result = mysqli_query($con, $sql);
        $num = mysqli_num_rows($Result);
        if ($num > 0) {
            $userid = $_SESSION['userid'];
            $flight_id = $_SESSION['flight_id'];
            $airlineName = "";
            $passangers = $_SESSION['passengers'];
            $flightClass = $_SESSION['flightClass'];
            $price = $_SESSION['price'];

            for ($i = 0; $i < $passangers; $i++) {
                
                $fname = $_SESSION['fname'][$i];
                $lname = $_SESSION['lname'][$i];
                $dob = $_SESSION['dob'][$i];
                $phone = $_SESSION['phone'][$i];

                $aSql = "select * from addflighttbl where flight_id = '$flight_id'";
                $aResult = mysqli_query($con,$aSql);

                while($row = mysqli_fetch_assoc($aResult)){
                    $airlineName = $row['airlineName'];
                }
                $iPSql = "insert into passangertbl (u_id, flight_id, phone, dob, fname, lname, price, airlineName) values ('$userid', '$flight_id', '$phone', '$dob', '$fname', '$lname', '$price', '$airlineName')";

                $iPResult = mysqli_query($con, $iPSql);

                if ($iPResult) {
                    while ($row = mysqli_fetch_assoc($Result)) {
                        $newAmount = $row['amount'] - ($passangers * $price);
                        $ammSql = "update paymentcardTbl set amount = '$newAmount' where Card_no = '$cardNumber' AND expiry = '$expiryDate' AND cvv = '$cvv'";
                        $ammResult = mysqli_query($con, $ammSql);
                        // header('location: home.php');
                    }
                }else{
                    $Error = "Error in inserting record in pasangerTBL";
                }
            }
        }else{
            $Error = "Please Use valid Card info.";
        }
    }
    die("<script>location.href = 'home.php'</script>");
}
?>



<h1 id="formhead">Payment</h1>
<div class="form-container">

    <form method="POST">
        <h2>Enter Card Details</h2>
        <div class="form-row">
            <label>Accepted Cards:</label>
            <img src="imgs/card/1.jpg" alt="Visa">
            <img src="imgs/card/2.jpg" alt="Mastercard">
            <img src="imgs/card/3.jpg" alt="PayPak">
            <img src="imgs/card/4.jpg" alt="UnionPay">
        </div>
        <div class="form-row">
            <label for="cardNumber">Card Number:</label>
            <input type="text" id="cardNumber" name="cardNumber" placeholder="1234 5678 9012 3456" required>
        </div>
        <div class="form-row">
            <label for="expiryDate">Expiration Date:</label>
            <input type="text" id="expiryDate"  name="expiryDate" placeholder="MM / YY" required>
            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" placeholder="123" required>
        </div>
        <div>
            <button type="submit">Pay Now</button>
        </div>
    </form>
</div>
<?php
include('view/footer.php');
?>