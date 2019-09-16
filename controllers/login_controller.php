<?php

namespace controllers;


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
                'email' => $_REQUEST['validEmail'],
                'password' => $_REQUEST['validPassword'],
            );

            require_once "../profile/core/model.php";
            $db = new DBClass();
            $user = $db->select('email, password, id', 'user', "email = '" . $arrayFields['email'] . "'");

            if ($arrayFields['email'] == "" and $arrayFields['password'] == "") {

                $errors['email'] = "Required field";
                $errors['password'] = "Required field";
                $array = array('result' => 'error', 'text_error' => $errors);
                echo json_encode($array);
                die();
            } elseif ($arrayFields['email'] == "") {

                $errors['email'] = "Required field";
                $array = array('result' => 'error', 'text_error' => $errors);
                echo json_encode($array);
                die();
            } elseif ($arrayFields['password'] == "") {

                $errors['password'] = "Required field";
                $array = array('result' => 'error', 'text_error' => $errors);
                echo json_encode($array);
                die();
            }

            if (isset($user)) {

                if (password_verify($arrayFields['password'], $user[0]['password'])) {

                    //session_start();
                    $_SESSION['user_id'] = $user[0]['id'];

                    $array = array('result' => 'success');
                    echo json_encode($array);
                } else {

                    $errors['password'] = "Invalid password. Try again";
                    $array = array('result' => 'error', 'text_error' => $errors);
                    echo json_encode($array);
                }
            } else {

                $errors['email'] = "User with this email is not registered";
                $array = array('result' => 'error', 'text_error' => $errors);
                echo json_encode($array);
            }
        }
    }
}