<?php

namespace route;

class Router
{
    public function start() {

        $route = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        $routing = [
            "/profile/" => ['controller' => "RegisterController", 'action' => 'register', 'controller_file' => "register_controller.php", 'view' => 'register_view.php'],
            "/profile/login" => ['controller' => "LoginController", 'action' => 'login', 'controller_file' => "login_controller.php", 'view' => 'register_view.php'],
        ];

        if (isset($routing[$route])) {

            require_once "../profile/controllers/" . $routing[$route]['controller_file'];
            require_once "../profile/views/" . $routing[$route]['view'];
            $controller = 'controllers\\' . $routing[$route]['controller'];
            $action = $routing[$route]['action'];
            $controller_obj = new $controller();
            $controller_obj->$action();

        } else {

            //require_once "../profile/views/404.php";
            print_r('No such page!');
        };
    }
}
