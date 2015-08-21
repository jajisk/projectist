<?php

namespace App\Action;

use App\Models\Project;
use App\Models\Projects;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\PDO\Database;
use Slim\Views\Twig;
use Psr\Log\LoggerInterface;

final class ProjectAction
{
    private $view;
    private $logger;
    private $language;
    private $database;

    public function __construct(Twig $view, LoggerInterface $logger,$language, Database $database)
    {
        $this->view = $view;
        $this->logger = $logger;
        $this->language = $language;
        $this->database = $database;
    }

    public function show(Request $request,Response $response, $args)
    {

        $projects = new Projects($this->database);

        $this->view->render($response, 'project\show.twig',array('projects'=> $projects->GetAllProjects(),'lang'=>$this->language));
        return $response;
    }

    public function view(Request $request,Response $response, $args)
    {
        $this->view->render($response, 'project\view.twig');
        return $response;
    }


}
