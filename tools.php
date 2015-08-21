<?php
require __DIR__ . '/vendor/autoload.php';
$database = new Slim\PDO\Database('mysql:host=localhost;dbname=projectist;charset=utf8','root','');

echo "----------------------------------------------------------------------------\n";
echo "|                      Projectist CLI Tools                                |\n";
echo "----------------------------------------------------------------------------\n";

if($argv[1]=="PasswordHash")
{
    GivePasswordHash($argv[2]);
}
elseif($argv[1]=="GenerateUser")
{
    GenerateUser($argv[2],$argv[3]);
}

function GenerateUser($username, $password)
{
    global $database;
    $user = new \App\Models\User($database);
    $user->CreateNew($username, $password);
    $user->Save();
    echo "User: $username created with password: $password";
}

function GivePasswordHash($raw_pass)
{
    global $argv;
    echo "Your password hash for ". $raw_pass ." is ". password_hash($raw_pass,PASSWORD_DEFAULT);
}