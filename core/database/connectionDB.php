<?php
require __DIR__ . "./../../vendor/autoload.php";
use Arrilot\DotEnv\DotEnv;
DotEnv::load(__DIR__ . './../../.env.php');

$host = DotEnv::get('host');
$dbname = DotEnv::get('dbname');
$user = DotEnv::get('user');
$pass = DotEnv::get('password');

$dsn = 'mysql:host='.$host.'; dbname='.$dbname.'; charset=utf8';

$pdo = new PDO($dsn, $user, $pass );
  
$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>