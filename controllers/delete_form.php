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
		?>

		<?php elseif (md5($password) === $result['pass']) : ?>
			<form method="POST" class="confirmation_warning_area">
				<div class="confirmation">
					<p id="title_text"><?= $result['title'] ?></p>
					<p><?= $result['body'] ?></p>
					<p><?= $result['time'] ?></p>
					<br>
				</div>
				<div class="confirmation_option">
					<p>Are you sure?</p>
					<input type="hidden" name="current_page" value="<?= $previous ?>">
					<button type="submit" name="id_message" formaction="delete_process.php" value="<?= $result["id_message"] ?>">Yes</button>
					<button>
						<a href="<?= $previous ?>">Cancel</a>
					</button>
				</div>
			</form>
		<?php else :
			require_once "../views/false_password.php";
		endif ?>

	</div>
	<script src="<?= BASEURL; ?>/js/script.js"></script>
</body>

</html>