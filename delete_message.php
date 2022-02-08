<?php
require_once "Database.php";

$database = new Database();
$mysqli = $database->mysqli;

if(!$database){
	die("ERROR: Could not connect the database. ". $database->connect_error);
}
  
$idMessage = $_REQUEST["id_message"];
$previous = $_REQUEST["current_page"];
  
if ($database->deleteMessageData($idMessage)){
	header("Location:".$previous);
	die();
} else {
	echo "Failed to delete message. Error: " .
		$mysqli->error;
}

$mysqli->close();
?>