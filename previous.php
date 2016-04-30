<?php
session_start();

if ($_SESSION['matchSet'] - 3 >= 0)
{
	$_SESSION['matchSet']=$_SESSION['matchSet']-3;
}
header("Location: matches.php");
?>
