<?php

class App
{
    protected $controller = 'Index';

    public function __construct()
    {
        list($key, $value) = $this->parseURL();

        if (!empty($key) && !empty($value)) {
            if (file_exists('../controllers/' . $value[0] . '.php')) {
                $this->controller = $value[0];
            }
        }

        require_once '../controllers/' . $this->controller . '.php';
    }

    public function parseURL()
    {
        if (isset($_GET)) {
            $key = array_keys($_GET);
            $value = array_values($_GET);
            return [$key, $value];
        }
    }
}
