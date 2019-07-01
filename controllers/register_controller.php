<?php
namespace controllers;

$registerController = new RegisterController();
$registerController->register();

class RegisterController
{
    public function register()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

            require_once "/Library/WebServer/Documents/profile/core/model.php";
            $db = new DBClass(SERVER, USER, PASS, DBNAME);
            $user = $db->select('email', 'user');
            $errors = array();
            $arrayFields = array(
                'name' => $_REQUEST['validName'],
                'email' => $_REQUEST['validEmail'],
                'password' => $_REQUEST['validPassword'],
                'password2' => $_REQUEST['validPassword2']
            );

            if ( $user[0]['email'] == $arrayFields['email'] ) {
                $errors['email'] = 'User with this email already registered';
            }
            if ($arrayFields['email'] == '') {
                $errors['email'] = 'Required field';
            } elseif (!filter_var($arrayFields['email'], FILTER_VALIDATE_EMAIL))
                $errors['email'] = 'Email is incorrect';

            if ($arrayFields['name'] == '') {
                $errors['name'] = 'Required field';
            } elseif (iconv_strlen($arrayFields['name']) < 4)
                $errors['name'] = 'Name must be more than 4 characters';

            if (iconv_strlen($arrayFields['password']) < 6) {

                $errors['password'] = 'Password must be more than 6 characters';
            }

            if ($arrayFields['password'] != $arrayFields['password2'])
                    $errors['password2'] = 'Passwords do not match';

            if (empty($errors)) {

                $array = array('result' => 'success');
                echo json_encode($array);

                $db->insert('user', [$arrayFields['email'], $arrayFields['password'], $arrayFields['name']], 'email, password, name');
                $db->insert('profile', [$arrayFields['name']], 'name');
                $db->closeConnection();
            } else {

                $array = array('result' => 'error', 'text_error' => $errors);
                echo json_encode($array);
            }
        }
    }
}

