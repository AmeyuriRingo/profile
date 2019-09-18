<?php

namespace controllers;
use core\DBClass as db;

class LoginController
{
    public function __construct()
    {
        session_unset();
    }

    public function login()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

            $errors = array();
            $arrayFields = array(
                'email' => $_REQUEST['email'],
                'password' => $_REQUEST['password'],
            );

            require_once "../profile/core/model.php";
            $db = new db();
            $user = $db->selectAll('user', "email = '" . $arrayFields['email'] . "'");

            if (isset($user)) {

                if (password_verify($arrayFields['password'], $user[0]['password'])) {

                    $_SESSION['user_id'] = $user[0]['id'];

                    $array = array('success');
                    echo json_encode($array);
                } else {

                    $errors['password'] = "Invalid password. Try again";
                    $array = array('text_error' => $errors);
                    echo json_encode($array);
                }
            } else {

                $errors['email'] = "User with this email is not registered";
                $array = array('text_error' => $errors);
                echo json_encode($array);
            }
        }
    }
}