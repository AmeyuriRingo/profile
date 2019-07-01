<?php

namespace controllers;

$registerController = new LoginController();
$registerController->login();

class LoginController
{
    public function login()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $errors = array();
            $arrayFields = array(
                'email' => $_REQUEST['validEmail'],
                'password' => $_REQUEST['validPassword'],
            );

            require_once "/Library/WebServer/Documents/profile/core/model.php";
            $db = new DBClass(SERVER, USER, PASS, DBNAME);
            $user = $db->select('email, password, name', 'user');

            if ( $user[0]['email'] == $arrayFields['email'] && $user[0]['password'] == $arrayFields['password'] ) {
                $array = array('result' => 'success');
                echo json_encode($array);
            } elseif ( $user[0]['email'] != $arrayFields['email'] ) {
                $errors['email'] = "User with this email is nod registered";
                $array = array('result' => 'error', 'text_error' => $errors);
                echo json_encode($array);
            } else {
                $errors['password'] = "Invalid password. Try again";
                $array = array('result' => 'error', 'text_error' => $errors);
                echo json_encode($array);
            }
            $db->closeConnection();
        }
    }
}