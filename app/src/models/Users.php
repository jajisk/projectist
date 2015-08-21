<?php

namespace App\Models;

class Users
{
    private $database;

    public function __construct(Database $db)
    {
        $this->database = $db;
    }
}