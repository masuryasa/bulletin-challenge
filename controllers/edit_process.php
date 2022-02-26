<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . "/bulletin/config/config.php";
	require_once $_SERVER['DOCUMENT_ROOT'] . "/bulletin/config/func_validation.php";
	require_once MODELPATH . "Bulletin.php";

	$bulletin = new Bulletin();

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$idMessage = $_REQUEST['idMessage'];
		$title = $_REQUEST['title'];
		$body = $_REQUEST['body'];
		$previous = $_REQUEST['currentPage'];

		if (title_length_validation($title) && body_length_validation($body)) {
			$title = input_data_validation($title);
			$body = input_data_validation($body);

			if ($bulletin->updateMessage($idMessage, $title, $body)) {
				header("Location: " . BASEURL . $previous);
			} else {
				header("Location: " . BASEURL . $previous);
			}
		} else {
			header("Location: " . BASEURL . $previous);
		}
	}
