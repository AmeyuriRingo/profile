<?php
namespace controllers;

$registerController = new RegisterController();
$registerController->register();

class RegisterController
{

    public $model;
    public $view;

    function __construct()
    {
        //$this->view = new LoginView();
    }

    public function register() {

//        if (isset($_REQUEST['do_register'])) {
//        require_once "../profile/core/model.php";
//        $db = new DBClass(SERVER, USER, PASS, DBNAME);

            $errors = array();
            $arrayFields = array(
                'name' => $_POST['validName'],
                'email' => $_POST['validEmail'],
                'password' => $_POST['validPassword'],
                'password2' => $_POST['validPassword2']
            );

//            if ( isset($arrayFields['validName']) ) {

            foreach ($arrayFields as $fieldName => $oneField) {
                if ($oneField == '' || !isset($oneField)) {
                    $errors[$fieldName] = 'Required field';
                }
            }

            if (!filter_var($arrayFields['email'], FILTER_VALIDATE_EMAIL))
                $errors['email'] = 'Email is incorrect';

            if (iconv_strlen($arrayFields['name']) < 4)
                $errors['name'] = 'Name must be more than 4 characters';

            if (iconv_strlen($arrayFields['password']) < 6) {

                $errors['password'] = 'Password must be more than 6 characters';
            } else
                if ($arrayFields['password'] != $arrayFields['password2'])
                    $errors['password2'] = 'Passwords do not match';

            if (empty($errors)) {

//                $db->insert('user', [$arrayFields['email'],$arrayFields['password'], $arrayFields['name']], 'email, password, name');
//                $db->insert('profile', $arrayFields['name'], 'name');// тут name был в массиве
                $array = array('result' => 'success');
//                echo json_encode($array);
                //echo '<span style="color: green; font-weight: bold; margin-bottom: 10px; display: block;"><hr>' . 'User successfully registered.' . '<hr>' . '</span>';
            } else {

                $array = array('result' => 'error', 'text_error' => $errors);
//                echo json_encode($array);
                //echo '<span style="color: red; font-weight: bold; margin-bottom: 10px; display: block;"><hr>' . $errors['0'] . '<hr></span>';
            }

//            $db->closeConnection();
        }
//    }

//    function saveToDB($array) {
//
//        require_once "../profile/core/model.php";
//        $db = new DBClass(SERVER, USER, PASS, DBNAME);
//        $db->insert('user', 'asasas', 'email');
//
//    }
}

