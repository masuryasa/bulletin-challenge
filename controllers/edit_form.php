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

	<link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
</head>

<body>
	<div class="container">

		<?php
		if (!$result['pass']) :
		?>
			<div class="attention_text">
				<p class="alert">This message can’t edit, because this message has not been set password.</p>
			</div>
			<p><?= $result['title'] ?></p>
			<p><?= $result['body'] ?></p>
			<p><?= $result['time'] ?></p>
			<form method="POST" class="confirmation_warning_area">
				<button type="submit" formaction="../public/<?= $previous ?>">Back previous page</button>
			</form>
		<?php
		elseif (md5($password) === $result['pass']) :
		?>
			<div class="attention_text">
				<p style="margin-top: 20px;">Your title must be 10 to 32 characters long</p>
				<p>Your message must be 10 to 200 characters long</p>
			</div>
			<div class="form_input">
				<form action="edit_process.php" name="messageForm" method="POST" class="confirmation_warning_area">
					<label for="title">Title</label><br>
					<input type="text" id="title" name="title" minlength="10" maxlength="32" required value="<?= $result['title'] ?>">
					<br>
					<label for="body">Body</label><br>
					<input type="text" class="input_body" id="body" name="body" minlength="10" maxlength="200" required value="<?= $result['body'] ?>">
					<br>
					<br>
					<button type="submit" name="id_message" formaction="edit_process.php" value="<?= $result["id_message"] ?>">Submit</button>
					<input type="hidden" name="current_page" value="../public/<?= $previous ?>">
					<button type="submit" formaction="../public/<?= $previous ?>">Cancel</button>
				</form>
			</div>
		<?php
		elseif (md5($password) != $result['pass']) :
		?>
			<div class="attention_text">
				<p class="alert">The passwords you entered do not match. Please try again.</p>
			</div>
			<form method="POST" class="confirmation_warning_area">
				<p><?= $result['title'] ?></p>
				<p><?= $result['body'] ?></p>
				<p><?= $result['time'] ?></p>
				<label for="passwd">Pass</label>
				<input type="password" id="passwd" size="5" name="passwd" maxlength="4" required />
				<input type="hidden" name="current_page" value="../public/<?= $previous ?>">
				<button type="submit" name="id_message" formaction="edit_form.php" value="<?= $result["id_message"] ?>">Edit</button>
			</form>
		<?php
		endif;
		?>
	</div>
	<script src="<?= BASEURL; ?>/js/script.js"></script>
</body>

</html>