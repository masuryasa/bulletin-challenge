<?php $edit = $edit ? "edit" : "delete" ?>
<div class="attention_text">
    <p class="alert">The passwords you entered do not match. Please try again.</p>
</div>
<form method="POST" class="confirmation_warning_area" action="/?controllers=<?= $edit ?>_form">
    <p id="title_text"><?= $result['title'] ?></p>
    <p id="body_text"><?= $result['body'] ?></p>
    <p><?= $result['time'] ?></p>
    <label for="passwd">Pass</label>
    <input type="password" id="passwd" size="5" name="passwd" maxlength="4" required />
    <input type="hidden" name="currentPage" value="<?= $previous ?>" />
    <button type="submit" name="idMessage"><?= ucfirst($edit) ?></button>
    <button>
        <a href="<?= $previous ?>">Back</a>
    </button>
</form>