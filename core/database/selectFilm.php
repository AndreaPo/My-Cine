<?php
session_start();
require 'goTo.php';
require __DIR__ . "./../../vendor/autoload.php";
use Arrilot\DotEnv\DotEnv;
DotEnv::load(__DIR__ . './../../.env.php'); 


$uri  = '/mycine/myfilms';
$host = $_SERVER['HTTP_HOST'];

if (isset($_POST['submit'])) {

    if ( empty($_POST['film']) ) {

        echo "<h2>Empty field!</h2>";
        goAt($host, $uri, 2);

    }else{

        $title = $_POST['film'];

        //replace every white space with "+"
        $title = preg_replace('/\s+/', '+', $title);
        $apiKey = DotEnv::get('apikey');

        $film ='http://www.omdbapi.com/?apikey='.$apiKey.'&t='. $title;

        $handle = curl_init();

        curl_setopt($handle, CURLOPT_URL, $film);

        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

        $data = curl_exec($handle);
        //casting from String to JSON
        $data = json_decode($data);        

        require "getSessionData.php";

        curl_close($handle);

        $path = __DIR__ . './../../views/data.php';
        
        goAt($host, $uri, 0);
    }
}