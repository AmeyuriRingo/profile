<?php
require_once "core/route.php";

session_start();
$router = new route\Router();
$router -> start();
//phpinfo();