<?php


namespace Controller;
use PDO;

abstract class Controller
{
    protected PDO $bdd;

    abstract public function get($args);
    abstract public function post($args);
}