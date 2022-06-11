<?php

include 'db.php';
// Start the session
session_start();


$target_dir = "assets/images/post/";
$target_file = $target_dir . basename($_FILES["post_file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["postBtn"])) {
	$check = getimagesize($_FILES["post_file"]["tmp_name"]);
	if($check !== false) {
	    echo "File is an image - " . $check["mime"] . ".";
	    $uploadOk = 1;

	    $counter_variable = 1;
	    while(file_exists($target_file))
	    {
	    	$target_file = $target_dir.str_replace(".".$imageFileType, "", $_FILES['post_file']['name']).strval($counter_variable).".".$imageFileType;
	    	$counter_variable = $counter_variable + 1;
	    }

	} else {
	    echo "File is not an image.";
	    $uploadOk = 0;
	}


	if ($uploadOk == 0) {
	  echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	  if (move_uploaded_file($_FILES["post_file"]["tmp_name"], $target_file)) {

	  	$name = $_POST['user-name'];

	  	if ($_POST['user-gender'] == 0){
	  		$profile = "user-sm/guy.png";
	  	}
	  	else{
	  		$profile = "user-sm/lady.png";
	  	}

	  	date_default_timezone_set("Asia/Kolkata");
	  	$stat = date("Y-m-d h:i:sa");

	  	$sql = "INSERT INTO post (name, profile_pic, post_pic, status, user_id) VALUES ('$name', '$profile', '$target_file', '$stat', $_SESSION['userid'])";

	  	$conn->query($sql);

	  	header("location:index.php");

	    // echo "The file ". htmlspecialchars( basename( $_FILES["post_file"]["name"])). " has been uploaded.";
	  } else {
	    echo "Sorry, there was an error uploading your file.";

	    header("location:index.php");
	  }
	}

}


?>