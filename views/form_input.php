<div class="attention_text">
    <p id="warningTitle" style="margin-top: 20px;"></p>
    <p id="warningBody"></p>

    <?php if ($indexPage) : ?>
        <p id="warningPassword"></p>
    <?php endif ?>

</div>
<div class="form_input">
    <form name="messageForm" action="/?controllers=<?= $indexPage ? "insert" : "edit" ?>_process" method="POST" class="confirmation_warning_area">
        <label for="title">Title</label><br>
        <input type="text" id="title" name="title" minlength="10" maxlength="32" required value="<?= $value = !$indexPage ? $result['title'] : '' ?>" />
        <br>
        <label for="body">Body</label><br>
        <input type="text" id="body" name="body" minlength="10" maxlength="200" class="input_body" autocomplete="off" required value="<?= $value = !$indexPage ? $result['body'] : '' ?>" />
        <br>

        <?php if ($indexPage) : ?>

            <label for="pass">Password</label><br>
            <input type="password" id="pass" name="pass" minlength="4" maxlength="4" pattern="\d{4}" />
            <br>
            <br>
            <input type="submit" onclick="validatorForm()" />

        <?php else : ?>

            <input type="hidden" name="currentPage" value="<?= $previous ?>" />
            <br>
            <br>
            <input type="submit" onclick="validatorForm()" style="height:50px auto; width:100px" />
            <button>
                <a href="<?= $previous ?>">Cancel</a>
            </button>

        <?php endif ?>

    </form>
</div>