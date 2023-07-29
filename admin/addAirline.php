<?php
$error = false;
$success = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('../view/connection.php');
    $airlineName = trim($_POST['airlineName']);
    $seats = trim($_POST['seats']);

    if (empty($airlineName)) {
        $error = 'Please Enter Name of Airline';
    } else {
        $sql = "select * from airlineTbl where airlinename = '$airlineName'";
        $Result = mysqli_query($con, $sql);
        $num = mysqli_num_rows($Result);
        if ($num > 0) {
            $error = "This Airline Name is Already in List";
        } else {
            if (empty($seats)) {
                $error = 'Please Enter Number of Seats Available';
            } else {
                $sql = "insert into airlineTbl (AirlineName, seats) values ('$airlineName','$seats')";
                $Result = mysqli_query($con, $sql);
                if ($Result) {
                    $success = 'Airline Added.!';
                }
            }
        }
    }
}
?>
<head>
    <title>ADD AIRLINES</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        main {
            margin: 20px auto;
            /* Add auto margin to center the form */
            max-width: 600px;
            border: 1px solid yellow;
            border-radius: 5px;
            /* Add border to the form */
            background-color: #f7d418;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .form-row {
            display: flex;
            align-items: center;
            margin: 10px 0;
            width: 100%;
            color: black;
            font-size: 20px;
        }

        .form-row label {
            margin-right: 10px;
            font-weight: bold;
        }

        .form-row input[type="text"],
        .form-row input[type="number"],
        .form-row select {
            padding: 10px;
            font-size: 25px;
            width: 60px;
            border-style: solid;
            border-radius: 5px;
            margin-top: 5px;
            flex: 1;
        }
        button {
            padding: 15px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            margin-top: 20px;
            cursor: pointer;
            font-size: 20px;
            transition: 0.2s;
        }

        button:hover {
            background-color: #0062cc;
        }

        #formhead {
            font-size: 20px;
            color: black;
            font-weight: bold;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include('headerNav.php');
    ?>
    <?php
    if ($success) {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success ! </strong> ' . $success . '
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </button>
    </div> ';
        $success = false;
    }
    if ($error) {
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error ! </strong> ' . $error . '
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </button>
    </div> ';
        $success = false;
    }
    ?>
    <main>
        <form method="post">
            <div id="formhead">
                <h1>ADD AIRLINE</h1>
            </div>
            <div class="form-row">
                <label for="airlineName">Airline Name: </label>
                <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <input type="text" name="airlineName" placeholder="Enter Name of Airline" required>
            </div>
            <div class="form-row">
                <label for="seats">Number of Seats: </label>
                <input type="number" name="seats" placeholder="Enter Number of Seats" required>
            </div>
            <button type="submit"><i class="fa fa-plus text-white"></i> Add Airline</button>
        </form>
    </main>