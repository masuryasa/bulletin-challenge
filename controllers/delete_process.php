<?php
require_once "../Database.php";
require_once "../models/ModelBulletin.php";

$database = new Database();
$bulletin = new ModelBulletin($database);

$idMessage = $_REQUEST["id_message"];
$previous = $_REQUEST["current_page"];

if ($bulletin->deleteMessage($idMessage)) {
	header("Location:" . $previous);
	die();
}
