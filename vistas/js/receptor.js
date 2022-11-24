var tabla;

function init() {

    listar();

    $("#receptor_form").on("submit", function (e)
    {

        guardaryeditar(e);
    })

    $("#add_button").click(function () {

        $(".modal-title").text("Agregar Receptor");

    });

}


function limpiar() {
    
   $("#TipoDocumento").val("");
   $("#Documento").val("");
   $("#Nombre").val("");
   $("#Apellido").val("");
   $("#Telefono").val("");
   $("#TipoEnvio").val("");
   $("#CodigoPostal").val("");
   $("#Direccion").val("");
   $("#Referencia").val("");
   $("#idReceptor").val("");
}


function listar() {

    tabla = $('#receptor_data').dataTable({

        "aProcessing": true,
        "aServerSide": true, 
        dom: 'Bfrtip', 
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf'
        ],

        "ajax":
                {
                    url: '../ajax/receptor.php?op=listar',
                    type: "get",
                    dataType: "json",
                    error: function (e) {
                        console.log(e.responseText);
                    }
                },

        "bDestroy": true,
        "responsive": true,
        "bInfo": true,
        "iDisplayLength": 10, 
        "order": [[0, "desc"]],

        "language": {

            "sProcessing": "Procesando...",

            "sLengthMenu": "Mostrar _MENU_ registros",

            "sZeroRecords": "No se encontraron resultados",

            "sEmptyTable": "Ningún dato disponible en esta tabla",

            "sInfo": "Mostrando un total de _TOTAL_ registros",

            "sInfoEmpty": "Mostrando un total de 0 registros",

            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",

            "sInfoPostFix": "",

            "sSearch": "Buscar:",

            "sUrl": "",

            "sInfoThousands": ",",

            "sLoadingRecords": "Cargando...",

            "oPaginate": {

                "sFirst": "Primero",

                "sLast": "Último",

                "sNext": "Siguiente",

                "sPrevious": "Anterior"

            },

            "oAria": {

                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",

                "sSortDescending": ": Activar para ordenar la columna de manera descendente"

            }

        }//cerrando language




    }).DataTable();
}



function mostrar(idReceptor) {

    $.post("../ajax/receptor.php?op=mostrar", {idReceptor: idReceptor}, function (data, status)

    {

        data = JSON.parse(data);

			$("#receptorModal").modal("show");
			$("#TipoDocumento").val(data.TipoDocumento);
			$('#Documento').val(data.Documento);
			$('#Nombre').val(data.Nombre);
			$('#Apellido').val(data.Apellido);
                        $('#Telefono').val(data.Telefono);
                        $('#TipoEnvio').val(data.TipoEnvio);
			$('#CodigoPostal').val(data.CodigoPostal);
                        $('#Direccion').val(data.Direccion);
			$('#Referencia').val(data.Referencia);
                        $('.modal-title').text("Editar Receptor");
			$('#idReceptor').val(idReceptor);
			$('#action').val("Edit");

    });

}
 

function guardaryeditar(e) {

    e.preventDefault(); 
    var formData = new FormData($("#receptor_form")[0]);

        $.ajax({

            url: "../ajax/receptor.php?op=guardaryeditar",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,

            success: function (datos) {

                console.log(datos);

                $('#receptor_form')[0].reset();
                $('#receptorModal').modal('hide');

                $('#resultados_ajax').html(datos);
                $('#receptor_data').DataTable().ajax.reload();

                limpiar();

            }
        });


}

function eliminar(idReceptor) {
    bootbox.confirm("¿Está Seguro de eliminar la venta", function (result) {
        if (result) {
            $.ajax({
                url: "../ajax/receptor.php?op=eliminar",
                method: "POST",
                data: {idReceptor: idReceptor},
                success: function (data) {
                    $('#receptor_data').DataTable().ajax.reload();
                }

            });
        }
    });
}

/*
function cambiarEstado(id_cita, est) {

    bootbox.confirm("¿Está Seguro de cambiar de estado?", function (result) {
        if (result)
        {

            $.ajax({
                url: "../ajax/cita.php?op=activarydesactivar",
                method: "POST",

                data: {id_cita: id_cita, est: est},

                success: function (data) {

                    $('#cita_data').DataTable().ajax.reload();

                }

            });


        }

    });

}
*/
init();


