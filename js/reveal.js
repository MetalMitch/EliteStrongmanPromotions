$(function () {
    $(document).ready(function () {
        $('.flexslider').flexslider({
            animation: "fade",
            slideshowSpeed: 4000,
            animationSpeed: 600,
            controlNav: false,
            directionNav: true,
            controlsContainer: ".flex-container" // the container that holds the flexslider
        });
    });
});
function passwordReveal() {
    var x = document.getElementById("passwordfield");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}