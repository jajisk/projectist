<?php

//THIS FILE MUST NOT BE AVAILABLE IN PRODUCTION SYSTEMS!!!!

require __DIR__ . '/../vendor/autoload.php';

$database = new Slim\PDO\Database('mysql:host=localhost;dbname=projectist;charset=utf8','root','');


$project_names = Array( 'Inotice', 'Dongstrip', 'Overtaxon', 'Stattex', 'Stanhow', 'Sansailcity', 'Aceredcode', 'viaware', 'Sonla', 'Codefax', 'Goodfix', 'Transfase',
                        'unazoom', 'Canenix', 'X-zim', 'Bamdrill', 'Zoo-code', 'Medlane', 'Dingmedfax', 'zathcane', 'K-zone', 'Dan-ex', 'Unifinfan', 'Suntrans',
                        'Y-ex', 'zimla', 'Over-city', 'Doubleware', 'Plusing', 'templine', 'Geolex', 'Yearhex', 'Hatgofase', 'Stat-con', 'Media-tex', 'Redtom', 'J-tancore');

$sql = "TRUNCATE TABLE projects";
$database->exec($sql);
echo "Truncating the projects Table<br>";
foreach($project_names as $project_name)
{
    //insert some projects
    $project = new \App\Models\Project($database);
    $project->CreateNew('code_test2',$project_name,'owner_test','portfolio_test','rag_status_test');
    $project->Save();
    $project = null;
    echo "saved Project $project_name <br>";
}