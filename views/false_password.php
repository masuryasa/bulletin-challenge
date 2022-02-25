<?php $edit = $edit ? "edit" : "delete" ?>
<div class="attention_text">
    <p class="alert">The passwords you entered do not match. Please try again.</p>
</div>
<form method="POST" class="confirmation_warning_area">
    <p id="title_text"><?= $result['title'] ?></p>
    <p><?= $result['body'] ?></p>
    <p><?= $result['time'] ?></p>
    <label for="passwd">Pass</label>
    <input type="password" id="passwd" size="5" name="passwd" maxlength="4" required />
    <input type="hidden" name="currentPage" value="<?= $previous ?>">
    <button type="submit" name="idMessage" formaction="<?= $edit ?>_form.php" value="<?= $result["id_message"] ?>"><?= $edit ?></button>
</form>