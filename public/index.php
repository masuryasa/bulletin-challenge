<?php
require_once "../models/Bulletin.php";

$bulletin = new Bulletin();

$currentPage = substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], "/") + 1);
$currentPageNum = substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], "=") + 1);

if ($currentPage === "" || $currentPage === "index.php") {
    header("Location: index.php?page=1");
}

$page = 10;
$urlPage = isset($_GET['page']) ? (int)$_GET["page"] : 1;
$start = ($urlPage > 1) ? ($urlPage * $page) - $page : 0;
$selectAllMessages = $bulletin->selectMessage();
$total = $selectAllMessages->num_rows;
$numPages = ceil($total / $page);
$arrResults = $bulletin->selectMessage(null, $start, $page);

$indexPage = true;
?>

<!DOCTYPE html>
<html>

<head>
    <title>Bulletin Challenge</title>

    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
</head>

<body onload="disEnaPaginationItem()">
    <div class="container">

        <?php require_once "../views/form_input.php";
        foreach ($arrResults as $result) : ?>
            <hr style="margin:30px 0;">
            <div class="data_messages">
                <p id="title_text"><?= $result['title'] ?></p>
                <p><?= $result['body'] ?></p>
                <p><?= $result['time'] ?></p>
                <form method="POST">
                    <label for="password">Pass</label>
                    <input type="password" id="password" name="passwd" size="5" maxlength="4">
                    <input type="hidden" name="current_page" value="<?= $currentPage ?>">
                    <button type="submit" name="id_message" formaction="../controllers/delete_form.php" value="<?= $result["id_message"] ?>">Delete</button>
                    <button type="submit" name="id_message" formaction="../controllers/edit_form.php" value="<?= $result["id_message"] ?>">Edit</button>
                </form>
            </div>
        <?php endforeach; ?>

        <hr style="margin:30px 0;">
    </div>
    <div class="paging-button">
        <ul class="pagination">
            <li class="page-item" id="previous-item">
                <a href="index.php?page=<?= $currentPageNum - 1 ?>" class="page-link" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <?php for ($i = 1; $i <= $numPages; $i++) : ?>
                <li class="page-item item-only">
                    <a href="?page=<?= $i; ?>" class="page-link"><?= $i; ?></a>
                </li>
            <?php endfor; ?>
            <li class="page-item" id="next-item">
                <a href="index.php?page=<?= $currentPageNum + 1 ?>" class="page-link" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
        </ul>
    </div>
    <script src="<?= BASEURL; ?>/js/script.js"></script>
</body>

</html>