<?php

 include_once("config.php");
$conn = mysqli_connect(
    $DB['host'],
    $DB['login'],
    $DB['password'],
    $DB['name'],
);
	if(!$conn){
		die("Error: Cannot connect to the database");
	}
?>