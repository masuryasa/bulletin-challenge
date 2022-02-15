<?php
require_once "../Database.php";
require_once "../models/ModelBulletin.php";

$database = new Database();
$bulletin = new ModelBulletin($database);

$idMessage = $_REQUEST["id_message"];
$title = $_REQUEST["title"];
$body = $_REQUEST["body"];
$previous = $_REQUEST["current_page"];

if ($bulletin->updateMessage($idMessage, $title, $body)) {
	header("Location:" . $previous);
	die();
}
