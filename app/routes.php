<?php
// Routes

$app->get('/', 'App\Action\HomeAction:dispatch')->setName('homepage');
$app->get('/project/show','App\Action\ProjectAction:show')->setName('project_show');
$app->get('/project/view','App\Action\ProjectAction:view')->setName('project_view');