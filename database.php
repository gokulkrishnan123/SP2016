
<?php

$mysqli = new mysqli('localhost', 'root', 'ruummate', 'roommate');

if ($mysqli->connect_errno)
{
	printf("Connection Failed: %s\n", $mysqli->connect_error);
}

?>
