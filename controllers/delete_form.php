<?php
require_once "../models/Bulletin.php";

$bulletin = new Bulletin();

$password = $_REQUEST["passwd"];
$idMessage = $_REQUEST["id_message"];
$previous = "../public/" . $_REQUEST["current_page"];

$result = $bulletin->selectMessage($idMessage);
$edit = false;
?>

<!DOCTYPE html>
<html>

<head>
	<title>Bulletin Challenge</title>

	<link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
</head>

<body>
	<div class="container">

		<?php
		if (!$result['pass']) :
			require_once "../views/no_password.php";
		elseif (md5($password) === $result['pass']) :
			require_once "../views/delete_confirmation.php";
		else :
			require_once "../views/false_password.php";
		endif ?>

	</div>
	<script src="<?= BASEURL; ?>/js/script.js"></script>
</body>

</html>