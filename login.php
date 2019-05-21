<?php

//Starting/Resuming Session
session_start();

// Include database connection file
include_once('inc/connection.inc.php');

	mysqli_real_escape_string($db,$userName = $_POST['userName']);
	mysqli_real_escape_string($db,$password = $_POST['password']);

	//		AN SQL QUERY TO VERIFY USERNAME & PASSWORD MATCH DETAILS IN DB		HASHED
	$query = "SELECT password from tblLogin where userName = '$userName' ";
	$result =$db -> query ($query);
	$row = $result->fetch_array(MYSQLI_ASSOC);

if (password_verify($password,$row['password']))
	{
		$_SESSION['logged'] = 1;
		$_SESSION['firstName'] = $row['firstName'];
		$_SESSION['surname'] = $row['surname'];
		header("location:entrychoice.php");
	}

else
{
	echo "Username or password is incorrect";
}


?>