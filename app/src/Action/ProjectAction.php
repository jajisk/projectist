<?php

namespace App\Action;

use App\Models\Project;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;
use Psr\Log\LoggerInterface;

final class ProjectAction
{
    private $view;
    private $logger;
    private $language;

    public function __construct(Twig $view, LoggerInterface $logger,$language)
    {
        $this->view = $view;
        $this->logger = $logger;
        $this->language = $language;

        print_r($this->language);
    }

    public function show(Request $request,Response $response, $args)
    {

        $projects =
            [
                new Project("AA1","Test Project 1","Steve","PRT_1","RED"),
                new Project("AA2","Test Project 2","Steve","PRT_1","RED"),
                new Project("AA3","Test Project 3","Steve","PRT_1","RED"),
                new Project("AA4","Test Project 4","Steve","PRT_1","RED"),
                new Project("AA5","Test Project 5","Steve","PRT_1","RED"),
                new Project("AA6","Test Project 6","Steve","PRT_1","RED")
            ];

        $this->view->render($response, 'project\show.twig',array('projects'=> $projects,'lang'=>$this->language));
        return $response;
    }

    public function view(Request $request,Response $response, $args)
    {
        $this->view->render($response, 'project\view.twig');
        return $response;
    }


}
