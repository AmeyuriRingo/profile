<?php
require_once "core/route.php";

session_start();
$router = new core\Router();
$router -> start();
//phpinfo();