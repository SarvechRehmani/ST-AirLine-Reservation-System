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
    $sql = "select * from addflightTbl where status = ''";
    $Result = mysqli_query($con, $sql);
    ?>
    <section class="hero-section">
        <div class="hero-content">
            <h1>List Of Flights</h1>
            <table cellpadding="7px">
                <thead>
                    <th>#</th>
                    <th>Airlines</th>
                    <th>Origin</th>
                    <th>Destination</th>
                    <th>Departure</th>
                    <th>Arrival</th>
                    <th>Price For Economy</th>
                    <th>Price For Business</th>
                </thead>
                <tbody>

                    <?php $i=1; while ($row = mysqli_fetch_assoc($Result)) { ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['airlineName'] ?></td>
                            <td><?php echo $row['Origin'] ?></td>
                            <td><?php echo $row['Destination'] ?></td>
                            <td><?php echo $row['departureDate'] ?></td>
                            <td><?php echo $row['arrivalDate'] ?></td>
                            <td><?php echo $row['Price'] ?></td>
                            <td><?php echo $row['Price']+150 ?></td>
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