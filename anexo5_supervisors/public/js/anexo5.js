$(function() {






    $(".btnUpdateDocumento").on('click', function(event) {
        event.preventDefault();

        // $('#preguntaTexto,#respuestaTexto').val('');


        var canvas = document.getElementById("firma");

        console.log('data adm');

        console.log(canvas.toDataURL());

        $.post('public/inc/upload-sing.inc.php', { img: canvas.toDataURL() }, function(data) {

                $('#archivo').val(data);

                console.log('DATAAAAAAAAAAAAA');

            })
            .done(function() {
                console.log('here');
                $("#formAnexo5").trigger('submit');
            })

        return false;
    });


    //enviar formulario
    $("#formAnexo5").on('submit', function(event) {
        /* Act on the event */
        event.preventDefault();

        var url_supervisor = $('#archivo').val();

        var id_documento = $('#id_documento').val();

        $.ajax({
                type: 'POST',
                url: RUTA + 'anexo5/updateDocumento',
                data: {
                    'url_supervisor': url_supervisor,
                    'id_documento': id_documento
                }
            })
            .done(function(listas_rep) {

                console.log(listas_rep);

                $("#wrap").hide(0);
                $("#wrap1").hide(0);

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