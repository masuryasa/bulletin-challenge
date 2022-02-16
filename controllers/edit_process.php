<?php
require_once "../models/Bulletin.php";
require_once "../config/func_validation.php";

$bulletin = new Bulletin();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$idMessage = $_REQUEST["id_message"];
	$title = $_REQUEST["title"];
	$body = $_REQUEST["body"];
	$prevPage = $_REQUEST["current_page"];

	if (title_length_validation($title) && body_length_validation($body)) {
		$title = input_data_validation($title);
		$body = input_data_validation($body);

		if ($bulletin->updateMessage($idMessage, $title, $body)) {
			header("Location: " . $prevPage);
		} else {
			header("Location: " . $prevPage);
		}
	} else {
		header("Location: " . $prevPage);
	}
}
