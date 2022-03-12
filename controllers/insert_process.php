<?php

$bulletin = new Bulletin();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$title = $_REQUEST['title'];
	$body = $_REQUEST['body'];
	$pass = $_REQUEST['pass'];

	if (title_length_validation($title) && body_length_validation($body)) {
		$title = input_data_validation($title);
		$body = input_data_validation($body);

		if (empty($pass)) {
			if ($bulletin->insertMessage($title, $body, $pass)) {
				header("Location: " . "index.php");
			}
		} else {
			if (pass_length_validation($pass)) {
				if ($bulletin->insertMessage($title, $body, $pass)) {
					header("Location: " . "index.php");
				}
			} else {
				header("Location: " . "index.php");
			}
		}
	}
}
