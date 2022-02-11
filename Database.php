<?php
include_once "config/config.php";

class Database
{
    public $mysqli;

    function __construct()
    {
        $mysqli = new mysqli(HOST, USERNAME, PASSWORD, DATABASE_NAME);
        if ($mysqli) {
            return $this->mysqli = $mysqli;
        } elseif ($mysqli->connect_errno) {
            return "Failed to connect to MySQL " . $mysqli->connect_error;
        }
    }

    // method to insert message with password
    public function insertMessageData($title, $body, $password)
    {
        $mysqli = $this->mysqli;

        if ($password != "") {
            $sql = "INSERT INTO messages " .
                "VALUES ('', '$title', '$body', md5('$password'), now())";
        } else {
            $sql = "INSERT INTO messages " .
                "VALUES ('', '$title', '$body', '', now())";
        }

        return $mysqli->query($sql);
    }

    // method to select all messages data from database
    public function selectMessagesData($idMessage)
    {
        $mysqli = $this->mysqli;

        if ($idMessage != -1) {
            // select specified message data if $idMessage is not set by -1
            $sql = "SELECT * FROM messages " .
                "WHERE id_message=$idMessage";
            $result = $mysqli->query($sql);
            return $result->fetch_assoc();
        } else {
            // select all message data if $idMessage is set by -1
            $sql = "SELECT * FROM messages";
            return $mysqli->query($sql);
        }
    }

    // method to select message data with limit it
    public function selectMessageDataByLimit($start, $page)
    {
        $mysqli = $this->mysqli;

        $sql = "SELECT * FROM messages " .
            "ORDER BY id_message " .
            "DESC LIMIT $start, $page";
        $results = $mysqli->query($sql);

        while ($data = $results->fetch_array()) {
            $arrResults[] = $data;
        }
        return $arrResults;
    }

    // method to update specific message data
    public function updateMessageData($idMessage, $title, $body)
    {
        $mysqli = $this->mysqli;

        $sql = "UPDATE messages " .
            "SET title='$title', body='$body' " .
            "WHERE id_message=$idMessage";
        return $mysqli->query($sql);
    }

    // method delete message data
    public function deleteMessageData($idMessage)
    {
        $mysqli = $this->mysqli;

        $sql = "DELETE FROM messages " .
            "WHERE id_message=$idMessage";
        return $mysqli->query($sql);
    }
}
