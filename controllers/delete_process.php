<?php
session_start();

$bulletin = new Bulletin();
$action = DLT;

require_once VIEWPATH . "templates/header.php";

if ($bulletin->deleteMessage($_SESSION['idMessage'])) :
	require_once VIEWPATH . "alert_success.php";
else :
	require_once VIEWPATH . "alert_failed.php";
endif;

require_once VIEWPATH . "templates/footer.php";
