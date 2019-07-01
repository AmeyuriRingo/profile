$(document).ready(function () {
    $("#do_login").on("click", function () {

        var validEmail = $("#email").val().trim();
        var validPassword = $("#password").val().trim();

        $('.error').hide();

        $.ajax({
            type: "POST",
            url: "../profile/controllers/login_controller.php",
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
                    alert('User successfully signed in');
                    window.location = "http://localhost/profile/";
                } else {
                    for (var errorField in data.text_error) {
                        $('#' + errorField + '_error').html(data.text_error[errorField]);
                        $('#' + errorField + '_error').show();
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