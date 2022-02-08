<?php
require_once "Database.php";

$database = new Database();
$mysqli = $database->mysqli;

if(!$database){
	die("ERROR: Could not connect the database. ". $database->connect_error);
}
  
$idMessage = $_REQUEST["id_message"];
$title = $_REQUEST["title"];
$body = $_REQUEST["body"];
$previous = $_REQUEST["current_page"];
  
if($database->updateMessageData($idMessage,$title,$body)){
	header("Location:".$previous);
	die();
} else{
	echo "Failed to update the message. Error: " .
		$mysqli->error;
}
  
$mysqli->close();
?>