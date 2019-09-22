<?php
namespace controllers;
use core\DBClass as db;

class RegisterController
{
    public function register()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

            require_once "../profile/core/model.php";
            $db = new db();
            $errors = array();
            $arrayFields = array(
                'name' => $_REQUEST['name'],
                'email' => $_REQUEST['email'],
                'password' => $_REQUEST['password'],
                'password2' => $_REQUEST['password2']
            );
            $user = $db->selectAll('user', "email = '" . $arrayFields['email'] . "'");

            if (isset($user)) {

                $errors['email'] = 'User with this email already registered';
            }

            if ($arrayFields['password'] != $arrayFields['password2'])
                $errors['password2'] = 'Passwords do not match';

            if (empty($errors)) {

                $array = array('success');
                echo json_encode($array);

                $db->insert('user', [$arrayFields['email'], password_hash($arrayFields['password'], PASSWORD_DEFAULT), $arrayFields['name']], 'email, password, name');
                $db->insert('profile', [$arrayFields['name']], 'name');
            } else {

                $array = array('text_error' => $errors);
                echo json_encode($array);
            }
        }
    }
}
