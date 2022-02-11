<?php
require_once "../Database.php";

$database = new Database();

$password = $_REQUEST["passwd"];
$idMessage = $_REQUEST["id_message"];
$previous = $_REQUEST["current_page"];

$result = $database->selectMessagesData($idMessage);
?>

<!DOCTYPE html>
<html>

<head>
	<title>Bulletin Challenge</title>

	<link rel="stylesheet" href="../bootstrap-4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<script src="../js/script.js"></script>
</head>

<body>
	<div class="container">

		<?php
		if (!$result['pass']) :
		?>
			<div class="attention_text">
				<p class="alert_text">This message can’t delete, because this message has not been set password.</p>
			</div>
			<p id="title_text"><?= $result['title'] ?></p>
			<p><?= $result['body'] ?></p>
			<p><?= $result['time'] ?></p>
			<div class="confirmation_option">
				<form method="POST" class="confirmation_warning_area">
					<button type="submit" formaction="../public/<?= $previous ?>">Back previous page</button>
				</form>
			</div>
		<?php
		elseif (md5($password) === $result['pass']) :
		?>
			<form method="POST" class="confirmation_warning_area">
				<div class="confirmation">
					<p id="title_text"><?= $result['title'] ?></p>
					<p><?= $result['body'] ?></p>
					<p><?= $result['time'] ?></p>
					<br>
				</div>
				<div class="confirmation_option">
					<p>Are you sure?</p>
					<button type="submit" name="id_message" formaction="delete_process.php" value="<?= $result["id_message"] ?>">Yes</button>
					<input type="hidden" name="current_page" value="../public/<?= $previous ?>">
					<button type="submit" formaction="../public/<?= $previous ?>">Cancel</button>
				</div>
			</form>
		<?php
		elseif (md5($password) != $result['pass']) :
		?>
			<div class="attention_text">
				<p class="alert_text">The passwords you entered do not match. Please try again.</p>
			</div>
			<form method="POST" class="confirmation_warning_area">
				<p id="title_text"><?= $result['title'] ?></p>
				<p><?= $result['body'] ?></p>
				<p><?= $result['time'] ?></p>
				<label for="passwd">Pass</label>
				<input type="password" id="passwd" name="passwd" size="5" maxlength="4" required />
				<input type="hidden" name="current_page" value="../public/<?= $previous ?>" />
				<button type="submit" name="id_message" formaction="delete_form.php" value="<?= $result["id_message"] ?>">Delete</button>
			</form>
		<?php
		endif;
		?>

	</div>
</body>

</html>