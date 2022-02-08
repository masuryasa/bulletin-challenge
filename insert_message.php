<?php
require_once "Database.php";

$database = new Database();
$mysqli = $database->mysqli;

if(!$database){
	die("ERROR: Could not connect the database. ". $database->connect_error);
}

$title = $_REQUEST["title"];
$body = $_REQUEST["body"];
$password = $_REQUEST["pass"];

if ($password != "") {
	if ($database->insertMessageWithPassword($title,$body,$password)) {
		header("Location: index.php");
		die();
	} else {
		echo "Failed to insert new message. Error: "
		. $mysqli->error;
	}
} else {	
	if ($database->insertMessageWithoutPassword($title,$body)) {
		header("Location: index.php");
		die();
	} else {
		echo "Failed to insert new message. Error: " .
			$mysqli->error;
	}
}
  
$mysqli->close();
?>