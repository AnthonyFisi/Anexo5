$(function() {

    init();

    $("#btnRegister").on('click', function(event) {

        event.preventDefault();

        /*
         * Vamos a recuperar la firma del formulario y convertir en tipo .png y para eso iremos a public/public/inc/upload-sing.inc.php el cual nos va retornar la URL de la imagen
         */

        var canvas = document.getElementById("firma");

        var trabajador = $("#trabajador").text();

        $.post('public/inc/upload-sing.inc.php', { img: canvas.toDataURL(), nombreyapellido: trabajador }, function(data) {

                $('#archivo').val(data);

            })
            .done(function() {

                $("#formAnexo5").trigger('submit');

            })


        return false;

    });

    /*
        Enviamos los datos del formulario del anexo hacia controller/anexo5/grabarDocumento
    */
    $("#formAnexo5").on('submit', function(event) {
        /* Act on the event */
        event.preventDefault();
        var str = $(this).serialize();


        $.post(RUTA + 'anexo5/grabarDocumento', str, function(data, textStatus, xhr) {

            console.log('result');
            console.log(data);

            $("#wrap").hide(0);

            //mostrarMensaje("msj_correcto", "Registrado Correctamente");
            $("#formAnexo5").trigger("reset");
            $("#draw-clearBtn").trigger("click");
            $("#draw-clearBtn1").trigger("click");
            $("#dni_entrada").val("");


            if (data === '1') {
                $(".envio_exitoso").show("slow");
                $("#divDni").show("slow");
            } else {
                $(".envio_fallo").show("slow");
                $("#divDni").show("slow");
            }

        });



        return false;
    })


    /*
        Realizamos la busqueda del trabajador a traves del DNI 
        Enviaremos el DNI hacia  controller/anexo5/getTrabajador el cual nos va retornar los datos necesarios del trabajador
    */

    $("#btnBuscarDni").on('click', function(event) {
        event.preventDefault();

        var dni_html = $('#dni_entrada').val();

        $.ajax({
                type: 'POST',
                url: RUTA + "anexo5/getTrabajadorByDni",
                data: { 'dni': dni_html }
            })
            .done(function(listas_rep) {

                console.log(listas_rep);

                if (listas_rep.length > 0) {
                    $("#divDni").hide(0);

                    $("#wrap").show("slow");
                    $("#message").hide(0);
                    $("#dni_entrada").val("");
                    $(".envio_exitoso").hide(0);
                    $(".envio_fallo").hide(0);

                    var obj_trabajador = JSON.parse(listas_rep);
                    var nombres = obj_trabajador.nombres + " " + obj_trabajador.apellidos;
                    $("#trabajador").text(nombres);
                    $("#ocupacion").text(obj_trabajador.dcargo);


                    $("#dni_trabajador").val(obj_trabajador.dni);
                    $("#nombre_trabajador").val(nombres);
                    $("#cargo_trabajador").val(obj_trabajador.dcargo);

                } else {

                    $("#wrap").hide(0);
                    $("#dni_entrada").val("");
                    $("#message").show("slow");
                }


            })


        return false

    });

    $("#btnCancelar").on('click', function(event) {
        event.preventDefault();
        $("#divDni").show("slow");
        $("#wrap").hide(0);

    });

    //Nos protegemos del doble click que se realiza en el btnBuscarDni
    var divdbl = $("#btnBuscarDni").first();
    divdbl.dblclick(function() {
        $("#wrap").hide(0);
    });



    /**
     * Iniciamos el anexo5/main ocultando los elementos del formulario y los mensaje de error/exitoso
     */

    function init() {

        $("#wrap").hide(0);
        $("#message").hide(0);
        $(".envio_exitoso").hide(0);
        $(".envio_fallo").hide(0);
    }




})