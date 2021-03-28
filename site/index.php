<?php
require_once "Router.php";
require_once "Controllers/TestController.php";
use Router\Router;

$rt = new Router();
$rt->get("/lol/*", new \Controller\TestController());