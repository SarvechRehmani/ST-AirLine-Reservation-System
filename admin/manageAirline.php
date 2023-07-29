<?php
include('../view/connection.php');
$sql = "select * from airlinetbl";
$Result = mysqli_query($con, $sql);
?>
<html>

<head>
    <title>MANAGE AIRLINE</title>
    <style>
        #main-content table {
            width: 70%;
            margin: 0 auto;
            background-color: #333;
            border-style: solid;
            text-align: center !important;
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
        }

        #main-content table td .edit {
            font-size: 16px;
            text-transform: uppercase;
            padding: 7px;
            color: #fff;
            background-color: #e67e22;
            cursor: pointer;
            border: none;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.2s;
        }

        #main-content table td .Edit:hover {
            background-color: #a75c1a;

        }

        #main-content table td .Delete {
            font-size: 16px;
            text-transform: uppercase;
            padding: 7px;
            color: #fff;
            background-color: #e74c3c;
            cursor: pointer;
            border: none;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.2s;
        }

        #main-content table td .delete:hover {
            background-color: #a03226;
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
                <h1 align="center">Manage Flight</h1>
                <th>#</th>
                <th>Airlines Name</th>
                <th>Number of Seats</th>
                <th>Delete</th>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($Result)) {
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['AirlineName']; ?></td>
                        <td><?php echo $row['Seats']; ?></td>
                        <td>
                            <form action="action/delete.php" method="POST">
                                <input type="hidden" type="number" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="Delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>