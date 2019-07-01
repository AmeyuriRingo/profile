$(document).ready(function() {
    $("#do_register").on("click", function () {

        var validEmail = $("#email").val().trim();
        var validName = $("#name").val().trim();
        var validPassword = $("#password").val().trim();
        var validPassword2 = $("#password2").val().trim();

        $('.error').hide();

        $.ajax({
            type: "POST",
            url: "../profile/controllers/register_controller.php",
            dataType: "json",
            data: {
                'validEmail': validEmail,
                'validName': validName,
                'validPassword': validPassword,
                'validPassword2': validPassword2
            },
            beforeSend: function () {

                $("#do_register").prop("disable", true);
                window.location = "http://localhost/profile/";
            },
            success: function(data){

                if(data.result == 'success'){
                    alert('User successfully registered');
                } else {
                    for(var errorField in data.text_error){
                        $('#'+errorField+'_error').html(data.text_error[errorField]);
                        $('#'+errorField+'_error').show();
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