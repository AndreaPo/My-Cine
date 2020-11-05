<?php
require 'goTo.php';
$uri  = '/mycine';
$host = $_SERVER['HTTP_HOST'];
if (isset($_POST['submit'])) {

    if ( empty($_POST['name']) || empty($_POST['password-1']) || empty($_POST['password-2']) || empty($_POST['country'])) {

        echo "<h2>Empty fields!</h2>";
        goAt($host, $uri, 2);

    }elseif ($_POST['password-1'] != $_POST['password-2']) {
        
        echo "<h2>Passwords do not match!</h2>";
        goAt($host, $uri, 2);
        
    }else{
        $name = $_POST['name'];
        
        $password = password_hash($_POST['password-1'], PASSWORD_DEFAULT);
        
        $country = $_POST['country'];

        require "connectionDB.php";
        
        $query = "INSERT INTO mycineusers(name, password, country) VALUES( :name, :password, :country)";

        $param = [
            ':name'=>$name,
            ':password'=>$password,
            ':country'=>$country
        ];

        require 'eQuery.php';
        

        eQuery($pdo, $query, $param, true);
        
        
        goAt($host, $uri, 0);
    }
}
