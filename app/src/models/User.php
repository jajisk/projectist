<?php

namespace App\Models;

use Slim\Exception\Exception;
use Slim\PDO\Database;

class User
{
    private $database;

    private $id;
    private $username;
    private $password;

    public function __construct(Database $db)
    {
        $this->database = $db;
    }

    public function CreateNew($username,$password)
    {
        $this->setUsername($username);
        $this->setPassword($password);
    }

    public function LoadFromID()
    {

    }

    public function Save()
    {
        $passHash = password_hash($this->getPassword(),PASSWORD_DEFAULT);
        try
        {
            $sql = "INSERT INTO users (username, password) values(:username,:password)";
            $stmt = $this->database->prepare($sql);
            $stmt->bindParam(':username',$this->getUsername());
            $stmt->bindParam(':password', $passHash);
            $stmt->execute();
        }
        catch (Exception $e)
        {
            throw $e;
        }
    }

    public function Login()
    {

    }

    public function Logout()
    {

    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }


}