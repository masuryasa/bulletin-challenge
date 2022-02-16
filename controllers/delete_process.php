<?php
require_once "../models/Bulletin.php";

$bulletin = new Bulletin();

if ($bulletin->deleteMessage($_REQUEST["id_message"])) {
	header("Location:" . $_REQUEST["current_page"]);
}
