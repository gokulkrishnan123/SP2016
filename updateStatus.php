<?php

echo "varun";
session_start();
require 'database.php';

echo $_SESSION['otherMatchID'];

$stmt = $mysqli->prepare("UPDATE Users SET matchStatus=1, otherID=".$_SESSION['otherMatchID']." WHERE ID='".$_SESSION['fbloginid']."'");

if(!$stmt){
printf("Query Prep Failed: %s\n", $mysqli->error);
exit;
}

$stmt->execute();

$stmt->close();
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
