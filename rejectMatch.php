<?php

session_start();

require 'database.php';

$stmt2 = $mysqli->prepare("SELECT otherID FROM Users WHERE ID='".$_SESSION['fbloginid']."'");

$stmt2->execute();

$result = $stmt2->get_result();

$row = $result->fetch_assoc();

$otherID = $row["otherID"];

$stmt = $mysqli->prepare("UPDATE Users SET matchStatus=0,otherID=0, isMatched=0 WHERE ID='".$_SESSION['fbloginid']."'");

$stmt1 = $mysqli->prepare("UPDATE Users SET otherID=".$_SESSION['fbloginid'].", isMatched=0 WHERE ID='".$otherID."'");

if(!$stmt){
printf("Query Prep Failed: %s\n", $mysqli->error);
exit;
}


$stmt->execute();

if(!$stmt1){
printf("Query Prep Failed: %s\n", $mysqli->error);
exit;
}

$stmt1->execute();

$stmt->close();
$stmt1->close();
$stmt2->close();

$bigger=0;
$smaller=0;
if ($_SESSION['fbloginid']>$_SESSION['otherMatchID']) {

        $bigger=$_SESSION['fbloginid'];
        $smaller=$_SESSION['otherMatchID'];


}
if ($_SESSION['fbloginid']<$_SESSION['otherMatchID']) {

        $smaller=$_SESSION['fbloginid'];
        $bigger=$_SESSION['otherMatchID'];


}
$roomID=$smaller . '99999' . $bigger;
$newLocation='Location: ' . 'chatroom.php?roomID=' . $roomID;
echo $newLocation;
header($newLocation);


?>
