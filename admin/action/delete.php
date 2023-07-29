<?php 
include('../../view/connection.php');
$id = $_POST['id'];

$sql = "DELETE FROM airlineTbl WHERE id = '$id'";
$Result = mysqli_query($con, $sql);

if($Result){
    header('location: ../manageAirline.php');
}
?>