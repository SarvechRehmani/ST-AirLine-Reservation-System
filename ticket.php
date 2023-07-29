<!DOCTYPE html>
<html>

<head>
    <title>Schedule - ST Awesome Airline</title>
    <link rel="stylesheet" href="css/schedule.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <?php
    include('view/header.php');
    include('view/connection.php');
    $userid = $_SESSION['userid'];
    $sql = "select * from passangerTbl where u_id = '$userid'";
    $Result = mysqli_query($con, $sql);

    ?>

    <section class="hero-section">
        <div class="hero-content">
            <h1>List Of Flights</h1>
            <table cellpadding="7px">
                <thead>
                    <th>Passanger #</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date Of Birth</th>
                    <th>Phone</th>
                    <th>Airline</th>
                    <th>Price</th>
                </thead>
                <tbody>

                    <?php $i = 1;
                    while ($row = mysqli_fetch_assoc($Result)) { ?>
                        <tr>
                            <td><?php echo  $row['passanger_id']; ?></td>
                            <td><?php echo $row['fname'] ?></td>
                            <td><?php echo $row['lname'] ?></td>
                            <td><?php echo $row['dob'] ?></td>
                            <td><?php echo $row['phone'] ?></td>
                            <td><?php echo $row['airlineName'] ?></td>
                            <td><?php echo $row['price'] ?></td>
                          
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </section>
    <?php
    include('view/footer.php');
    ?>

</body>

</html>