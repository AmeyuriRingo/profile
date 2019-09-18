<?php

namespace controllers;

require_once "../profile/core/model.php";
global $db;
use core\DBClass as db;
$db = new db();

class ProfileController
{
//    /**
//     * ProfileController constructor.
//     */
//    public function __construct()
//    {
////        $this->contacts();
////        $this->education();
////        $this->workExperience();
////        $this->skills();
//    }

    public function contacts()
    {
        global $db;
        if (isset($_SESSION['user_id'])){

            $id = $_SESSION['user_id'];
            $contacts = $db->selectOne('contacts', 'profile', "id = '" . $id . "'");
            return $contacts;
        }

    }

    public function education()
    {
        global $db;
        if (isset($_SESSION['user_id'])){

            $id = $_SESSION['user_id'];
            $education = $db->selectOne('education', 'profile', "id = '" . $id . "'");
            return $education;
        }
    }

    public function workExperience()
    {
        global $db;
        if (isset($_SESSION['user_id'])){

            $id = $_SESSION['user_id'];
            $workExperience = $db->selectOne('experience', 'profile', "id = '" . $id . "'");
            return $workExperience;
        }

    }

    public function skills()
    {
        global $db;
        if (isset($_SESSION['user_id'])){

            $id = $_SESSION['user_id'];
            $skills = $db->selectOne('skills', 'profile', "id = '" . $id . "'");
            return $skills;
        }
    }

    public function user()
    {
        global $db;
        if (isset($_SESSION['user_id'])){

            $id = $_SESSION['user_id'];
            $user = $db->selectAll('user', "id = '" . $id . "'");
            return $user;
        } else {

            return "User is not authorized, please, sign in or sign up!";
        }
    }

    public function update()
    {
        global $db;
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

            if (!isset($_SESSION['user_id']))
                die();
            else
                $id = $_SESSION['user_id'];

            $arrayFields = array(
                'contacts' => $_REQUEST['contacts'],
                'education' => $_REQUEST['education'],
                'work_experience' => $_REQUEST['work_experience'],
                'skills' => $_REQUEST['skills']
            );
            if (isset($arrayFields)) {

                $array = array('success');
                echo json_encode($array);

                if ($arrayFields['contacts'] != "") {

                    $db->update('profile', 'contacts', $arrayFields['contacts'], 'id = ' . $id);
                }
                if ($arrayFields['education']  != "") {

                    $db->update('profile', 'education', $arrayFields['education'], 'id = ' . $id);
                }
                if ($arrayFields['work_experience']  != "") {

                    $db->update('profile', 'experience', $arrayFields['work_experience'], 'id = ' . $id);
                }
                if ($arrayFields['skills']  != "") {

                    $db->update('profile', 'skills', $arrayFields['skills'], 'id = ' . $id);
                }
            } else {

                $array = array('error');
                echo json_encode($array);
            }
        }
    }
}