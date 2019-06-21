<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <title>Solution</title>
</head>

<body>
<div class="container">
    <div class="wrap">
        <div class="row">
            <div class="col-lg-5">
                <div class="op">
                    <form class="formBorder" method="POST" id="form" action="" novalidate>

                        <div class="form-group">
                            <h3>Register</h3>

                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            <label id="email_error" class="error"></label>
                        </div>
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" required>
                            <label id="name_error" class="error"></label>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password(at least 6 characters)" required>
                            <label id="password_error" class="error"></label>
                        </div>
                        <div class="form-group">
                            <label for="password2">Password</label>
                            <input type="password" name="password2" class="form-control" id="password2" placeholder="Confirm the password" required>
                            <label id="password2_error" class="error"></label>
                        </div>
                        <div class="form__group">
                            <button type="submit" id="do_register" name="do_register" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                    <div id="errorMess"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="result_form"></div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../profile/script/register_form.js"></script>
</body>

</html>