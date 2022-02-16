<?php
include_once "config/config.php";

class Database
{
    protected $mysqli;
    protected $tableName;

    function __construct($tableName)
    {
        $this->connectDatabase();
        $this->tableName = $tableName;
    }

    private function connectDatabase()
    {
        $mysqli = new mysqli(HOST, USERNAME, PASSWORD, DATABASE_NAME);

        if ($mysqli) {
            return $this->mysqli = $mysqli;
        } elseif ($mysqli->connect_errno) {
            return "Failed to connect to MySQL " . $mysqli->connect_error;
        }
    }

    // method to insert message with password
    public function insert($title, $body, $password)
    {
        $mysqli = $this->mysqli;
        $sql = "INSERT INTO " . $this->tableName;

        if (!empty($password)) {
            $password = md5('$password');
        }

        $sql .= " VALUES ('', '$title', '$body', '$password', now())";

        return $mysqli->query($sql);
    }

    // method to select all messages data from database
    public function select($idMessage, $start, $page)
    {
        $mysqli = $this->mysqli;
        $sql = "SELECT * FROM " . $this->tableName;

        if (!is_null($idMessage)) {
            $sql .= " WHERE id_message=$idMessage";
            $result = $mysqli->query($sql);
            return $result->fetch_assoc();
        } elseif (!is_null($start) && !is_null($page)) {
            $sql .= " ORDER BY id_message " .
                "DESC LIMIT $start, $page";
            $results = $mysqli->query($sql);

            while ($data = $results->fetch_array()) {
                $arrResults[] = $data;
            }
            return $arrResults;
        } else {
            return $mysqli->query($sql);
        }
    }

    // method to update specific message data
    public function update($idMessage, $title, $body)
    {
        $mysqli = $this->mysqli;

        $sql = "UPDATE " .
            $this->tableName .
            " SET title='$title', body='$body' " .
            "WHERE id_message=$idMessage";
        return $mysqli->query($sql);
    }

    // method delete message data
    public function delete($idMessage)
    {
        $mysqli = $this->mysqli;

        $sql = "DELETE FROM " .
            $this->tableName .
            " WHERE id_message=$idMessage";
        return $mysqli->query($sql);
    }
}
