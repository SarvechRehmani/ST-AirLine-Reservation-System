<?php 
include('../../view/connection.php');
$flight_id = $_POST['flight_id'];

$sql = "UPDATE addflighttbl SET status = 'Departed' WHERE Flight_id = '$flight_id'";
$Result = mysqli_query($con, $sql);

if($Result){
    header('location: ../dashboard.php');
    $_SESSION['dep'] = "succes";
}
?>
