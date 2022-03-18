<?php
session_start();

$bulletin = new Bulletin();

if (!isset($_SESSION['idMessage'])) {
	$_SESSION['idMessage'] = $_REQUEST['idMessage'];
}
$password  = $_REQUEST['passwd'];
$previous  = $_REQUEST['currentPage'];

$result = $bulletin->selectMessage($_SESSION['idMessage']);

$edit      = true;
$indexPage = false;

if (!$result['pass']) :
	$requireForm = "no_password";
elseif (md5($password) === $result['pass']) :
	$requireForm = "form_input";
else :
	$requireForm = "false_password";
endif;
?>

<?php require_once VIEWPATH . "templates/header.php"  ?>

<div class="container">

	<?php require_once VIEWPATH . "$requireForm.php"; ?>

</div>

<?php require_once VIEWPATH . "templates/footer.php"  ?>