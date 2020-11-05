<?php
require 'goTo.php';
require __DIR__ . "./../../vendor/autoload.php";
use \Firebase\JWT\JWT;

use Arrilot\DotEnv\DotEnv;
DotEnv::load(__DIR__ . './../../.env.php');
$key = DotEnv::get('jwtkey');
$uri  = '/mycine/';
$host = $_SERVER['HTTP_HOST'];

if(isset($_POST['submit'])){
    $user = unserialize($_COOKIE['user']);
    $token = $user['jwt'];

    $key = DotEnv::get('jwtkey');

    $decoded = JWT::decode($token, $key, array('HS256'));

    setcookie("user", "", time() - 3600, "/");
    
    goAt($host, $uri, 0);
}