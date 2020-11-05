<?php
require 'goTo.php';
require __DIR__ . "./../../vendor/autoload.php";
use \Firebase\JWT\JWT;

use Arrilot\DotEnv\DotEnv;
DotEnv::load(__DIR__ . './../../.env.php');

require "connectionDB.php";
require 'eQuery.php';

$uri  = '/mycine/myfilms';
$host = $_SERVER['HTTP_HOST'];

if(isset($_POST['submit'])){

    $title = $_POST['title'];

    $vote = $_POST['vote'];

    $country = $_POST['country'];
    $token = $_POST['token'];

    $key = DotEnv::get('jwtkey');

    $decoded = JWT::decode($token, $key, array('HS256'));
    $jwt = (array) $decoded;

    $userid = $jwt['id'];

    $query = "INSERT INTO mycinefilm(title, vote, userid, country) VALUES( :title, :vote, :userid, :country)";

    $param = [
        ':title'=>$title,
        ':vote'=>$vote,
        ':country'=>$country,
        ':userid'=>$userid
    ];


    eQuery($pdo, $query, $param, true);

    goAt($host, $uri, 0);
}