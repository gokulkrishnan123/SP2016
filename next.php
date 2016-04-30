<?php
session_start();
echo "here";
echo $_SESSION['matchSet'];
echo sizeof($_SESSION['matches']);
$val=floor(sizeof($_SESSION['matches'])/3);
echo "val";
echo $val;

if ($_SESSION['matchSet']  < 2)
{
//	echo "3";
	echo "inloop";
	$_SESSION['matchSet'] = $_SESSION['matchSet']+3;
	echo $_SESSION['matchSet'];
	echo "inside next button, incrementing match set";
}


header("Location: matches.php");
?>
