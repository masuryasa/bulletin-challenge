<?php

$bulletin = new Bulletin();

if ($bulletin->deleteMessage($_REQUEST["idMessage"])) {
	header("Location:" . $_REQUEST["currentPage"]);
}
