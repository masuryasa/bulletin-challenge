<?php
session_start();

$bulletin = new Bulletin();
$action = EDT;

require_once VIEWPATH . "templates/header.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") :
	$idMessage = $_SESSION['idMessage'];
	$title = $_REQUEST['title'];
	$body = $_REQUEST['body'];
	$previous = $_REQUEST['currentPage'];

	if (title_length_validation($title) && body_length_validation($body)) :
		$title = input_data_validation($title);
		$body = input_data_validation($body);

		if ($bulletin->updateMessage($idMessage, $title, $body)) :
			require_once VIEWPATH . "alert_success.php";
		else :
			require_once VIEWPATH . "alert_failed.php";
		endif;
	else :
		$failed_msg = TITLE_BODY_INVALID;
		require_once VIEWPATH . "alert_failed.php";
	endif;
else :
	require_once VIEWPATH . "alert_failed.php";
endif;

require_once VIEWPATH . "templates/footer.php";
