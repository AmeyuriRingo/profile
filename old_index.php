<?php
require_once "includes/config.php";

$users = mysqli_query($connection, "SELECT `email`, `password` FROM `user` WHERE `email` = '" . $_REQUEST['email'] . "' AND `password` = '" . $_REQUEST['password'] . "'");
if ( isset($_REQUEST['do_login']) ) {

    if ( mysqli_num_rows($users) != 0 ) {

        $username = mysqli_query($connection, "SELECT `name`, `id` FROM `user` WHERE `email` = ('". $_REQUEST['email'] ."')");
        $name = mysqli_fetch_assoc($username);
        header("Location: profile.php?id=" . $name['id'] . "&name=" . $name['name'] . "");
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <title>Solution</title>
</head>

<body>
<div class="container">
    <div class="wrap">
        <div class="row">
            <div class="col-lg-5">
                <div class="op">
                    <form class="formBorder" method="POST" action="index.php" novalidate>

                        <div class="form-group">
                            <h3>Register</h3>
                            <?php

                            if ( isset($_REQUEST['do_register']) ) {

                                $errors = array();

                                if ( $_REQUEST['name'] == '' ) {

                                    $errors[] = 'Enter your name!';
                                }
                                if ( $_REQUEST['password'] == '' ) {

                                    $errors[] = 'Enter your password!';
                                }
                                if ( $_REQUEST['email'] == '' ) {

                                    $errors[] = 'Enter your email!';
                                }

                                $email = mysqli_query($connection, "SELECT `email` FROM `user` WHERE `email` = '" . $_REQUEST['email'] . "'");
                                if (mysqli_num_rows($email) != 0) {

                                    $errors[] = 'User with this email is already registered!';
                                }
                                if ( empty($errors) ) {

                                    mysqli_query($connection, "INSERT INTO `user` (`email`, `password`, `name`) VALUES ('". $_REQUEST['email'] ."', '". $_REQUEST['password'] ."', '". $_REQUEST['name'] ."')");
                                    mysqli_query($connection, "INSERT INTO `profile` (`name`) VALUES ('". $_REQUEST['name'] ."')");
                                    echo '<span style="color: green; font-weight: bold; margin-bottom: 10px; display: block;"><hr>' . 'User successfully registered.' . '<hr>' . '</span>';
                                } else {

                                    echo '<span style="color: red; font-weight: bold; margin-bottom: 10px; display: block;"><hr>' . $errors['0'] . '<hr></span>';
                                }
                            }
                            ?>
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                   placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="text" name="name" class="form-control" id="inputName" placeholder="IvanIvanov">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form__group">
                            <button type="submit" name="do_register" class="btn btn-primary">Register</button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="col-lg-5 offset-2 boxWrap">
                <form class="formBorder" method="POST" novalidate>
                    <div class="form-group">
                        <h3>Sign In</h3>
                        <?php
                        if ( isset($_REQUEST['do_login']) ) {

                            $email = mysqli_query($connection, "SELECT `email` FROM `user` WHERE `email` = '" . $_REQUEST['email'] . "'  AND `password` = '" . $_REQUEST['password'] . "'");
                            if (mysqli_num_rows($email) == 0) {

                                echo '<span style="color: red; font-weight: bold; margin-bottom: 10px; display: block;"><hr>' . 'Unable to log in. Please check the correctness of the login or password.' . '<hr>' . '</span>';
                            }
                        }
                        ?>
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <button type="submit" name="do_login" class="btn btn-primary">Sign In</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--  <div class="overlay fade" id="successModal">-->
<!--		<div class="popup">-->
<!--			<div class="popup-close" id="closeModal">&times;</div>-->
<!--			<div class="popup-title">-->
<!--				Спасибо за заявку!-->
<!--			</div>-->
<!--			<div class="popup-form">-->
<!--				<div style="display:flex;justify-content:center;align-items:center;">-->
<!--					<img src="img/Shamrock.png" alt="Success!">-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--  </div>-->

<!--  <script src="script/bundle.js"></script>-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>