<?php
session_start();
?>

<style>
  body,
  h1,
  h2,
  h3,
  p,
  ul,
  li {
    margin: 0;
    padding: 0;
    list-style-type: none;
  }

  body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
  }

  header {
    background-color: #007bff;
    color: #fff;
    padding: 20px;
  }

  .navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 40px;
  }

  .logo {
    display: flex;
    align-items: center;
  }

  .icon {
    height: 50px;
  }

  .title {
    font-size: 24px;
    font-weight: bold;
  }

  .title-accent {
    color: #f7d418;
  }

  .nav-links {
    display: flex;
  }

  .nav-links li {
    margin-left: 10px;
    font-size: 23px;
  }

  .nav-links li a {
    color: #fff;
    text-decoration: none;
    padding: 10px;
    font-size: 22px;
    position: relative;
    display: flex;
    align-items: center;
  }

  .navbar a i {
    margin-right: 5px;
  }

  .nav-links li a::before {
    content: "";
    position: absolute;
    bottom: -2px;
    width: 100%;
    height: 2px;
    background-color: #f7d418;
    transform: scaleX(0);
    transition: 0.3s;
  }

  .nav-links li a:hover::before {
    transform: scaleX(1);
  }

  .nav-links li a:hover {
    color: #f7d418;
  }

  .user-profile {
    display: flex;
    align-items: center;
    margin-left: 100px;
  }

  .user-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
  }

  .user-name {
    font-size: 18px;
    color: #fff;
    margin-right: 10px;
    cursor: pointer;
  }


  .sign-button {
    font-size: 20px;
    display: inline-block;
    background-color: #f7d418;
    color: #000;
    padding: 8px 16px;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s;
  }

  .sign-button:hover {
    background-color: #dcb10e;
  }
</style>

<title>ST Awesome Airline</title>
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


<header>
  <nav class="navbar">
    <div class="logo">
      <img src="view/logo/plane.png" alt="Logo" class="icon">
      <span class="title">ST Awesome <span class="title-accent">Airline.</span>
    </div>
    <ul class="nav-links">
      <li><a href="home.php" class="active"><i class="fa fa-contact"></i>Home</a></li>

      <?php

      if (isset($_SESSION['username']) || isset($_SESSION['logedin'])) {
        echo '<li><a href="booking.php"><i class="fa fa-plane"></i>Booking</a></li>
              <li><a href="schedule.php"><i class="fa fa-calendar"></i>Schedule</a></li>
              <li><a href="ticket.php"><i class="fa fa-ticket"></i>Tickets</a></li>';
              
      } else {
        echo '<li><a href="aboutus.php"><i class="fa fa-user"></i>About Us</a></li>';
      }
      ?>

      <li><a href="aboutus.php #contactus"><i class="fa fa-phone"></i>Contact Us</a></li>
    </ul>

    <?php
    if (isset($_SESSION['username']) || isset($_SESSION['logedin'])) {
      echo '<div class="user-profile">
      <img src="view/logo/user.png" alt="User Avatar" class="user-avatar">
      <span class="user-name">' . $_SESSION['username'] . '</span>
      <a href="logout.php" class="sign-button"><i class="fa fa-sign-out"></i>Logout</a>
    </div>';
    } else {
      echo '<a href="login.php" class="sign-button"><i class="fa fa-user"></i>Login</a>';
    }
    ?>
  </nav>
</header>