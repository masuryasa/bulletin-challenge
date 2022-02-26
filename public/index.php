<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . "/bulletin/config/config.php";
	require_once MODELPATH . "Bulletin.php";

	$bulletin = new Bulletin();

	$currentPage    = substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], "/") + 1);
	$currentPageNum = substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], "=") + 1);

	($currentPage === "" || $currentPage === "index.php") ? header("Location: index.php?page=1") : '';

	$indexPage = true;

	$limit      = 10;
	$total      = $bulletin->selectMessage(null, true);
	$numPages   = ceil($total['total'] / $limit);
	$urlPage    = isset($_GET['page']) ? (($_GET['page'] < 1) || ($_GET['page'] > $numPages) ? header("Location: ?page=1") : (int)$_GET['page']) : 1;
	$start      = ($urlPage > 1) ? ($urlPage * $limit) - $limit : 0;
	$arrResults = $bulletin->selectMessage(null, null, $start, $limit);

	if ($numPages > 5) {
		$neighborPageNum = array();

		for ($i = 1; $i <= $numPages; $i++) {

			if (($currentPageNum - 2 > $i) || ($currentPageNum + 2 < $i)) {
				array_push($neighborPageNum, $i);
			}

			if ($currentPageNum <= 2 && $numPages == $i) {
				array_shift($neighborPageNum);
				if ($currentPageNum == 1 && $numPages == $i)
					array_shift($neighborPageNum);
			} else if ($currentPageNum >= $numPages - 1 && $numPages == $i) {
				array_pop($neighborPageNum);
				if ($currentPageNum == $numPages && $numPages == $i)
					array_pop($neighborPageNum);
			}
		}
	}
?>

<?php require_once VIEWPATH . "templates/header.php"  ?>

<div class="container">

    <?php require_once VIEWPATH . "form_input.php" ?>
    <?php foreach ($arrResults as $result) : ?>
        <hr style="margin: 30px 0;">
        <div class="data_messages">
            <p id="title_text"><?= $result['title'] ?></p>
            <p><?= $result['body'] ?></p>
            <p><?= $result['time'] ?></p>
            <form method="POST">
                <label for="password">Pass</label>
                <input type="password" id="password" name="passwd" size="5" maxlength="4">
                <input type="hidden" name="currentPage" value="<?= $currentPage ?>">
                <button type="submit" name="idMessage" formaction=<?= CONTROLLERURL . "delete_form.php" ?> value="<?= $result['id_message'] ?>">Delete</button>
                <button type="submit" name="idMessage" formaction=<?= CONTROLLERURL . "edit_form.php" ?> value="<?= $result['id_message'] ?>">Edit</button>
            </form>
        </div>
    <?php endforeach ?>

    <hr style="margin: 30px 0;">
</div>
<div class="paging-button">
    <ul class="pagination">
        <li class="page-item" id="previous-item">
            <a href="<?= $currentPageNum > 1 ? "?page=" . ($currentPageNum - 1) : "javascript:void(0);" ?>" class="page-link" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        <?php for ($i = 1; $i <= $numPages; $i++) : ?>
            <?php if (!in_array($i, $neighborPageNum)) : ?>
                <li class="page-item item-only<?= ($i == $currentPageNum) ? " active" : "" ?>">
                    <a href="<?= ($i == $currentPageNum) ? "javascript:void(0);" : "?page=" . ($i) ?>" class="page-link"><?= $i ?></a>
                </li>
            <?php endif ?>
        <?php endfor ?>
        <li class="page-item" id="next-item">
            <a href="<?= $currentPageNum < $numPages ? "?page=" . ($currentPageNum + 1) : "javascript:void(0);" ?>" class="page-link" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</div>

<?php require_once VIEWPATH . "templates/footer.php"  ?>