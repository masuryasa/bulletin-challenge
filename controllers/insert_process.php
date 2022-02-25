<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/bulletin/config/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/bulletin/config/func_validation.php";
require_once MODELPATH . "Bulletin.php";

$bulletin = new Bulletin();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$title = $_REQUEST['title'];
	$body = $_REQUEST['body'];
	$pass = $_REQUEST['pass'];

	if (title_length_validation($title) && body_length_validation($body)) {
		$title = input_data_validation($title);
		$body = input_data_validation($body);

		if (!empty($pass)) {
			$pass = pass_length_validation($pass);
		}

		if ($bulletin->insertMessage($title, $body, $pass)) {
			header("Location: " . BASEURL . "index.php");
		} else {
			header("Location: " . BASEURL . "index.php");
		}
	} else {
		header("Location: " . BASEURL . "index.php");
	}
}
