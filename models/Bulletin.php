<?php
require_once "General.php";

class Bulletin extends General
{
    function __construct()
    {
        $this->setTableName("messages");
    }

    public function insertMessage($title, $body, $password)
    {
        return $this->insert($title, $body, $password);
    }

    public function selectMessage($idMessage = null, $start = null, $page = null)
    {
        return $this->select($idMessage, $start, $page);
    }

    public function updateMessage($idMessage, $title, $body)
    {
        return $this->update($idMessage, $title, $body);
    }

    public function deleteMessage($idMessage)
    {
        return $this->delete($idMessage);
    }
}
