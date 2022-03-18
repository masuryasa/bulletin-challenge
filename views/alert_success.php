<div class="container remove-bg">
    <div class="alert alert-success" role="alert">
        <?php $msg = $action == DLT ? "successfully deleted" : ($action == EDT ? "successfully edited" : "saved successfully"); ?>
        <?= "Your message <b>" . $msg . "</b>!" ?>
    </div>
</div>

<?php
$action == DLT ? header("refresh:2; url=" . $_REQUEST["currentPage"]) : ($action == EDT ? header("refresh:2; url=" . $previous) : header("refresh:2; url=index.php"));
