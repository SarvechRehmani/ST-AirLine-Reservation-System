<?php
session_start();
$showError = false;
$showLoginError = false;
if (isset($_SESSION['username'])) {
    header("location: home.php");
    exit;
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {

    include("view/connection.php");

    if ($_POST["sign"] == "login") {

        $username = $password = "";

        if (empty(trim($_POST['username']))) {
            $showLoginError = "Please Enter Username.!";
        } elseif (empty(trim($_POST['password']))) {
            $showLoginError = "Please Enter Password.!";
        } else {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $sql = "Select * from userTbl where username='$username' AND password='$password'";
            $Result = mysqli_query($con, $sql);

            while($row = mysqli_fetch_assoc($Result)){
                $_SESSION['userid'] = $row['u_id'];
            }
            $num = mysqli_num_rows($Result);
            if ($num == 1) {

                $_SESSION['username'] = $username;
                $_SESSION['logedin'] = true;

                header('location: home.php');
            } else {
                $showLoginError = "Invalid Username & Password.!";
            }
            
        }
    } elseif ($_POST["sign"] == "Register") {
        $name = trim($_POST["name"]);
        $email = trim($_POST["email"]);
        $username = trim($_POST['username']);
        $password = trim($_POST["password"]);
        $cpassword = trim($_POST["cpassword"]);
        if (empty($name)) {
            $showError = "Name cannot be Blank";
        } else {
            if (empty($email)) {
                $showError = "Email cannot be Blank";
            } elseif (isset($email)) {
                $sql = "select u_id from userTbl where email = '$email' ";
                $stmt = mysqli_query($con, $sql);
                $num = mysqli_num_rows($stmt);
                if ($num >= 1) {
                    $showError = "This Email address is already being Used";
                } else {
                    if (empty($username)) {
                        $showError = "Username cannot be Blank";
                    } elseif (isset($username)) {
                        $sql = "select u_id from userTbl where username = '$username' ";
                        $stmt = mysqli_query($con, $sql);
                        $num = mysqli_num_rows($stmt);
                        if ($num >= 1) {
                            $showError = "This username is already Taken";
                        } else {
                            if (empty($password)) {
                                $showError = "Password cannot be blank";
                            } elseif (strlen($password) < 5) {
                                $showError = "Password cannot be less than 5 characters";
                            } else {

                                if (trim($password) !=  trim($cpassword)) {
                                    $showError = "Passwords should be match";
                                } else {
                                    if (empty($showError)) {
                                        $sql = "insert into userTbl (name, email, username, password) VALUES ('$name' , '$email' , '$username' , '$password')";
                                        $Result = mysqli_query($con, $sql);
                                        if ($Result) {
                                            $_SESSION['inserted'] = true;
                                            
                                            header("location: login.php");
                                            exit();
                                        } else {
                                            $showError = "Something went wrong..! cannot redirect";
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        mysqli_close($con);
    }
}
?>

<title>Login & Registration</title>
<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<div class="form-container">
    <!-- login  -->
    <?php
    if ($showLoginError) {
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error ! </strong> ' . $showLoginError . '
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </button>
    </div> ';
    }
    ?>
    <!-- Registration  -->
    <?php
    if (isset($_SESSION['inserted'])) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success !</strong> Your acount is created. you can now Login !
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            </div>';
        // unset($_SESSION['inserted']);
    } elseif ($showError) {
        echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                <strong>Error ! </strong> ' . $showError . ' !
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    if (isset($_SESSION['inserted'])) {
        session_unset();
        session_destroy();
    }
    ?>

    <input type="radio" name="form-selector" id="login-form" checked>
    <label id="color" for="login-form">Login</label>
    <input type="radio" name="form-selector" id="register-form">
    <label id="color" for="register-form">Register</label>

    <form id="login-form-container" action="login.php" method="POST">
        <br>
        <h1>LOG IN PANEL</h1>
        <input type="text" name="username" placeholder="Enter Username" required>
        <input type="password" name="password" placeholder="Enter Password" required>


        <input type="submit" name="sign" value="login">


        Don't have an account? <label for="register-form" class="toggle-form">Register here</label>
    </form>
    <form id="registration-form" method="POST">
        <br>
        <h1>REGISTRATION PANEL</h1>
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="cpassword" placeholder="Confirm Password" required>

        <input type="submit" name="sign" value="Register">
        Already have an account? <label for="login-form" class="toggle-form">Login here</label>
    </form>
</div>