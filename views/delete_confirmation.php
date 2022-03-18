<form method="POST" class="confirmation_warning_area" action="/?controllers=delete_process">
    <div class="confirmation">
        <p id="title_text"><?= $result['title'] ?></p>
        <p id="body_text"><?= $result['body'] ?></p>
        <p><?= $result['time'] ?></p>
        <br>
    </div>
    <div class="confirmation_option">
        <p>Are you sure?</p>
        <input type="hidden" name="currentPage" value="<?= $previous ?>" />
        <button type="submit" name="idMessage">Yes</button>
        <button>
            <a href="<?= $previous ?>">Cancel</a>
        </button>
    </div>
</form>