$(document).ready(function() {

    tabEspera();

    $('ul.tabs li a:first').addClass('active');
    $('.secciones article').hide();
    $('.secciones article:first').show();

    $('ul.tabs li a').click(function() {

        $('ul.tabs li a').removeClass('active');
        $(this).addClass('active');
        $('.secciones article').hide();

        var activeTab = $(this).attr('href');

        if (activeTab === "#tab1") {
            //   tabEntrada1();
        }
        if (activeTab === "#tab2") {
            tabEspera();
        }
        if (activeTab === "#tab3") {
            tabListo();
        }
        console.log('TAB');
        console.log(activeTab)
        $(activeTab).show();
        return false;
    });






    function tabEspera() {


        var trs = $("#table_espera tr").length;
        for (i = 1; i < trs; i++) {
            $("#table_espera tr:last").remove();
        }

        var id_estado = 2;

        $.ajax({
                type: 'POST',
                url: RUTA + 'panel/getLisaDocumentoByIdEstado',
                data: { 'id': id_estado }
            })
            .done(function(listas_rep) {

                console.log(listas_rep)

                var employee_data = '';

                $.each(JSON.parse(listas_rep), function(indexInArray, valueOfElement) {

                    employee_data += '<tr class="active-row">';
                    employee_data += '<td>' + valueOfElement.id + '</td>';
                    employee_data += '<td>' + valueOfElement.nombre_trabajador + '</td>';
                    employee_data += '<td>' + valueOfElement.cargo_trabajador + '</td>';
                    employee_data += '<td>' + valueOfElement.fecha_documento + '</td>';
                    employee_data += '<td>' + valueOfElement.nombre_supervisor + '</td>';


                    employee_data += '<tr>';

                });

                var todo = '<tbody>' + employee_data + '</tbody>';

                console.log(todo);

                $('#table_espera').append(todo);


            })
            .fail(function() {
                alert('Hubo un errror al cargar las listas_rep')
            });
    }


    function tabListo() {


        var trs = $("#table_listo tr").length;
        for (i = 1; i < trs; i++) {
            $("#table_listo tr:last").remove();
        }

        var id_estado = 3;

        $.ajax({
                type: 'POST',
                url: RUTA + 'panel/getLisaDocumentoByIdEstado',
                data: { 'id': id_estado }
            })
            .done(function(listas_rep) {

                console.log(listas_rep)

                var employee_data = '';

                $.each(JSON.parse(listas_rep), function(indexInArray, valueOfElement) {

                    employee_data += '<tr class="active-row">';
                    employee_data += '<td>' + valueOfElement.id + '</td>';
                    employee_data += '<td>' + valueOfElement.nombre_trabajador + '</td>';
                    employee_data += '<td>' + valueOfElement.cargo_trabajador + '</td>';

                    employee_data += '<td>' + valueOfElement.nombre_supervisor + '</td>';
                    //   employee_data += '<td>' + valueOfElement.url_pdf + '</td>';

                    employee_data += '<td>' + '<a class="ver-pdf" target="_blank" rel="noopener noreferrer"  href=' + valueOfElement.url_pdf + '>Ver</a>' + '<td>';

                    employee_data += '<tr>';

                });

                var todo = '<tbody>' + employee_data + '</tbody>';

                console.log(todo);

                $('#table_listo').append(todo);


            })
            .fail(function() {
                alert('Hubo un errror al cargar las listas_rep')
            });
    }



    /**
     * 
     *  MODIFY CODE
     * 
     */
    function tabEntrada1() {


        var trs = $("#table_entrada tr").length;
        for (i = 1; i < trs; i++) {
            $("#table_entrada tr:last").remove();
        }

        var id_estado = 1;

        $.ajax({
                type: 'POST',
                url: RUTA + 'anexo5/getLisaDocumentoByIdEstado',
                data: { 'id': id_estado }
            })
            .done(function(listas_rep) {

                var employee_data = '';

                $.each(JSON.parse(listas_rep), function(indexInArray, valueOfElement) {

                    employee_data += '<tr class="active-row">';
                    employee_data += '<td class="id">' + valueOfElement.id + '</td>';
                    employee_data += '<td class="dni">' + valueOfElement.dni_trabajador + '</td>';
                    employee_data += '<td class="nombre">' + valueOfElement.nombre_trabajador + '</td>';
                    employee_data += '<td class="cargo">' + valueOfElement.cargo_trabajador + '</td>';

                    /*
                                        var url = 'id=' + valueOfElement.id +
                                            '&dni=' + valueOfElement.dni_trabajador +
                                            '&nombre=' + valueOfElement.nombre_trabajador.replace(/\s/g, '99') +
                                            '&cargo=' + valueOfElement.cargo_trabajador.replace(/\s/g, '99') +
                                            '&url_firma=' + valueOfElement.url_firma_trabajador;*/

                    // var data = '<a href=http://localhost/anexo5_rrhh/panel/newView?' + url + '>Detalle</a>';
                    employee_data += '<td><button class="clickUp">Detalles</button></td>';

                    employee_data += '<tr>';

                });

                var todo = '<tbody>' + employee_data + '</tbody>';

                $('#table_entrada').append(todo);


            })
            .fail(function() {
                alert('Hubo un errror al cargar las listas_rep')
            });
    }


    $(".clickPopup").click(function() {


        $("#conten-data").show();

        var trs = $("#supervisor_table tr").length;
        for (i = 1; i < trs; i++) {
            $("#supervisor_table tr:last").remove();
        }

        $("#div-supervisor").hide();

        $("#popup-1").addClass("active");

        let id_documento = $(this).parents("tr").find(".id").text();
        let nombre = $(this).parents("tr").find(".nombre").text();
        let cargo = $(this).parents("tr").find(".cargo").text();
        let dni = $(this).parents("tr").find(".dni").text();

        //$(this).parents("tr")

        $("#id_documento").val(id_documento);
        $("#nombre_trabajador").val(nombre);
        $("#cargo_trabajador").val(cargo);
        $("#dni_trabajador").val(dni);


        var num_documento = "Documento #" + id_documento;

        $("#id_documento").text(num_documento);
        $("#nombre_trabajador").text(nombre);
        $("#cargo_trabajador").text(cargo);
        $("#dni_trabajador").text(dni);





    });


    $(".clickPopup-close").click(function() {

        $("#popup-1").removeClass("active");
    });




});