$(document).ready(function() {
    $("#do_register").on("click", function () {

        var validEmail = $("#email").val().trim();
        var validName = $("#name").val().trim();
        var validPassword = $("#password").val().trim();
        var validPassword2 = $("#password2").val().trim();

        if ( validEmail == "" ) {
            $("#errorMess").text('Enter email')
            return false;
        } else if ( validName == "" ) {
            $("#errorMess").text('Enter name')
            return false;
        } else if ( validPassword == "" ) {
            $("#errorMess").text('Enter password')
            return false;
        } else if ( validPassword2 == "" ) {
            $("#errorMess").text('Enter password2')
            return false;
        }

        console.log(validEmail);
        console.log(validName);
        console.log(validPassword);
        console.log(validPassword2);
        $("#errorMess").text('');

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
            },
            success: function (data) {

                alert(data);
                // if(data.result == 'success'){
                //     //console.log(data.result);
                //     alert('User successfully registered');
                // } else {
                //
                //     alert('sasasassaasasasa')
                // }
                $("#do_register").prop("disable", false);
            },
            error: function (data) {


            }
        })
    });
});
//     $('#form').submit(function(){
//         // убираем класс ошибок с инпутов
//         $('input').each(function(){
//             $(this).removeClass('error_input');
//         });
//         // прячем текст ошибок
//         $('.error').hide();
//
//         $.ajax({
//             type: "POST",
//             url: "../profile/controllers/register_controller.php",
//             dataType: "json",
//             // действие, при ответе с сервера
//             success: function(data){
//                 console.log(data);
//
//                 if(data.result == 'success'){
//                     console.log(data.result);
//                     alert('User successfully registered');
//                 } else {
//                     // for(var errorField in data.text_error){
//                     //     // выводим текст ошибок
//                     //     $('#'+errorField+'_error').html(data.text_error[errorField]);
//                     //     console.log('sdsdsdsddsdsdsdsdsds');
//                     //     // показываем текст ошибок
//                     //     $('#'+errorField+'_error').show();
//                     //     // обводим инпуты красным цветом
//                     //     $('#'+errorField).addClass('error_input');
//                     // }
//                 }
//             },
//             error: function (data) {
//                 console.log('23435345s');
//
//                 console.log(data)
//             }
//         });
//         return false;
//     });
// });