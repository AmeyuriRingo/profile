$(document).ready(function () {

    $("#register-form").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            name: {
                required: true,
                minlength: 3
            },
            password: {
                required: true,
                minlength: 6
            },
            password2: {
                required: true,
                minlength: 6,
                equalTo: "#password"
            }
        }
    });

    $("#do_register").on("click", function () {

        let data = $("#register-form").serialize();

        $('.error-display').hide();

        $.ajax({
            type: "POST",
            url: "/profile/register/form",
            dataType: "json",
            data: data,
            beforeSend: function () {

                $("#do_register").prop("disable", true);
            },
            success: function (data) {

                if (data.result == 'success') {
                    window.location = 'http://localhost/profile/login';
                    alert('User successfully registered, please, sign in');
                } else {
                    for (let errorField in data.text_error) {
                        let error = $('#' + errorField + '_error')
                        error.html(data.text_error[errorField]);
                        error.show();
                    }
                }
                $("#do_register").prop("disable", false);
            },
            error: function () {
                alert("Server error");
            }
        })
        return false;
    });
});