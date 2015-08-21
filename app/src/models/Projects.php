<?php
namespace App\Models;

use Slim\PDO\Database;

class Projects
{
    private $database;

    public function __construct(Database $db)
    {
        $this->database = $db;
    }
    public function GetAllProjects()
    {
        $sql = "select id from projects";
        $result = $this->database->query($sql);

        $projects = array();

        foreach ($result as $row)
        {
            $project = new Project($this->database);
            $project->LoadFromID($row['id']);
            $projects[] = $project;
        }

        return $projects;
    }
}