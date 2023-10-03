<?php
	require ("./db/conn.php");
	session_start();

	if(isset($_SESSION['uidorPhone'])){
		header('Location: user.php');
	}

	if (isset($_POST['uidorPhone']) && isset($_POST['password'])){
		$uidorPhone = stripslashes($_POST['uidorPhone']);
		$uidorPhone = mysqli_real_escape_string($conn,$uidorPhone); 
		$password = stripslashes($_POST['password']);
		$password = mysqli_real_escape_string($conn,$password);
		$password = $password;

		$query = "SELECT * FROM `users` WHERE password='$password' AND uid='$uidorPhone' OR phone='$uidorPhone'";
		$result = mysqli_query($conn, $query) or die(mysql_error());
		$rows = mysqli_num_rows($result);

		if ($rows == 1){
			$_SESSION['uidorPhone'] = $uidorPhone;

			header("Location: user.php");
		}
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>MTTB || Login</title>
	<link rel="shortcut icon" href="assets/favicon.png">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
		<!-- Bootstrap Link -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	
<div class="panel panel-primary">
      <div class="panel-heading">Metro Train Ticket Booking &nbsp;
	  <marquee width="70%" direction="left">
	  Public Notice : It has come to our notice that some unscrupulous elements are trying to mislead the candidates / public by spreading false details / information regarding the job opportunities in MTTB in the social media and local TV channels. Hence, it is brought to the notice of the candidates / public that the recruitment advertisements of MTTB are being published time through open advertisement only in newspaper and MTTB
		 </marquee>
</div>
      <div class="panel-body">

	  <div class="container">
  <div class="row">
    <div class="col-md">
	<div class="loader" id="loader">
		<div class="spinner-border text-success" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div>

	<div class="d-none" id="main">
		<nav id="navbar" class="navbar navbar-expand-lg navbar-dark">
			<div class="container">
				<a class="navbar-brand" href="login.php">User LogIn</a>
			</div>
		</nav>

		<div class="container my-2">
			<h1></h1>
		</div>

		<form action=<?php echo $_SERVER["PHP_SELF"]; ?> method="POST">
			<div class="container">
				<?php
				if(isset($result) && $rows == 0){
					echo "<div class='alert alert-danger' role='alert'>
									Sorry! You've entered invalid credentials.
								</div>";
				}
				?>
				<div class="input-group flex-nowrap my-4">
					<div class="input-group-prepend">
						<span class="input-group-text">🆔</span>
					</div>
					<input type="text" id="uidorPhone" name="uidorPhone" class="form-control" placeholder="UID or Phone" required>
				</div>
				<div class="input-group flex-nowrap my-4">
					<div class="input-group-prepend">
						<span class="input-group-text">🔒</span>
					</div>
					<input type="password" name="password" class="form-control" placeholder="Password" required>
				</div>
				<div class="mb-3">
					<p class="text-muted">Don't have a account yet. <a href="register.php">Register
							Now</a></p>
				</div>
				<button type="submit" name="submit" class="btn btn-success">Submit</button>
			</div>
		</form>
	</div>
      
    </div>
  </div>
</div>
</div>
</div>	 
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>