<?php
$Error = false;
session_start();
if (isset($_SESSION['adminId']) || isset($_SESSION['adminlogin'])) {
  header('location: dashboard.php');
}
elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
  include('../view/connection.php');
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  $sql = "select * from adminTbl where admin_uname = '$username' AND admin_pass = '$password'";
  $Result = mysqli_query($con, $sql);
  $num = mysqli_num_rows($Result);
  if ($num > 0) {
    session_start();
    $_SESSION['adminId'] = $username;
    $_SESSION['adminlogin'] = true;
    header('location: dashboard.php');
  } else {
    $Error = "Something went wrong. Please Check and try again !";
  }
}
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<style>
  #login-form-container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #f7d418;
    margin-top: 8%;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
  }
  h1 {
    font-size: 28px;
    text-align: center;
    margin-bottom: 30px;
  }
  label {
    display: block;
    font-size: 18px;
    margin-bottom: 10px;
  }
  input[type="text"],
  input[type="password"] {
    width: 100%;
    font-size: 16px;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 4px;
  }
  input[type="submit"] {
    display: block;
    width: 100%;
    font-size: 18px;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 4px;
    padding: 10px 20px;
    cursor: pointer;
    transition: all 0.3s ease;
  }
  input[type="submit"]:hover {
    background-color: #0069d9;
  }
  input[type="submit"]:active {
    background-color: #005cbf;
    transform: translateY(1px);
  }
</style>
<?php
if ($Error) {
  echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error ! </strong> ' . $Error . '
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </button>
    </div> ';
}
?>
<form id="login-form-container" action="" method="POST">
  <br>
  <h1>ADMINISTRATION LOG IN PANEL</h1>
  <label for="username">Username</label>
  <input type="text" name="username" placeholder="Enter Username" required>
  <label for="password">Password</label>
  <input type="password" name="password" placeholder="Enter Password" required>
  <input type="submit" name="sign" value="LOGIN">
</form>