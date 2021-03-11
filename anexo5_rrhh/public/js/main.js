$(function(){
    $("#callReportes").on("click", function (e) {
        e.preventDefault();

        $("#modalReporte").fadeIn();

        return false;
    });

    $("#closeReporte").on("click", function (e) {
        e.preventDefault();

        $("#modalReporte").fadeOut();

        return false;
    });
})
