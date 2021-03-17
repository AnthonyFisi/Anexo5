//var RUTA = "http://ssma.sepcon.net/anexo5/anexo5_supervisors/";
var RUTA = "http://localhost/anexo5/anexo5_supervisors/";


function mostrarMensaje(clase, mensaje) {
    $(".mensaje span")
        .empty()
        .text(mensaje);

    $(".mensaje")
        .removeClass('msj_error msj_correcto msj_info ')
        .addClass(clase)
        .css('right', '0');

    setTimeout(function() {
        $(".mensaje")
            .css('right', "-100%");
    }, 2500);
}

function previewImg(event) {
    $('.img').css("display", "block");
    $('#img_preview').attr('src', event.target.result)
        .attr('width', '300px')
        .attr('height', '250px');
};