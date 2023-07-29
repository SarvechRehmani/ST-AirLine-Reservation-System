<?php
$contactMessage = false;
$contactMessageError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include("view/connection.php");
  $name = trim($_POST['name']);
  $email = trim($_POST['email']);
  $message = trim($_POST['message']);
  
  if (empty($name)) {
    $contactMessageError = " Name Can not be blank.!";
  } else {
    if (empty($email)) {
      $contactMessageError = " Email Can not be blank.!";
    } else {
      if (empty($message)) {
        $contactMessageError = " Please Enter Message.!";
      } else {
        $sql = "insert into contactTbl (name, email, message) VALUES ('$name' , '$email' , '$message')";
        $stmt = mysqli_query($con, $sql);
        if ($stmt) {
          $contactMessage = "Your Request has been recorded.!";
        }
      }
    }
  }
}
?>
<title>About- ST Awesome Airline</title>
<link rel="stylesheet" href="css/about.css">

<body>
  <?php
  include('view/header.php');
  ?>
  <section class="hero-section">
    <div class="hero-content">
      <h1>About the ST Awesome Airline.</h1>
      <p>At ST Awesome Airline, we are committed to providing you with the best travel experience.<br> Our airline
        reservation system is designed to make your booking process easy, convenient, and reliable.<br> Whether you are
        planning a business trip, a family vacation, or a romantic getaway, we have you covered.</p>
      <a href="#contactus" class="cta-button">Contact Us</a>
    </div>
  </section>

  <section class="features-section">
    <h2>Our Story</h2>
    <div class="features-container">
      <div class="feature">
        <i class="fa fa-globe"></i>
        <h3>Vision</h3>
        <p>ST Awesome Airline aims to be the top choice for travelers worldwide, known for exceptional service, safety,
          and innovation. We strive to redefine the way people travel, setting new standards of excellence.</p>
      </div>
      <div class="feature">
        <i class="fa fa-users"></i>
        <h3>Mission</h3>
        <p>Our mission is to provide safe, reliable, and exceptional travel experiences. We aim to be a global leader in
          aviation, with a focus on sustainability, customer-centricity, and innovation. Join us for memorable journeys!
        </p>
      </div>
      <div class="feature">
        <i class="fa fa-certificate"></i>
        <h3>Values</h3>
        <p>Customer-centricity: We prioritize our customers and strive to understand and exceed their needs and
          expectations. We aim to provide personalized, friendly, and reliable service, building lasting relationships
          with our passengers.</p>
      </div>
    </div>
  </section>

  <section id="contactus">
    <section id="contact-section">
      <?php
      if ($contactMessage) {
      echo '<h3 style="background-color: green;">'. $contactMessage .'</h3>';
      } elseif ($contactMessageError) {
      echo '<h2 style="background-color: red;">Error !'. $contactMessageError .'</h2>';
      }
      ?>
      <h1>Contact Us</h1>
      <p>Please fill out the form below to get in touch with us.</p>
      <form class="contact-form" action="" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter Your Name" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter Your Email Address" required>
        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" placeholder="Enter Message" required></textarea>
        <input type="submit" value="Submit">
      </form>
    </section>
  </section>

  <?php
  include('view/footer.php');
  ?>

</body>