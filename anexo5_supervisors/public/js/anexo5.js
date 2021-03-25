$(function() {

    $(".loader").hide();

    $("#btnRegister").on('click', function(event) {
        event.preventDefault();



        var canvas = document.getElementById("firma");


        $("#wrap").hide(0);
        $("#wrap1").hide(0);


        $.post('public/inc/upload-sing.inc.php', { img: canvas.toDataURL() }, function(data) {

                $('#archivo').val(data);


            })
            .done(function() {
                $("#formAnexo5").trigger('submit');
            })

        return false;
    });


    //enviar formulario
    $("#formAnexo5").on('submit', function(event) {
        /* Act on the event */
        event.preventDefault();

        var str = $(this).serialize();

        var url_supervisor = $('#archivo').val();

        var id_documento = $('#id_documento').val();

        var nombre_trabajador = $('#nombre_trabajador').val();

        var cargo_trabajador = $('#cargo_trabajador').val();

        var url_firma = $('#url_firma').val();

        var fecha_contrato = $('#fecha_contrato').val();

        var fecha_documento = $('#fecha_documento').val();

        var usuario = $('#usuario').val();

        var fecha_traba = $("#fecha_traba").val();

        var dni_trabajador = $("#dni_trabajador").val();

        //  var fecha


        $(".loader").show();

        $.ajax({
                type: 'POST',
                url: RUTA + 'anexo5/updateDocumento',
                data:
                //str

                {
                    'url_supervisor': url_supervisor,
                    'id_documento': id_documento,
                    'nombre_trabajador': nombre_trabajador.trim().replace(/99/g, ' '),
                    'cargo_trabajador': cargo_trabajador.trim().replace(/99/g, ' '),
                    'url_firma': url_firma.trim(),
                    'fecha_contrato': fecha_contrato.trim().split('T')[0],
                    'fecha_documento': fecha_documento.trim().split('T')[0],
                    'usuario': usuario,
                    'dni_trabajador': dni_trabajador,
                    'fecha_firma_trabajador': fecha_traba
                }
            })
            .done(function(listas_rep) {


                $(".loader").hide();


                if (listas_rep === '1') {

                    $(".envio_exitoso").show("slow");
                } else {
                    $(".envio_fallo").show("slow");
                }


            })
            .fail(function() {
                alert('Hubo un errror al cargar las listas_rep')
            });



        return false;
    })



    $(".envio_exitoso").hide(0);
    $(".envio_fallo").hide(0);

})