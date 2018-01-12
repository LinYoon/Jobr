var relUrl = window.location.pathname;
var splitUrl = relUrl.split("/");

if (splitUrl[splitUrl.length - 1] != "") {
    $(".navbar-default").css("background", "linear-gradient(to right, rgba(33,147,176,1) 0%,rgba(109,213,237,1) 100%)");
    $(".navbar-default").each(function () {
        this.style.setProperty( 'padding-top', '0', 'important' );
        this.style.setProperty( 'height', '70px', 'important' );
    });
}
