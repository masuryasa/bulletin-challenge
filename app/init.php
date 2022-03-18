<?php

require_once "../config/config.php";
require_once "../config/func_validation.php";
require_once "../models/Bulletin.php";
require_once "App.php";

define("VIEWPATH", "../views/");

define("WRONG_PASS", "<b>Wrong password</b>, use 4 digit number!");
define("TITLE_BODY_INVALID", "<b>Invalid title or body length</b>!");
define("IST", "insert");
define("DLT", "delete");
define("EDT", "edit");
