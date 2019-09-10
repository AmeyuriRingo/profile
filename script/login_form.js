$(document).ready(function () {
    $("#do_login").on("click", function () {

        let validEmail = $("#email").val().trim();
        let validPassword = $("#password").val().trim();

        $('.error').hide();

        $.ajax({
            type: "POST",
            url: "/profile/login/form",
            dataType: "json",
            data: {
                'validEmail': validEmail,
                'validPassword': validPassword,
            },
            beforeSend: function () {

                $("#do_login").prop("disable", true);
            },
            success: function (data) {
                if (data.result == 'success') {
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