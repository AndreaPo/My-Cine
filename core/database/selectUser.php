<?php
session_start();
require 'goTo.php';
require __DIR__ . "./../../vendor/autoload.php";
use \Firebase\JWT\JWT;

use Arrilot\DotEnv\DotEnv;
DotEnv::load(__DIR__ . './../../.env.php');

require "connectionDB.php";
require 'eQuery.php';

$uri  = '/mycine/myfilms';
$host = $_SERVER['HTTP_HOST'];

if (isset($_POST['submit'])) {

    if ( empty($_POST['name']) || empty($_POST['password-1']) ) {

        echo "<h2>Empty fields!</h2>";
        goAt($host, $uri, 2);

    }else{
        $name = $_POST['name'];
        
        $query = "SELECT * FROM mycineusers WHERE name = :name";

        $param = [
            ':name'=>$name,
        ];
        
        $result = eQuery($pdo, $query, $param, false);

        //here create token

        $nick = "nickname";
        //my key value for the JWT
        
        $id = "id";

        foreach ($result as $row) {
            $nick = $row['name'];
            $country = $row['country'];
            $id = $row['id'];
        }


        $key = DotEnv::get('jwtkey');
        //set my info in the payload JWT
        $payload = array(
            "id" => $id,
            "nickname" => $nick,
            "country" => $country,
            "expire" => time()+3600,
        );
        
        try{
            //encode the JWT and set the cookie
            $jwt = JWT::encode($payload, $key);

            $cookieData = [
                "nickname" => $nick,
                "country" => $country,
                "jwt" => $jwt,
            ];

            $user = serialize($cookieData);

            setcookie('user', $user, time() + 3600, "/");
             
            session_unset();
            session_destroy();
            session_start();
            $_SESSION['id']=$id;


        }catch (UnexpectedValueException $e) {
                echo $e->getMessage();
        }
        
        goAt($host, $uri, 0);
    }
}