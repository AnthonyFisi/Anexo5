$(function() {

    init();

    $("#btnRegister").on('click', function(event) {

        event.preventDefault();

        /*
         * Vamos a recuperar la firma del formulario y convertir en tipo .png y para eso iremos a public/public/inc/upload-sing.inc.php el cual nos va retornar la URL de la imagen
         */

        $("#wrap").hide(0);
        $(".loader").show();


        var canvas = document.getElementById("firma");

        var trabajador = $("#trabajador").text();

        $.post('public/inc/upload-sing.inc.php', { img: canvas.toDataURL(), nombreyapellido: trabajador }, function(data) {

                console.log(data)
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

        console.log('DATA ENVIADA');
        console.log(str);




        $.post(RUTA + 'anexo5/grabarDocumento', str, function(data, textStatus, xhr) {

            $(".loader").hide();

            console.log('result');
            console.log(data);




            //mostrarMensaje("msj_correcto", "Registrado Correctamente");
            $("#formAnexo5").trigger("reset");
            $("#draw-clearBtn").trigger("click");
            $("#draw-clearBtn1").trigger("click");
            $("#dni_trabajador_entrada").val("");
            $("#dni_supervisor_entrada").val("");


            if (data === '1') {
                $(".envio_exitoso").show("slow");
                console.log('ESTOY APARECICNEOD')
            } else {
                $(".envio_fallo").show("slow");
                console.log('ESTOY APARECICNEOD')

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

        var dni_html = $('#dni_trabajador_entrada').val();
        var dni_supervisor = $('#dni_supervisor_entrada').val();

        $("#message_supervisor").hide();
        $("#message_trabajador").hide();
        $("#divDni").hide(0);
        $(".loader").show();


        $.ajax({
                type: 'POST',
                url: RUTA + "anexo5/getTrabajadorByDni",
                data: { 'dni_trabajador': dni_html, 'dni_supervisor': dni_supervisor }
            })
            .done(function(listas_rep) {

                $(".loader").hide();
                console.log('DATAAAAAAAAAAAAAAAAA')
                console.log(listas_rep);

                if (listas_rep != '0' && listas_rep != '1') {

                    $("#divDni").hide(0);

                    $("#wrap").show("slow");

                    $(".envio_exitoso").hide(0);
                    $(".envio_fallo").hide(0);

                    var obj_trabajador = JSON.parse(listas_rep);
                    var nombres = obj_trabajador.nombres + " " + obj_trabajador.apellidos;

                    $("#trabajador").text(nombres);
                    $("#ocupacion").text(obj_trabajador.dcargo);
                    $("#fecha_ingreso").text(obj_trabajador.fecha_ingreso);
                    $("#usuario").text(obj_trabajador.usuario);
                    // $(".dni_trabajador").text(obj_trabajador.dni);

                    nombres_supervisor = obj_trabajador.nombres_supervisor + " " + obj_trabajador.apellidos_supervisor;


                    $(".dni_trabajador").text(obj_trabajador.dni);
                    $(".nombre_trabajador").text(nombres);

                    $(".dni_supervisor").text(obj_trabajador.dni_supervisor);
                    $(".nombre_supervisor").text(nombres_supervisor);

                    // $("#nomape_supervisor").text(nombres_supervisor);

                    /**
                     * VALORES ALMACENADOS
                     */
                    $("#val_usuario").val(obj_trabajador.usuario);
                    $(".dni_trabajador").val(obj_trabajador.dni);
                    $(".nombre_trabajador").val(nombres);
                    $("#cargo_trabajador").val(obj_trabajador.dcargo);

                    $("#val_fecha_ingreso").val(obj_trabajador.fecha_ingreso);
                    $(".dni_supervisor").val(obj_trabajador.dni_supervisor);
                    $(".nombre_supervisor").val(nombres_supervisor);

                } else {

                    $("#divDni").show();


                    if (listas_rep === '1') {
                        $("#message_trabajador").show("slow");
                    }

                    if (listas_rep === '0') {
                        $("#message_supervisor").show("slow");
                    }

                    $("#wrap").hide(0);
                    $("#dni_trabajador_entrada").val("");
                    $("#dni_supervisor_entrada").val("");
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
        $("#message_trabajador").hide(0);
        $("#message_supervisor").hide(0);
        $(".loader").hide();
        $(".envio_exitoso").hide(0);
        $(".envio_fallo").hide(0);
    }




})