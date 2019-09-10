$(document).ready(function () {
    $("#do_register").on("click", function () {

        let validEmail = $("#email").val().trim();
        let validName = $("#name").val().trim();
        let validPassword = $("#password").val().trim();
        let validPassword2 = $("#password2").val().trim();

        $('.error').hide();

        $.ajax({
            type: "POST",
            url: "/profile/register/form",
            dataType: "json",
            data: {
                'validEmail': validEmail,
                'validName': validName,
                'validPassword': validPassword,
                'validPassword2': validPassword2
            },
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