<?php

namespace App\Models;

use Slim\Exception\Exception;
use Slim\PDO\Database;

class Project
{
    private $ID;
    private $Code;
    private $Name;
    private $Description;
    private $Owner;
    private $Portfolio;
    private $RAG_Status;

    private $database;


    /**
     *
     */
    public function __construct(Database $db)
    {
        $this->database = $db;
    }

    public function CreateNew($code,$name,$owner,$portfolio,$rag_status)
    {
        $this->setCode($code);
        $this->setName($name);
        $this->setOwner($owner);
        $this->setPortfolio($portfolio);
        $this->setRAGStatus($rag_status);
    }

    public function Save()
    {
        try
        {
            $sql = 'INSERT INTO projects (code,name,owner,portfolio,rag_status) VALUES (:code,:name,:owner,:portfolio,:rag_status)';
            $stmt = $this->database->prepare($sql);
            $stmt->bindParam(':code', $this->getCode());
            $stmt->bindParam(':name', $this->getName());
            $stmt->bindParam(':owner', $this->getOwner());
            $stmt->bindParam(':portfolio',$this->getPortfolio());
            $stmt->bindParam(':rag_status',$this->getRAGStatus());
            $stmt->execute();

        }
        catch(Exception $e)
        {
            throw $e;
        }

    }

    public function LoadFromID($id)
    {
        $selectStatement = $this->database->select()->from('projects')->where('id','=',$id);
        $stmt = $selectStatement->execute();
        $data = $stmt->fetch();

        $this->setID($data['id']);
        $this->setCode($data['code']);
        $this->setName($data['name']);
        $this->setOwner($data['owner']);
        $this->setPortfolio($data['portfolio']);
        $this->setRAGStatus($data['rag_status']);

    }

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @param mixed $ID
     * @return Project
     */
    public function setID($ID)
    {
        $this->ID = $ID;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->Code;
    }

    /**
     * @param mixed $Code
     * @return Project
     */
    public function setCode($Code)
    {
        $this->Code = $Code;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param mixed $Name
     * @return Project
     */
    public function setName($Name)
    {
        $this->Name = (string)$Name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @param mixed $Description
     * @return Project
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->Owner;
    }

    /**
     * @param mixed $Owner
     * @return Project
     */
    public function setOwner($Owner)
    {
        $this->Owner = $Owner;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPortfolio()
    {
        return $this->Portfolio;
    }

    /**
     * @param mixed $Portfolio
     * @return Project
     */
    public function setPortfolio($Portfolio)
    {
        $this->Portfolio = $Portfolio;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRAGStatus()
    {
        return $this->RAG_Status;
    }

    /**
     * @param mixed $RAG_Status
     * @return Project
     */
    public function setRAGStatus($RAG_Status)
    {
        $this->RAG_Status = $RAG_Status;
        return $this;
    }
}