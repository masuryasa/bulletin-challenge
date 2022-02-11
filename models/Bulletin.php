<?php
require_once "../Database.php";

class Bulletin
{
    public $database;

    function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function insertMessage($title, $body, $password)
    {
        return $this->database->insertMessageData($title, $body, $password);
    }

    public function selectMessage($idMessage = -1)
    {
        return $this->database->selectMessagesData($idMessage);
    }

    public function selectMessageByLimit($start, $page)
    {
        return $this->database->selectMessageDataByLimit($start, $page);
    }

    public function updateMessage($idMessage, $title, $body)
    {
        return $this->database->updateMessageData($idMessage, $title, $body);
    }

    public function deleteMessage($idMessage)
    {
        return $this->database->deleteMessageData($idMessage);
    }
}
