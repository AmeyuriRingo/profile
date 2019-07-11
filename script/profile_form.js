$(document).ready(function () {
    $("#update").on("click", function () {

        var contacts = $("#contacts").val().trim();
        var education = $("#education").val().trim();
        var work_experience = $("#work_experience").val().trim();
        var skills = $("#skills").val().trim();

        $.ajax({
            type: "POST",
            url: "../profile/controllers/profile_controller.php",
            dataType: "json",
            data: {
                'contacts': contacts,
                'education': education,
                'work_experience': work_experience,
                'skills': skills
            },
            success: function (data) {

                if (data.result == 'success') {
                    alert('Profile successfully updated');
                } else {
                    alert('Updating error');
                }
            },
            error: function (data) {
                console.log(data);
                alert("Server error");
            }
        })
        return false;
    });
});