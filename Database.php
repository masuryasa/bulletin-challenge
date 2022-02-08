<?php
class Database
{
    const HOST = "localhost";
    const USERNAME = "root";
    const PASSWORD = "";
    const DATABASE_NAME = "bulletin";
    public $mysqli;

    function __construct() {
        $mysqli = new mysqli(self::HOST, self::USERNAME, self::PASSWORD, self::DATABASE_NAME);
        return $this->mysqli = $mysqli;
    }
    
    // method to insert message with password
    public function insertMessageWithPassword($title,$body,$password) {
        $mysqli = $this->mysqli;
        
        $sql = "INSERT INTO messages " .
        "VALUES ('', '$title', '$body', md5('$password'), now())";
        return $mysqli->query($sql);
    }
    
    // method to insert data without password
    public function insertMessageWithoutPassword($title,$body) {
        $mysqli = $this->mysqli;
        
        $sql = "INSERT INTO messages " .
        "VALUES ('', '$title', '$body', '', now())";
        return $mysqli->query($sql);
    }
    
    // method to select all messages data from database
    public function selectAllMessagesData() {
        $mysqli = $this->mysqli;

        $sql = "SELECT * FROM messages";
        return $mysqli->query($sql);
    }

    // method to select message data with limit it
    public function selectMessageDataByLimit($start,$page) {
        $mysqli = $this->mysqli;

        $sql = "SELECT * FROM messages " .
        "ORDER BY id_message " .
        "DESC LIMIT $start, $page";
        $results = $mysqli->query($sql);

        while($data = $results->fetch_array()){
            $arrResults[] = $data;
        }
        return $arrResults;
    }

    // method to select specific message data
    public function selectMessageDataById($idMessage) {
        $mysqli = $this->mysqli;
        
        $sql = "SELECT * FROM messages " .
            "WHERE id_message=$idMessage";
        $result = $mysqli->query($sql);

        while($data = $result->fetch_array()){
            $arrResult[] = $data;
        }
        return $arrResult;
    }

    // method to update specific message data
    public function updateMessageData($idMessage,$title,$body) {
        $mysqli = $this->mysqli;

        $sql = "UPDATE messages " .
            "SET title='$title', body='$body' " .
            "WHERE id_message=$idMessage";
        return $mysqli->query($sql);
    }

    // method delete message data
    public function deleteMessageData($idMessage) {
        $mysqli = $this->mysqli;

        $sql = "DELETE FROM messages ".
            "WHERE id_message=$idMessage";
        return $mysqli->query($sql);
    }

}
?>