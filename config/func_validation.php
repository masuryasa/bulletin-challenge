<?php

function title_length_validation($title)
{
    $titleLen = strlen($title);
    if (!empty($titleLen) && $titleLen >= 10 && $titleLen <= 32) {
        return true;
    } else {
        return false;
    }
}

function body_length_validation($body)
{
    $bodyLen = strlen($body);
    if (!empty($bodyLen) && $bodyLen >= 10 && $bodyLen <= 200) {
        return true;
    } else {
        return false;
    }
}

function pass_length_validation($pass)
{
    if ((bool)preg_match("/\d{4}/", $pass)) {
        return true;
    }
}

function input_data_validation($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}
