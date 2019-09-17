<?php

require_once "/Library/WebServer/Documents/profile/controllers/profile_controller.php";
$profileController = new controllers\ProfileController();
$user = $profileController->user();
$contacts = $profileController->contacts();
$education = $profileController->education();
$workExperience = $profileController->workExperience();
$skills = $profileController->skills();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Profile</title>
    <link rel="stylesheet" href="../profile/css/style.css">
</head>

<body>
<div class="full bg-dark text-white">
    <header>
        <div class="menu">
            <ul class="nav nav-pills justify-content-end">
                <li class="nav-item">
                    <?php
                    if (isset($user[0]['name'])) {
                        echo '<a class="nav-link active" name="sign_out" href="http://localhost/profile/login">Sign Out</a>';
                    } else {
                        echo '<a class="nav-link active" name="sign_out" href="http://localhost/profile/register">Sign Up</a>';
                    }
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                    if (!isset($user[0]['name']))
                        echo '<a class="nav-link active" name="sign_out" href="http://localhost/profile/login">Sign In</a>';
                    ?>
                </li>
            </ul>
        </div>

    </header>
    <main>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6 align-self-center">
                    <h1><?php
                        if (isset($user[0]['name'])){
                            echo 'Hello, ' . $user[0]['name'] . '!';
                        } else {
                            echo $user;
                        } ?>
                    </h1>
                </div>
                <div class="col-2">
                    <i class="fas hover-ifect fa-edit" data-toggle="modal" data-target="#exampleModal"></i>
                </div>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="profile-form" action="" >
                                <label>Update your profile data</label>
                                <div class="form-group">
                                    <label>Contacts</label>
                                    <input type="text" name="contacts" class="form-control" id="contacts" placeholder="Contacts" value="<?php if ($contacts[0]['contacts'] != null) echo $contacts[0]['contacts'];?>">
                                </div>
                                <div class="form-group">
                                    <label>Education</label>
                                    <input type="text" name="education" class="form-control" id="education" placeholder="Education" value="<?php if ($education[0]['education'] != NULL) echo $education[0]['education'];?>">
                                </div>
                                <div class="form-group">
                                    <label>Work experience</label>
                                    <input type="text" name="work_experience" class="form-control" id="work_experience" placeholder="Experience" value="<?php if ($workExperience[0]['experience'] != null) echo $workExperience[0]['experience'];?>">
                                </div>
                                <div class="form-group">
                                     <label>Skills</label>
                                    <input type="text" name="skills" class="form-control" id="skills" placeholder="Skills" value="<?php if ($skills[0]['skills'] != null) echo $skills[0]['skills'];?>">
                                </div>
                                <div class="form-group">
                                    <button type="submit" id="update" name="update" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row beck">
                <div class="col">
                    <div class="d-flex flex-column bd-highlight">
                        <div class="p-2 bd-highlight">
                            <h2>Contacts</h2>
                            <?php
                            if ($contacts[0]['contacts'] == null) {

                                echo 'Place here your contacts';
                            } else {

                                echo $contacts[0]['contacts'];
                            } ?>
                        </div>
                        <div class="p-2 bd-highlight">
                            <h2>Education</h2>
                            <?php
                            if ($education[0]['education'] == NULL) {

                                echo 'Place here your education level';
                            } else {

                                echo $education[0]['education'];
                            } ?>
                        </div>

                    </div>
                </div>
                <div class="col">
                    <div class="d-flex flex-column bd-highlight mb-3">
                        <div class="p-2 bd-highlight">
                            <h2>Work Experience</h2>
                            <?php
                            if ($workExperience[0]['experience'] == NULL) {

                                echo 'Place here your work experience';
                            } else {

                                echo $workExperience[0]['experience'];
                            } ?>
                        </div>
                        <div class="p-2 bd-highlight">
                            <h2>Skills</h2>
                            <?php
                            if ($skills[0]['skills'] == NULL) {

                                echo 'Place here your skills';
                            } else {

                                echo $skills[0]['skills'];
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../profile/script/profile_form.js"></script>
</body>

</html>