<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>MY SCHOOL</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.min.css">
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container">
	<header>
	<nav> 
		<ul class="nav_links">
			<li> <a href=""> About</a></li>
			<li><a href="">Sign in</a></li>
			<li><a href="index.html">Home</a></li>
		</ul>
	</nav>
</header>
	</div>

<div class="container">
	<div class="jumbotron">
		<div class="row">
			<div class="col" style="text-align: center;">
				<h3>CREATE ACCOUNT</h3>
				<p class="alert alert-<?php   

					if (isset($_GET['registered'])) {
					echo $_SESSION['classTypeSuccess'];
					session_unset();
					session_destroy();
					
				}elseif (isset($_GET['notreg'])) {
					echo $_SESSION['classTypeError'];
					session_unset();
					session_destroy();
				}

				?>"> 


			</p>


				<?php
				if (isset($_GET['registered'])) {
					echo $_SESSION['userRegistered'];
					session_unset();
					session_destroy();
					
				}elseif (isset($_GET['notreg'])) {
					echo $_SESSION['notRegistered'];
					session_unset();
					session_destroy();
				}





				?>
				<hr style="margin-right: 26px; margin-left: 26px;">
				<form action="authentification/register.php" method="post">
					<div class="form-group">
						<input type="text" name="username" id=" username" class="form-control" placeholder="enter your username">
					</div>
					
					<div class="form-group">
						<input type="text" name="email" id=" email" class="form-control" placeholder="enter your email">
					</div>

					<div class="form-group">
						<input type="password" onkeyup="check();" name="password" id=" password" class="form-control" placeholder="enter your password">
					</div>

					<div class="form-group">
						<input type="password" onkeyup="check();" name="conpass" id=" conpass" class="form-control" placeholder="please confirm your password">
						<span id="message"></span>
					</div>

					<div class="row">
						<div class="col" style="text-align: center">
							<input type="submit" name=" save" id="save" class="btn btn-success btn-block" value="create account">
						</div>

						<div class="col" style="text-align: center;">
							<input type="reset" name=" reset" id="reset" class="btn btn-danger btn-block" value="reset details">
							
						</div>
						

					</div>
				</form>

			</div>
 
			<div class="col" style="text-align: center;">
				<h3>LOGIN</h3>
				<hr style="margin-right: 26px; margin-left: 26px;">
				<form action="authentfication/access.php" method="post">
					<div class="form-group">
						<input type="text" name="username" id=" username" class="form-control" placeholder="enter your username">
					</div>

					<div class="form-group">
						<input type="password" name="password" id=" password" class="form-control" placeholder="enter your password">
					</div>

					<div class="form-group">
						<input type="submit" name="login" id="login" class="btn btn-success btn-block" value="login ">
					</div>

					<div class="form-group" style="text-align: center">
						<p> Don't have an account? Create one </p>
						
					</div>
						

					</div>
				</form>
			</div>
			

		</div>
		

	</div> 
</div>

<script type="text/javascript">
		 function check(){
		 	if (document.getElementById("password").value === document.getElementById('conpass').value) {
                   
                   document.getElementById("message").style.color = "green";
                   document.getElementById("message").innerHTML = "passwords match";
                   document.getElementById("save").disabled = false; 
		 	} else {

                   document.getElementById("message").style.color = "red";
                   document.getElementById("message").innerHTML = "passwords do not match";
                   document.getElementById("save").disabled = true;
		 	}
		 }



	</script>


 

<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>