<?php

session_start();

	require 'database.php';
	
	$_SESSION['fbloginid'] = $_GET['userID'];

	$fbloginid = $_SESSION['fbloginid'];
	
	$_SESSION['email'] = $_GET['email'];

	$email = $_GET['email'];
	
	$_SESSION['url'] = $_GET['url'];

	$url = $_GET['url'];
	
	$_SESSION['gender'] = $_GET['gender'];

	$gender = $_GET['gender'];
	
	$_SESSION['name'] = $_GET['name'];
	
	$name = $_GET['name'];
	
	
	$school = "WUSTL";
	
	$city = "St. Louis";

	$registration_data = $mysqli->prepare("INSERT INTO Users (Name, School, Gender, City, ID, url) VALUES (?,?,?,?,?,?)");
	
	if(!$registration_data){
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }
	
	 
	$registration_data-> bind_param('ssssss', $name, $school, $gender, $city, $fbloginid, $url);

	
	$registration_data->execute();
	$registration_data->close();

?>
<script>
window.close();
//window.location.href='varunprofile.php';
</script>
