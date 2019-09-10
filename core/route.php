<?php

namespace route;

class Router
{
    public function start()
    {

        $route = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        $routing = [
            "/profile/register" => ['controller' => "RegisterController", 'action' => 'register', 'controller_file' => "register_controller.php", 'view' => 'register_view.php'],
            "/profile/login" => ['controller' => "LoginController", 'action' => 'login', 'controller_file' => "login_controller.php", 'view' => 'login_view.php'],
            "/profile/" => ['controller' => "ProfileController", 'action' => 'update', 'controller_file' => "profile_controller.php", 'view' => 'profile_view.php'],
            "/profile/login/form" => ['controller' => "LoginController", 'action' => 'login', 'controller_file' => "login_controller.php"],
            "/profile/form" => ['controller' => "ProfileController", 'action' => 'update', 'controller_file' => "profile_controller.php"],
            "/profile/register/form" => ['controller' => "RegisterController", 'action' => 'register', 'controller_file' => "register_controller.php"],
        ];

        if (isset($routing[$route])) {

            if ($route == "/profile/login/form") {
                require_once "../profile/controllers/" . $routing[$route]['controller_file'];
                $controller = 'controllers\\' . $routing[$route]['controller'];
                $action = $routing[$route]['action'];
                $controller_obj = new $controller();
                $controller_obj->$action();
                die();
            }

            if ($route == "/profile/register/form") {
                require_once "../profile/controllers/" . $routing[$route]['controller_file'];
                $controller = 'controllers\\' . $routing[$route]['controller'];
                $action = $routing[$route]['action'];
                $controller_obj = new $controller();
                $controller_obj->$action();
                die();
            }

            if ($route == "/profile/form") {
                require_once "../profile/controllers/" . $routing[$route]['controller_file'];
                $controller = 'controllers\\' . $routing[$route]['controller'];
                $action = $routing[$route]['action'];
                $controller_obj = new $controller();
                $controller_obj->$action();
                die();
            }

            require_once "../profile/controllers/" . $routing[$route]['controller_file'];
            require_once "../profile/views/" . $routing[$route]['view'];
            $controller = 'controllers\\' . $routing[$route]['controller'];
            $action = $routing[$route]['action'];
            $controller_obj = new $controller();
            $controller_obj->$action();
        } else {

            require_once "../profile/views/404.php";
            //print_r('No such page!');
        };
    }
}
