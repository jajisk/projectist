<?php
require __DIR__ . '/vendor/autoload.php';
$database = new Slim\PDO\Database('mysql:host=localhost;dbname=projectist;charset=utf8','root','');

echo "----------------------------------------------------------------------------\n";
echo "|                      Projectist CLI Tools                                |\n";
echo "----------------------------------------------------------------------------\n";

if($argv[1]=="GeneratePasswordHash")
{
    GivePasswordHash($argv[2]);
}
elseif($argv[1]=="GenerateUser")
{
    GenerateUser($argv[2],$argv[3]);
}
elseif($argv[1]=="Help")
{
    Help();
}

function Help()
{
    echo "Commands Available...\n";
    echo "----------------------\n";
    echo "GenerateUser [username] [password]\n";
    echo "GeneratePasswordHash [password]\n";
}

function GenerateUser($username, $password)
{
    global $database;
    $user = new \App\Models\User($database);
    $user->CreateNew($username, $password);
    $user->Save();
    echo "User: $username created with password: $password";
}

function GeneratePasswordHash($raw_pass)
{
    global $argv;
    echo "Your password hash for ". $raw_pass ." is ". password_hash($raw_pass,PASSWORD_DEFAULT);
}
