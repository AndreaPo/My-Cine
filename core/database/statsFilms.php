<?php  
require 'goTo.php';
require __DIR__ . "./../../vendor/autoload.php";
use \Firebase\JWT\JWT;

use Arrilot\DotEnv\DotEnv;
DotEnv::load(__DIR__ . './../../.env.php');

require "connectionDB.php";
require 'eQuery.php';

$id = $_SESSION['id'];

$query = "SELECT title FROM mycinefilm WHERE vote IN(SELECT MAX(vote) FROM  mycinefilm WHERE userid = :userid)";

$query2 ="SELECT title FROM mycinefilm WHERE vote IN(SELECT MIN(vote) FROM  mycinefilm WHERE userid = :userid)";


$param = [
    ':userid'=>$id,
];

$resultMax = eQuery($pdo, $query, $param, false);
$resultMin = eQuery($pdo, $query2, $param, false);
$filmMax = ""; 
$filmMin = ""; 

foreach ($resultMax as $row) {
    $filmMax = $row['title'];
}
foreach ($resultMin as $row) {
    $filmMin = $row['title'];
}
$_SESSION['bestfilm'] = $filmMax;
$_SESSION['worstfilm'] = $filmMin;