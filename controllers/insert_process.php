<?php

$bulletin = new Bulletin();
$action = IST;

require_once VIEWPATH . "templates/header.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") :
	$title = $_REQUEST['title'];
	$body = $_REQUEST['body'];
	$pass = $_REQUEST['pass'];

	if (title_length_validation($title) && body_length_validation($body)) :
		$title = input_data_validation($title);
		$body = input_data_validation($body);

		if (empty($pass)) :
			if ($bulletin->insertMessage($title, $body, $pass)) :
				require_once VIEWPATH . "alert_success.php";
			else :
				require_once VIEWPATH . "alert_failed.php";
			endif;
		else :
			if (pass_length_validation($pass)) :
				if ($bulletin->insertMessage($title, $body, $pass)) :
					require_once VIEWPATH . "alert_success.php";
				else :
					require_once VIEWPATH . "alert_failed.php";
				endif;
			else :
				$failed_msg = WRONG_PASS;
				require_once VIEWPATH . "alert_failed.php";
			endif;
		endif;
	else :
		$failed_msg = TITLE_BODY_INVALID;
		require_once VIEWPATH . "alert_failed.php";
	endif;
else :
	require_once VIEWPATH . "alert_failed.php";
endif;

require_once VIEWPATH . "templates/footer.php";
