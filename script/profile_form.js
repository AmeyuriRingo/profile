$(document).ready(function () {
    $("#update").on("click", function () {

        let data = $("#profile-form").serialize();

        $.ajax({
            type: "POST",
            url: "/profile/form",
            dataType: "json",
            data: data,
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