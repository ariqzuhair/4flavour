<?php

if (isset($_POST["submit"])) {
	
	
	$name = $_POST["name"];
	$email = $_POST["email"];
	$username = $_POST["uid"];
	$pwd = $_POST["pwd"];
	$pwdrepeat = $_POST["pwdrepeat"];
	
	require_once 'dbh_incl.php';
	require_once 'functions_incl.php';
	
	if (emptyInputSignup($name, $email, $username, $pwd, $pwdrepeat) !== false) {
		header("location: ../signup.php?error=emptyinput");
		exit();
	}
	
		if (invalidUid($username) !== false) {
		header("location: ../signup.php?error=invaliduid");
		exit();
	}
	
	if (invalidEmail($email) !== false) {
	header("location: ../signup.php?error=invalidemail");
	exit();
	}
	
	if (pwdMatch($pwd, $pwdrepeat) !== false) {
	header("location: ../signup.php?error=passworddontmatch");
	exit();
	}
	
	if (uidExists($conn, $username, $email) !== false) {
	header("location: ../signup.php?error=usernametaken");
	exit();
	}
	
	createUser($conn, $name, $email, $username, $pwd);
	
}

	else {
		header("location: ../index.php");
		exit();
	}