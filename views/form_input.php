<div class="attention_text">
    <p id="warningTitle" style="margin-top: 20px;"></p>
    <p id="warningBody"></p>
    <?php
    $action = "../controllers/";
    $valueTitle = $valueBody = "";
    if ($indexPage) :
        $action .= "insert_process";
    ?>
        <p id="warningPassword"></p>
    <?php
    else :
        $action .= "edit_process";
        $valueTitle = "value=" . $result['title'];
        $valueBody = "value=" . $result['body'];
    endif
    ?>
</div>
<div class="form_input">
    <form name="messageForm" action="<?= $action; ?>.php" method="POST" class="confirmation_warning_area">
        <label for="title">Title</label><br>
        <input type="text" id="title" name="title" minlength="10" maxlength="32" required <?= $valueTitle; ?>>
        <br>
        <label for="body">Body</label><br>
        <input type="text" id="body" name="body" minlength="10" maxlength="200" class="input_body" required <?= $valueBody; ?>>
        <br>
        <?php if ($indexPage) : ?>
            <label for="pass">Password</label><br>
            <input type="password" id="pass" name="pass" minlength="4" maxlength="4">
            <br>
            <br>
            <input type="submit" onclick="validatorForm()">
        <?php else : ?>
            <input type="hidden" name="current_page" value="<?= $previous ?>">
            <input type="hidden" name="id_message" value="<?= $result["id_message"] ?>">
            <br>
            <br>
            <input type="submit" onclick="validatorForm()" style="height:50px auto; width:100px">
            <!-- <input type="submit" style="height:50px auto; width:100px" onclick="validatorForm()"> -->
            <button>
                <a href="<?= $previous ?>">Cancel</a>
            </button>
        <?php endif ?>
    </form>
</div>