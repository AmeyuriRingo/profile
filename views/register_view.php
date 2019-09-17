<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="../profile/css/main.css">
    <title>Solution</title>
</head>

<body>
<form class="register-form" method="POST" id="register-form" novalidate>
    <div class="form-group">
        <h3>Sign Up</h3>

        <label for="email">Email address</label>
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
               placeholder="Enter email" required>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        <label id="email_error" class="error-display"></label>
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" required>
        <label id="name_error" class="error-display"></label>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password"
               placeholder="Password(at least 6 characters)" required>
        <label id="password_error" class="error-display"></label>
    </div>
    <div class="form-group">
        <label for="password2">Password</label>
        <input type="password" name="password2" class="form-control" id="password2" placeholder="Confirm the password"
               required>
        <label id="password2_error" class="error-display"></label>
    </div>
    <div class="form-group">
        <button type="submit" id="do_register" name="do_register" class="btn btn-primary">Register</button>
        <br>
        <a href="login">Already have an account?</a>
    </div>
</form>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../profile/script/jquery.validate.min.js"></script>
<script src="../profile/script/register_form.js"></script>
</body>

</html>