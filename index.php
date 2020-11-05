<?php
use \Firebase\JWT\JWT;
require './views/templates/header.tpl.php';
require './core/Router.php';


$router = new Router();

require 'routes.php';

$uri = trim($_SERVER['REQUEST_URI'], '/');
require $router->direct($uri);

require './views/templates/footer.tpl.php';
?>