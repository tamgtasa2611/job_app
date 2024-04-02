$(document).ready(function () {
    // ALERT
    setInterval(function () {
        $(".alert").addClass("opacity-0");
        setInterval(function () {
            $(".alert").fadeOut();
        }, 1000);
    }, 3000);

    // PASSWORD EYE
    $("#show_hide_password a").on("click", function (event) {
        event.preventDefault();
        if ($("#show_hide_password input").attr("type") == "text") {
            $("#show_hide_password input").attr("type", "password");
            $("#show_hide_password i").addClass("fa-eye-slash");
            $("#show_hide_password i").removeClass("fa-eye");
        } else if ($("#show_hide_password input").attr("type") == "password") {
            $("#show_hide_password input").attr("type", "text");
            $("#show_hide_password i").removeClass("fa-eye-slash");
            $("#show_hide_password i").addClass("fa-eye");
        }
    });

});
