<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/bulletin/config/config.php";
require_once MODELPATH . "Bulletin.php";

$bulletin = new Bulletin();

if ($bulletin->deleteMessage($_REQUEST["idMessage"])) {
	header("Location:" . BASEURL . $_REQUEST["currentPage"]);
}
