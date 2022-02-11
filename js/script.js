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

function disEnaPaginationItem() {
    let page_items = document.getElementsByClassName("page-item");
    let page_total = page_items.length - 2;
    let prevItem = document.getElementById("previous-item");
    let nextItem = document.getElementById("next-item");

    let search_url = window.location.search;
    let full_url = window.location.href;
    let split_url = search_url.split("=")
    let current_page_num = parseInt(split_url[1]);
    let anchor_current_page = page_items[current_page_num];
    
    if (current_page_num === 1 || full_url == "http://localhost/bulletin/index.php") {
        prevItem.style.display = 'none';
    }
    else if (current_page_num === page_total) {
        nextItem.style.display = 'none';
    }

    if (page_total > 5) {
        const neighbor_page_num = []
        
        for (let i = 1; i <= page_total; i++) {
            
            if ((current_page_num-2 > i) || (current_page_num+2 < i)) {
                neighbor_page_num.push(i);
            }

            if (current_page_num == 1 && page_total == i) {
                neighbor_page_num.shift();
                neighbor_page_num.shift();
            }
            else if (current_page_num == 2 && page_total == i) {
                neighbor_page_num.shift();
            }
            else if (current_page_num == page_total && page_total == i) {
                neighbor_page_num.pop();
                neighbor_page_num.pop();
            }
            else if (current_page_num == page_total-1 && page_total == i) {
                neighbor_page_num.pop();
            }
        }

        neighbor_page_num.filter(value => page_items[value].style.display = 'none');
    }

    anchor_current_page.firstElementChild.setAttribute("href","javascript:void(0)");
    anchor_current_page.firstElementChild.style.pointerEvents = 'none';
    anchor_current_page.classList.add("active");
}