<?php
session_start();
if (isset($_SESSION['userid'])) {
    $_SESSION['flight_id'] = $_POST['flight_id'];
    $_SESSION['airlineName'] = $_POST['airlineName'];
    $_SESSION['flightClass'] = $_POST['flightClass'];
    $_SESSION['passengers'] = $_POST['passengers'];
    $_SESSION['price'] = $_POST['price'];

    for ($i = 0; $i < $_SESSION['passengers']; $i++) {
        $_SESSION['fname'][$i] = $_POST['fname'][$i];
        $_SESSION['lname'][$i] = $_POST['lname'][$i];
        $_SESSION['dob'][$i] = $_POST['dob'][$i];
        $_SESSION['phone'][$i] = $_POST['phone'][$i];
    }

    // for ($i = 0; $i < $_SESSION['passengers']; $i++) {
    //     echo $_SESSION['flight_id'];
    //     echo '<br>';
    //     echo $_POST["airlineName"];
    //     echo '<br>';
    //     echo $_SESSION['flightClass'];
    //     echo '<br>';
    //     echo $_SESSION['passengers'];
    //     echo '<br>';
    //     echo $_SESSION['price'];
    //     echo '<br>';
    //     echo $_SESSION['fname'][$i];
    //     echo '<br>';
    //     echo $_SESSION['lname'][$i];
    //     echo '<br>';
    //     echo $_SESSION['dob'][$i];
    //     echo '<br>';
    //     echo $_SESSION['phone'][$i];
    //     echo '<br>';
    //     echo '<br>';
    // }
    header('location: ../payment.php');
} else {
    echo 'Error Apears in addPassanger.php';
}
