<!DOCTYPE html>
<html>
    <head>
        <title>Bulletin Challenge</title>

        <link rel="stylesheet" href="bootstrap-4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
    </head>
    <body>
        <div class="container">
			
			<?php
			require_once "Database.php";

			$database = new Database();
            $mysqli = $database->mysqli;

			if(!$database){
				die("ERROR: Could not connect the database. ". $database->connect_error);
			}

			$password = $_REQUEST["passwd"];
			$idMessage = $_REQUEST["id_message"];
			$previous = $_REQUEST["current_page"];

			$arrResult = $database->selectMessageDataById($idMessage);

			if ($arrResult){
				foreach ($arrResult as $result){
					if (!$result['pass']) {
						echo '
							<div class="attention_text">
								<p class="alert_text">This message can’t delete, because this message has not been set password.</p>
							</div>
							<p id="title_text">'.$result['title'].'</p>
							<p>'.$result['body'].'</p>
							<p>'.$result['time'].'</p>
							<div class="confirmation_option">
								<form method="POST" class="confirmation_warning_area">
									<button type="submit" formaction="'.$previous.'">Back previous page</button>
								</form>
							</div>
								';
					}
					elseif (md5($password) === $result['pass']) {
						echo '
							<form method="POST" class="confirmation_warning_area">
								<div class="confirmation">
									<p id="title_text">'.$result['title'].'</p>
									<p>'.$result['body'].'</p>
									<p>'.$result['time'].'</p>
									<br>
								</div>
								<div class="confirmation_option">
									<p>Are you sure?</p>
									<button type="submit" name="id_message" formaction="delete_message.php" value="'.$result["id_message"].'">Yes</button>
									<input type="hidden" name="current_page" value="'.$previous.'">
									<button type="submit" formaction="'.$previous.'">Cancel</button>
								</div>
							</form>
							';
					}
					elseif (md5($password) != $result['pass']) {
						echo '
							<div class="attention_text">
								<p class="alert_text">The passwords you entered do not match. Please try again.</p>
							</div>
							<form method="POST" class="confirmation_warning_area">
								<p id="title_text">'.$result['title'].'</p>
								<p>'.$result['body'].'</p>
								<p>'.$result['time'].'</p>
								<label for="passwd">Pass</label>
								<input type="password" id="passwd" name="passwd" size="5" maxlength="4" required>
								<input type="hidden" name="current_page" value="'.$previous.'">
								<button type="submit" name="id_message" formaction="delete_form.php" value="'.$result["id_message"].'">Delete</button>
							</form>
						';
					}
				}
			}
			
			$mysqli->close();
			?>
			
        </div>
    </body>
</html>