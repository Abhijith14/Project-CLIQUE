<?php

include 'db.php';

// Start the session
session_start();


if (isset($_POST['regBtn']))
{
	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['pass'];

	$sql = "INSERT INTO authentication (name, gender, email, password) VALUES ('$name', '$gender', '$email', '$password')";


	if ($conn->query($sql) === TRUE) {
	  
	  $_SESSION['loggedin'] = TRUE;
	  $_SESSION['userid'] = $conn->insert_id;

	}
	header("location:index.php");

}

if (isset($_POST['logBtn']))
{
	$email = $_POST['email'];
	$password = $_POST['pass'];


	$sql = "SELECT * FROM authentication WHERE email = '$email' AND password = '$password'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {

		 while($row = $result->fetch_assoc()) {

		 	$_SESSION['loggedin'] = TRUE;
		 	$_SESSION['userid'] = $row['id'];
		 }
		 	header("location:index.php");
	  }
	  else{
	  		header("location:login.php?alert=0");
	  }
	

}


if (isset($_GET['id']))
{
	$_SESSION['loggedin'] = FALSE;
	header("location:index.php");
}




?>