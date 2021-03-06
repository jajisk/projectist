<?php
// DIC configuration

$container = $app->getContainer();

// -----------------------------------------------------------------------------
// Service providers
// -----------------------------------------------------------------------------

// Twig
$container['view'] = function ($c) {
    $view = new \Slim\Views\Twig($c['settings']['view']['template_path'], $c['settings']['view']['twig']);

    // Add extensions
    $view->addExtension(new Slim\Views\TwigExtension($c['router'], $c['request']->getUri()));
    $view->addExtension(new Twig_Extension_Debug());

    return $view;
};

// Flash messages
$container['flash'] = function ($c) {
    return new \Slim\Flash\Messages;
};

// -----------------------------------------------------------------------------
// Service factories
// -----------------------------------------------------------------------------

// monolog
$container['logger'] = function ($c) {
    $settings = $c['settings']['logger'];
    $logger = new \Monolog\Logger($settings['name']);
    $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
    $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], \Monolog\Logger::DEBUG));
    return $logger;
};

// database
$container['database'] = function ($c)
{
    $settings = $c['settings']['database'];
    $database  = new \Slim\PDO\Database($settings['db_dsn'],$settings['db_user'],$settings['db_password']);
    return $database;
};


// -----------------------------------------------------------------------------
// Language Actions
// -----------------------------------------------------------------------------
include('src\lang\en.php');
$container['language']= $lang;
// -----------------------------------------------------------------------------
// Action factories
// -----------------------------------------------------------------------------

$container['App\Action\HomeAction'] = function ($c) {return new App\Action\HomeAction($c['view'], $c['logger'],$c['language'],$c['database']);};
$container['App\Action\ProjectAction'] = function ($c) {return new App\Action\ProjectAction($c['view'], $c['logger'],$c['language'],$c['database']);};
