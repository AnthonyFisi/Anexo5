$(document).ready(function() {

    tabEntrada();

    $('ul.tabs li a:first').addClass('active');
    $('.secciones article').hide();
    $('.secciones article:first').show();

    $('ul.tabs li a').click(function() {

        $('ul.tabs li a').removeClass('active');
        $(this).addClass('active');
        $('.secciones article').hide();

        var activeTab = $(this).attr('href');

        if (activeTab === "#tab1") {
            tabEntrada();
        }
        console.log('TAB');
        console.log(activeTab)
        $(activeTab).show();
        return false;
    });



    function tabEntrada() {


        var trs = $("#table_entrada tr").length;
        for (i = 1; i < trs; i++) {
            $("#table_entrada tr:last").remove();
        }

        var id_estado = 2;

        $.ajax({
                type: 'POST',
                url: RUTA + 'panel/getListEntrada',
                data: { 'id': id_estado }
            })
            .done(function(listas_rep) {

                console.log(listas_rep);

                var employee_data = '';

                $.each(JSON.parse(listas_rep), function(indexInArray, valueOfElement) {

                    employee_data += '<tr class="active-row">';
                    employee_data += '<td class="id">' + valueOfElement.id + '</td>';
                    employee_data += '<td class="dni">' + valueOfElement.dni_trabajador + '</td>';
                    employee_data += '<td class="nombre">' + valueOfElement.nombre_trabajador + '</td>';
                    employee_data += '<td class="cargo">' + valueOfElement.cargo_trabajador + '</td>';


                    const fecha_contrato = valueOfElement.fecha_contrato.replace(/\s/g, 'T');
                    const fecha_documento = valueOfElement.fecha_documento.replace(/\s/g, 'T');


                    var url = 'id=' + valueOfElement.id +
                        '&dni=' + valueOfElement.dni_trabajador +
                        '&nombre=' + valueOfElement.nombre_trabajador.replace(/\s/g, '99') +
                        '&cargo=' + valueOfElement.cargo_trabajador.replace(/\s/g, '99') +
                        '&url_firma=' + valueOfElement.url_firma_trabajador +
                        '&fecha_contrato=' + fecha_contrato +
                        '&fecha_documento=' + fecha_documento +
                        '&usuario=' + valueOfElement.cod_usuario +
                        '&fecha_traba=' + valueOfElement.fecha_firma_trabajador +
                        '&fecha_super=' + valueOfElement.fecha_firma_supervisor;

                    var data = '<a href=http://localhost/anexo5/anexo5_supervisors/anexo5?' + url + '>Detalle</a>';


                    employee_data += '<td> ' + data + '</td>';
                    console.log('<td> ' + data + '</a></td>');

                    employee_data += '<tr>';

                });

                var todo = '<tbody>' + employee_data + '</tbody>';

                $('#table_entrada').append(todo);


            })
            .fail(function() {
                alert('Hubo un errror al cargar las listas_rep')
            });
    }





});