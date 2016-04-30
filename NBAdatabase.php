<?php

$mysqli = new mysqli('localhost', 'root', 'ruummate', 'NBA_demographics');

if ($mysqli->connect_errno)
{
        printf("Connection Failed: %s\n", $mysqli->connect_error);
}

?>




