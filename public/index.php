<?php
require_once "../Database.php";
require_once "../models/Bulletin.php";

$database = new Database();
$bulletin = new Bulletin($database);

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
$arrResults = $bulletin->selectMessageByLimit($start, $page);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Bulletin Challenge</title>

    <link rel="stylesheet" href="../bootstrap-4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/script.js"></script>
</head>

<body onload="disEnaPaginationItem()">
    <div class="container">
        <div class="attention_text">
            <p id="warningTitle" style="margin-top: 20px;"></p>
            <p id="warningBody"></p>
            <p id="warningPassword"></p>
        </div>
        <div class="form_input">
            <form name="messageForm" action="../controllers/insert_process.php" method="POST">
                <label for="title">Title</label><br>
                <input type="text" id="title" name="title" minlength="10" maxlength="32" required>
                <br>
                <label for="body">Body</label><br>
                <input type="text" id="body" name="body" minlength="10" maxlength="200" class="input_body" required>
                <br>
                <label for="pass">Password</label><br>
                <input type="password" id="pass" name="pass" minlength="4" maxlength="4">
                <br>
                <br>
                <input type="submit" onclick="validatorForm()">
            </form>
        </div>

        <?php foreach ($arrResults as $result) : ?>
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
</body>

</html>