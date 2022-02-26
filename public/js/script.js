function validatorForm() {
    let title_val = document.forms["messageForm"]["title"].value;
    let body_val = document.forms["messageForm"]["body"].value;
    let pass_val = document.forms["messageForm"]["pass"].value;

    let warning_title = "";
    let warning_body = "";
    let warning_password = "";

    if (title_val == "" || title_val.length < 10 || title_val.length > 32) {
        warning_title = "Your title must be 10 to 32 characters long";
    }

    if (body_val == "" || body_val.length < 10 || body_val.length > 200) {
        warning_body = "Your message must be 10 to 200 characters long";
    }

    if ((pass_val != "") && (pass_val.length != 4)){
        warning_password = "Your password must be 4 digit number";
    }

    document.getElementById("warningTitle").innerHTML = warning_title;
    document.getElementById("warningBody").innerHTML = warning_body;
    document.getElementById("warningPassword").innerHTML = warning_password;
}