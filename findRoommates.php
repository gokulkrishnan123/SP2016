<?php

echo "hello";
session_start();
require 'database.php';
$stmt = $mysqli->prepare("select genderToLiveWith, minAge, maxAge, clean, noise, people, smoke, drink, date, budget from SurveyAnswers");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
 
$stmt->execute();

$stmt->bind_result($genderToLiveWith, $minAge, $maxAge, $clean, $noise, $people, $smoke, $drink, $date, $budget);
 
echo "<ul>\n";
while($stmt->fetch()){
	printf("\t<li>%s %s %s %s %s %s %s %s %s %s</li>\n",	
		htmlspecialchars($genderToLiveWith),
		($minAge),
		($maxAge),
		($clean),
		($noise),
		htmlspecialchars($people),
		htmlspecialchars($smoke),
		htmlspecialchars($drink),
		htmlspecialchars($date),
		htmlspecialchars($budget)
	);
}
echo "</ul>\n";
 
$stmt->close();
?>
