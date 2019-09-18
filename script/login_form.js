$(document).ready(function () {
    $("#login-form").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6
            }
        }
    });

    $("#do_login").on("click", function () {

        let data = $("#login-form").serialize();

        $('.error-display').hide();

        $.ajax({
            type: "POST",
            url: "/profile/login/form",
            dataType: "json",
            data: data,
            beforeSend: function () {

                $("#do_login").prop("disable", true);
            },
            success: function (data) {
                if (data == 'success') {
                    window.location = 'http://localhost/profile/';
                    alert('User successfully signed in');
                } else {
                    for (let errorField in data.text_error) {
                        let error = $('#' + errorField + '_error');
                        error.html(data.text_error[errorField]);
                        error.show();
                    }
                }
                $("#do_login").prop("disable", false);
            },
            error: function () {
                alert("Server error");
            }
        })
        return false;
    });
});