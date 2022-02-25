<form method="POST" class="confirmation_warning_area">
    <div class="confirmation">
        <p id="title_text"><?= $result['title'] ?></p>
        <p><?= $result['body'] ?></p>
        <p><?= $result['time'] ?></p>
        <br>
    </div>
    <div class="confirmation_option">
        <p>Are you sure?</p>
        <input type="hidden" name="currentPage" value="<?= $previous ?>">
        <button type="submit" name="idMessage" formaction="delete_process.php" value="<?= $result["id_message"] ?>">Yes</button>
        <button>
            <a href="<?= BASEURL . $previous ?>">Cancel</a>
        </button>
    </div>
</form>