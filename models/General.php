<?php
require_once "../Database.php";

class General
{
    protected $database;

    protected function setTableName($tableName)
    {
        $this->database = new Database($tableName);
    }

    protected function insert($title, $body, $password)
    {
        return $this->database->insert($title, $body, $password);
    }

    protected function select($idMessage, $countTotal, $start, $limit)
    {
        return $this->database->select($idMessage, $countTotal, $start, $limit);
    }

    protected function update($idMessage, $title, $body)
    {
        return $this->database->update($idMessage, $title, $body);
    }

    protected function delete($idMessage)
    {
        return $this->database->delete($idMessage);
    }
}
