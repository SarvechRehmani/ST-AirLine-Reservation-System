<?php
			session_start();
			?>
<style>
	body {
		margin: 0;
		font-family: Arial, sans-serif;
	}

	header {
		background-color: #007bff;
		color: #fff;
		display: flex;
		justify-content: space-between;
		align-items: center;
		padding: 15px;
		align-items: baseline;

	}

	header h1 {
		margin: 0;
	}

	nav ul {
		list-style: none;
		margin: 0;
		padding: 0;
		display: flex;
	}

	nav li {
		margin: 0 10px;
		position: relative;
	}

	nav a {
		color: #fff;
		text-decoration: none;
		padding: 10px;
		transition: 0.2s;
	}

	nav a:hover {
		background-color: #f7d418;
		color: #000;
		border-radius: 5px;
	}

	.sign-button {
		background-color: #f7d418;
		font-size: 16px;
		color: #000;
		border-radius: 3px;
		padding: 10px;
		transition: 0.2s;
	}

	.sign-button:hover {
		background-color: #dcb10e;
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
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<header>
	<h1>Admin Panel</h1>
	<nav>
		<ul>
			<?php
			if (isset($_SESSION['adminId']) || isset($_SESSION['adminlogin'])) {
				echo '
			<li><a href="dashboard.php">Dashboard</a></li>
			<li><a href="addFlight.php">Add Flight</a></li>
			<li><a href="listFlight.php">List Flight</a></li>
			<li><a href="manageAirline.php">Manage Airline</a></li>
			<li><a href="addAirline.php" class="sign-button"><i class="fa fa-plus"></i> Airlines</a></li>
			<li>
				<div class="user-profile">
					<img src="user.png" alt="User Avatar" class="user-avatar">
					<span class="user-name"> ' . $_SESSION['adminId'] . ' </span>
					<a href="adminLogout.php" class="sign-button"><i class="fa fa-sign-out"></i>Logout</a>
				</div>
			</li>';
			} else {
				echo '<a href="adminlogin.php" class="sign-button"><i class="fa fa-sign-in"></i>Login</a>';
			}
			?>
		</ul>
	</nav>
</header>