$(function() {

    $("#message").hide(0);
    $("#div-supervisor").hide();


    $(".btnUpdateDocumento").on('click', function(event) {
        event.preventDefault();


        var fecha = $('#fecha').val();

        var dni = $('#dni_supervisor').val();

        var nombre = $('#nombre_supervisor').val();

        var id_documento = $('#id_documento').val();

        console.log('COMPROBANDO DATOS')

        console.log(fecha + " " + dni + " " + nombre + " " + id_documento);

        $.ajax({
                type: 'POST',
                url: RUTA + 'panel/updateDocumento',
                data: {
                    'dni_supervisor': dni,
                    'nombre': nombre,
                    'fecha_contrato': fecha,
                    'id_documento': id_documento
                }
            })
            .done(function(listas_rep) {

                /*  $("#wrap").hide(0);
                  $("#wrap1").hide(0);

                  $("#div-supervisor").hide();*/
                $("#conten-data").hide();

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
    });


    $(".envio_exitoso").hide(0);
    $(".envio_fallo").hide(0);


    $("#btnBuscarDni").on('click', function(event) {
        event.preventDefault();

        var dni_html = $('#dni_entrada').val();

        $.ajax({
                type: 'POST',
                url: RUTA + "panel/getTrabajadorByDni",
                data: { 'dni': dni_html }
            })
            .done(function(listas_rep) {


                var trs = $("#supervisor_table tr").length;
                for (i = 1; i < trs; i++) {
                    $("#supervisor_table tr:last").remove();
                }

                console.log(listas_rep);

                if (listas_rep.length > 0) {
                    $("#div-supervisor").show();
                    $("#message").hide(0);
                    $("#dni_entrada").val("");
                    $(".envio_exitoso").hide(0);
                    $(".envio_fallo").hide(0);

                    var obj_trabajador = JSON.parse(listas_rep);

                    console.log(obj_trabajador);
                    var employee_data = '';

                    $('#dni_supervisor').val(obj_trabajador.dni);

                    $('#nombre_supervisor').val((obj_trabajador.nombres + " " + obj_trabajador.apellidos));

                    $('#id_documento').text();





                    employee_data += '<tbody> <tr class="open">';
                    employee_data += '<td>' + obj_trabajador.dni + '</td>';
                    employee_data += '<td>' + (obj_trabajador.nombres + " " + obj_trabajador.apellidos) + '</td>';
                    employee_data += '<td> ' + obj_trabajador.dcargo + '</td>';
                    employee_data += '<td> ' + obj_trabajador.correo + '</td>';
                    employee_data += '<tr> </tbody>';



                    $('#supervisor_table').append(employee_data);



                } else {

                    $("#dni_entrada").val("");
                    $("#message").show("slow");
                    $("#div-supervisor").hide();
                }


            })


        return false

    });

})