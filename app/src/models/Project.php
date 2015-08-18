<?php

namespace App\Models;

class Project
{
    public $ID;
    public $Code;
    public $Name;
    public $Description;
    public $Owner;
    public $Portfolio;
    public $RAG_Status;


    /**
     *
     */
    public function __construct($code,$name,$owner,$portfolio,$rag_status)
    {
        $this->setCode($code);
        $this->setName($name);
        $this->setOwner($owner);
        $this->setPortfolio($portfolio);
        $this->setRAGStatus($rag_status);
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
        $this->Name = $Name;
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