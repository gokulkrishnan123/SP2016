<?php

session_start();
require 'database.php';

$stmt = $mysqli->prepare("UPDATE Users SET isMatched=1, otherID=".$_SESSION['otherMatchID']." WHERE ID='".$_SESSION['fbloginid']."'");

$stmt1 = $mysqli->prepare("UPDATE Users SET isMatched=1, otherID=".$_SESSION['fbloginid']." WHERE ID='".$_SESSION['otherMatchID']."'");

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
