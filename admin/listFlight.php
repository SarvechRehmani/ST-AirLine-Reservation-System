<?php
include('../view/connection.php');
$sql = "select * from addflightTbl";
$Result = mysqli_query($con, $sql);
?>

<html>

<head>
    <title>LIST FLIGHT</title>
    <style>
        #main-content table {
            width: 70%;
            margin: 0 auto;
            background-color: #333;
            border-style: solid;
            text-align: center;
        }

        #main-content table th {
            color: #fff;
            background-color: #333;
            text-transform: uppercase;
        }

        #main-content table th:last-child {
            width: 130px;
        }

        #main-content table td {
            background-color: #fff;
            font-size: 20px;
            font-weight: bold;
            padding: 0.75rem;
        }

        #main-content table td .edit {
            font-size: 18px;
            text-transform: uppercase;
            padding: 7px;
            color: #fff;
            background-color: #e67e22;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.2s;
        }

        #main-content table td .edit:hover {
            background-color: #a75c1a;

        }
    </style>
</head>

<body>
    <?php
    include('headerNav.php');
    ?>
    <div id="main-content">
        <table cellpadding="7px">
            <thead>
                <h1 align="center">List of Flight</h1>
                <th>#</th>
                <th>Departure</th>
                <th>Arrival</th>
                <th>Origin</th>
                <th>Destination</th>
                <th>Seats</th>
                <th>Price</th>
                <th>Airlines</th>
            </thead>
            <tbody>

                <?php while ($row = mysqli_fetch_assoc($Result)) { ?>
                    <tr>
                        <td><?php echo $row['flight_id'] ?></td>
                        <td><?php echo $row['departureDate'] ?></td>
                        <td><?php echo $row['arrivalDate'] ?></td>
                        <td><?php echo $row['Origin'] ?></td>
                        <td><?php echo $row['Destination'] ?></td>
                        <td><?php echo $row['seats'] ?></td>
                        <td><?php echo $row['Price'] ?></td>
                        <td><?php echo $row['airlineName'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>