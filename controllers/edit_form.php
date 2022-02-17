<?php
require_once "../models/Bulletin.php";

$bulletin = new Bulletin();

$password = $_REQUEST["passwd"];
$idMessage = $_REQUEST["id_message"];
$previous = "../public/" . $_REQUEST["current_page"];

$result = $bulletin->selectMessage($idMessage);

$edit = true;
$indexPage = false;
?>

<?php require_once "../views/templates/header.php"  ?>

<body>
	<div class="container">

		<?php
		if (!$result['pass']) :
			require_once "../views/no_password.php";
		elseif (md5($password) === $result['pass']) :
			require_once "../views/form_input.php";
		else :
			require_once "../views/false_password.php";
		endif
		?>

	</div>

	<?php require_once "../views/templates/footer.php"  ?>