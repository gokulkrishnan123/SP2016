<?php

session_start();

	require 'database.php';

	

	$user_id = $_SESSION['fbloginid'];

	$move_in_date = 0;

	$genderToLiveWith = $_POST['otherGender'];
	
	$bio=$_POST['bio'];
	
	echo $bio;

	$minAge = $_POST['minAge'];

	$maxAge = $_POST['maxAge'];

	$clean = $_POST['cleanliness'];

	$roommateClean = $_POST['cleanliness2'];

	$cleanImportance = $_POST['cleanliness3'];

	$noise = $_POST['noise'];

	$roommateNoise = $_POST['noise2'];

	$noiseImportance = $_POST['noise3'];

	$people = $_POST['people'];

	$roommatePeople = $_POST['people2'];

	$peopleImportance = $_POST['people3'];

	$smoke = $_POST['smoker'];
	
	$roommateSmoke = $_POST['smoker2'];
	
	$smokeImportance = $_POST['smoker3'];
	
	$temperature = $_POST['temperature'];
	
	$roommateTemperature = $_POST['temperature2'];
	
	$temperatureImportance = $_POST['temperature3'];

	$pets = $_POST['pets'];
	
	$roommatePets = $_POST['pets2'];
	
	$petsImportance = $_POST['pets3'];
	
	$drink = $_POST['drink'];
	
	$roommateDrink = $_POST['drink2'];
	
	$drinkImportance = $_POST['drink3'];

	$date = $_POST['moveIn'];

	$budget = $_POST['budget'];



	$roommateScore = $cleanImportance + $noiseImportance + $peopleImportance + $smokeImportance + $temperatureImportance + $drinkImportance+$petsImportance;

	$score = 0;

//	echo $smoking;

//	echo $peopleOver;

//	echo $clean;		

	

	echo $user_id;



	$survey_data = $mysqli->prepare("INSERT INTO SurveyAnswers (genderToLiveWith, minAge, maxAge, clean, roommateClean, cleanImportance, noise, roommateNoise, noiseImportance, people, roommatePeople, peopleImportance, smoke, roommateSmoke, smokeImportance, drink, roommateDrink, drinkImportance, date, budget,userID,score, roommateScore, bio, pet, roommatePet, petImportance, temp, roommateTemp, tempImportance) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?, ?,?,?,?,?,?,?,?,?,?,?, ?, ?, ?,?,?,?)");

	 
	if(!$survey_data){

        printf("Query Prep Failed: %s\n", $mysqli->error);

        exit;

    }

	$survey_data-> bind_param('siiiiiiiiiiiiiiiiisisiisiiiiii', $genderToLiveWith, $minAge, $maxAge, $clean, $roommateClean, $cleanImportance, $noise, $roommateNoise, $noiseImportance, $people, $roommatePeople, $peopleImportance, $smoke, $roommateSmoke, $smokeImportance, $drink, $roommateDrink, $drinkImportance, $date, $budget, $user_id, $score, $roommateScore, $bio, $pets, $roommatePets, $petsImportance, $temperature, $roommateTemperature, $temperatureImportance);

	$survey_data->execute();

	$survey_data->close();

	header("Location: http://52.33.163.109/getMatches.php");	

?>
