<?php $edit = $edit ? "edit" : "delete" ?>
<div class="attention_text">
    <p class="alert">This message can’t <?= $edit; ?>, because this message has not been set password.</p>
</div>
<p id="title_text"><?= $result['title'] ?></p>
<p><?= $result['body'] ?></p>
<p><?= $result['time'] ?></p>
<div class="confirmation_option">
    <div class="confirmation_warning_area">
        <button>
            <a href="<?= $previous ?>">Back previous page</a>
        </button>
    </div>
</div>