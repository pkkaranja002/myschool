<?php
session_start();
include '../connection.php';
//variables to store user input
$usernames = $email = $password = $encrypted_pass = "";
$usernameErr = $emailErr = $passwwordErr = "";

$_SESSION['userRegistered'] = "registered successfully!";
$_SESSION['notRegistered'] = "registered was not successful!";
$_SESSION['classTypeSuccess'] = "success";
$_SESSION['classTypeError'] = "danger";
//capture user input
if (isset($_POST['save'])){


	if (empty($_POST)){

		$usernameErr = 'username is required';

	}else{
		$usernames = $_POST['username'];
	}


	if (empty($_POST)){

		$emailErr = 'email is required';

	}else{
		$email = $_POST['email'];
	}

	if (empty($_POST)){

		$passwwordErr = 'password is required';

	}else{
		$password = $_POST['password'];
		$encrypted_pass = md5($password);
	}



if (empty($usernameErr) && empty($emailErr) && empty($passwwordErr)) {

	$stmt = $conn->prepare("INSERT INTO users( username, email,password) VALUES(?,?,?)");
	$stmt ->bind_param("sss",$usernames,$email, $password);

	if ($stmt->execute() === TRUE) {
		 _SESSION['userRegistered'];
		 _SESSION['classTypeSuccess'];
		 header('location:../landing.php?registered=true');
	}else{
		_SESSION['notRegistered'];
		 _SESSION['classTypeError'];
		 header('location:../landing.php?notreg=false');

	}

}


}





?>