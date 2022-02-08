<!DOCTYPE html>
<html>
    <head>
        <title>Bulletin Challenge</title>

        <link rel="stylesheet" href="bootstrap-4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
    </head>
    <body onload="disEnaPaginationItem()">
        <div class="container">
            <div class="attention_text">
                <p id="warningTitle" style="margin-top: 20px;"></p>
                <p id="warningBody"></p>
                <p id="warningPassword"></p>
            </div>
            <div class="form_input">
                <form name="messageForm" action="insert_message.php" method="POST">
                    <label for="title">Title</label><br>
                    <input type="text" id="title" name="title" minlength="10" maxlength="32" required>
                    <br>
                    <label for="body">Body</label><br>
                    <input type="text" id="body" name="body" minlength="10" maxlength="200" class="input_body" required>
                    <br>
                    <label for="pass">Password</label><br>
                    <input type="password" id="pass" name="pass" minlength="4" maxlength="4">
                    <br>
                    <br>
                    <input type="submit" onclick="validatorForm()">
                </form>
            </div>

            <?php
            require_once "Database.php";
            
            $database = new Database();
            $mysqli = $database->mysqli;
            
            if(!$database){
                die("ERROR: Could not connect the database. ". $database->connect_error);
            }

            $currentPage = substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'],"/")+1);
            $currentPageNum = substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'],"=")+1);
            
            if ($currentPage == "" || $currentPage == "index.php") {
                header("Location: index.php?page=1");
            }

            $page = 10;
            $urlPage = isset($_GET['page']) ? (int)$_GET["page"] : 1;
            $start = ($urlPage>1) ? ($urlPage * $page) - $page : 0;
            $selectAllMessages = $database->selectAllMessagesData();
            $total = $selectAllMessages->num_rows;
            $numPages = ceil($total/$page); 
            $arrResults = $database->selectMessageDataByLimit($start,$page);

            foreach ($arrResults as $result){
                echo "<hr style='margin:30px 0;'>";
                echo '
                <div class="data_messages">
                    <p id="title_text">'.$result['title'].'</p>
                    <p>'.$result['body'].'</p>
                    <p>'.$result['time'].'</p>
                    <form method="POST">
                        <label for="password">Pass</label>
                        <input type="password" id="password" name="passwd" size="5" maxlength="4">
                        <input type="hidden" name="current_page" value="'.$currentPage.'">
                        <button type="submit" name="id_message" formaction="delete_form.php" value="'.$result["id_message"].'">Delete</button>
                        <button type="submit" name="id_message" formaction="edit_form.php" value="'.$result["id_message"].'">Edit</button>
                    </form>
                </div>
                    ';
            }
                echo "<hr style='margin:30px 0;'>";
			
            $mysqli->close();
            ?>
            
        </div>
        <div class="paging-button">
            <ul class="pagination">
                <li class="page-item" id="previous-item">
                    <a href="index.php?page=<?php echo $currentPageNum-1 ?>" class="page-link" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <?php for ($i=1; $i<=$numPages ; $i++){ ?>
                    <li class="page-item item-only">
                        <a href="?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
                    </li>
                <?php } ?>
                <li class="page-item" id="next-item">
                    <a href="index.php?page=<?php echo $currentPageNum+1 ?>" class="page-link" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
            </ul>
        </div>
    </body>
</html>