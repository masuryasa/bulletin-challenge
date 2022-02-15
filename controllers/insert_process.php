<?php
require_once "../Database.php";
require_once "../models/ModelBulletin.php";

$database = new Database();
$bulletin = new ModelBulletin($database);

$title = $_REQUEST["title"];
$body = $_REQUEST["body"];
$password = $_REQUEST["pass"];

if ($bulletin->insertMessage($title, $body, $password)) {
	header("Location: ../public/index.php");
	die();
}
