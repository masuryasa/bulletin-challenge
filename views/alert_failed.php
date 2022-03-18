<div class="container remove-bg">
    <div class="alert alert-danger" role="alert">
        <?php $msg = $action == DLT ?: ($action == EDT ?: "save"); ?>
        <?= "Failed to " . $msg . " message!" ?>
        <?= $failed_msg ?: null ?>
    </div>
</div>

<?php
$action == DLT ? header("refresh:2; url=" . $_REQUEST["currentPage"]) : ($action == EDT ? header("refresh:2; url=" . $previous) : header("refresh:2; url=index.php"));
