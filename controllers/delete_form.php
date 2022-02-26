<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . "/bulletin/config/config.php";
	require_once MODELPATH . "Bulletin.php";

	$bulletin = new Bulletin();

	$password  = $_REQUEST['passwd'];
	$idMessage = $_REQUEST['idMessage'];
	$previous  = $_REQUEST['currentPage'];

	$result = $bulletin->selectMessage($idMessage);

	$edit = false;

	if (!$result['pass']) :
		$requireForm = "no_password";
	elseif (md5($password) === $result['pass']) :
		$requireForm = "delete_confirmation";
	else :
		$requireForm = "false_password";
	endif;
?>

<?php require_once VIEWPATH . "templates/header.php"  ?>

<div class="container">

	<?php require_once VIEWPATH . "$requireForm.php" ?>

</div>

<?php require_once VIEWPATH . "templates/footer.php"  ?>