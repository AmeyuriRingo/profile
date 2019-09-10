$(document).ready(function () {
    $("#update").on("click", function () {

        let contacts = $("#contacts").val().trim();
        let education = $("#education").val().trim();
        let work_experience = $("#work_experience").val().trim();
        let skills = $("#skills").val().trim();

        $.ajax({
            type: "POST",
            url: "/profile/form",
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
            error: function () {
                alert("Server error");
            }
        })
        return false;
    });
});