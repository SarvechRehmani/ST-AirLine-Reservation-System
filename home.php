<!DOCTYPE html>
<html>

<head>
  <title>ST Awesome Airline</title>
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
  <?php
  include('view/header.php');
  ?>

  <section class="hero-section">
    <div class="hero-content">
      <h1>Welcome to ST Awesome Airline</h1>
      <p>Discover the world with us and experience the joy of flying.</p>
      <?PHP
      if (isset($_SESSION['username']) || isset($_SESSION['logedin'])) {
        echo '<a href="booking.php" class="cta-button">Book Now</a>';
      } else {
        echo '<a href="login.php" class="cta-button">Please Login to continue Now</a>';
      }
      ?>

    </div>
  </section>

  <section class="features-section">
    <h2>Why Choose Us?</h2>
    <div class="features-container">
      <div class="feature">
        <i class="fa fa-check"></i>
        <h3>Wide Range of Destinations</h3>
        <p>Explore a variety of destinations worldwide, from bustling cities to serene beaches.</p>
      </div>
      <div class="feature">
        <i class="fa fa-plane"></i>
        <h3>Modern Fleet</h3>
        <p>Travel in comfort and style with our modern and well-maintained aircraft.</p>
      </div>
      <div class="feature">
        <i class="fa fa-heart"></i>
        <h3>Exceptional Service</h3>
        <p>Our friendly and professional staff are dedicated to providing you with an exceptional travel experience.</p>
      </div>
    </div>
  </section>

  <section class="cta-section">
    <div class="cta-container">
      <h2>Ready to Book Your Next Adventure?</h2>
      <p>Don't miss out on the opportunity to explore new horizons. Book your flight with ST Awesome Airline now!</p>
      <a href="#" class="cta-button">Book Now</a>
    </div>
  </section>


  <?php
  include('view/footer.php');
  ?>

</body>

</html>