
var tabla;
 
 //Función que se ejecuta al inicio
  function init(){

      listar();
      

      //cuando se da click al boton submit entonces se ejecuta la funcion guardaryeditar(e);
	$("#cliente_form").on("submit",function(e)
	{

		guardaryeditar(e);	
	})

	 //cambia el titulo de la ventana modal cuando se da click al boton
	$("#add_button").click(function(){
			
			$(".modal-title").text("Agregar Cliente");
		
	  });

  }

  //funcion que limpia los campos del formulario

   function limpiar(){

   $("#tipo_Documento").val("");
   $("#documento").val("");
   $("#nombre").val("");
   $("#apellido").val("");
   $("#razon_social").val("");
   $("#direccion").val("");
   $("#fecha_ingreso").val("");
   $("#estado").val("");
   $("#id_cliente").val("");
   }

    //function listar 

    function listar(){

    	tabla=$('#cliente_data').dataTable({

    	"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],

		"ajax":

		   {
					url: '../ajax/cliente.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},

	     "bDestroy": true,
		"responsive": true,
		"bInfo":true,
		"iDisplayLength": 10,//Por cada 10 registros hace una paginación
	    "order": [[ 0, "desc" ]],//Ordenar (columna,orden)

	    "language": {
 
			    "sProcessing":     "Procesando...",
			 
			    "sLengthMenu":     "Mostrar _MENU_ registros",
			 
			    "sZeroRecords":    "No se encontraron resultados",
			 
			    "sEmptyTable":     "Ningún dato disponible en esta tabla",
			 
			    "sInfo":           "Mostrando un total de _TOTAL_ registros",
			 
			    "sInfoEmpty":      "Mostrando un total de 0 registros",
			 
			    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			 
			    "sInfoPostFix":    "",
			 
			    "sSearch":         "Buscar:",
			 
			    "sUrl":            "",
			 
			    "sInfoThousands":  ",",
			 
			    "sLoadingRecords": "Cargando...",
			 
			    "oPaginate": {
			 
			        "sFirst":    "Primero",
			 
			        "sLast":     "Último",
			 
			        "sNext":     "Siguiente",
			 
			        "sPrevious": "Anterior"
			 
			    },
			 
			    "oAria": {
			 
			        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			 
			        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
			 
			    }

			   }//cerrando language




    	}).DataTable();
    }
    
     //Mostrar datos del mantenimiento en la ventana modal del formulario 

     function mostrar(id_cliente){

     $.post("../ajax/cliente.php?op=mostrar",{id_cliente : id_cliente}, function(data, status)
	
		{ 

         data = JSON.parse(data);

         $("#clienteModal").modal("show");

			$("#tipo_Documento").val(data.tipo_Documento);
			$('#documento').val(data.documento);
			
			$('#nombre').val(data.nombre);
			$('#apellido').val(data.apellido);
			$('#razon_social').val(data.razon_social);
			$('#direccion').val(data.direccion);
                        $('#fecha_ingreso').val(data.fecha_ingreso);
			$('#estado').val(data.estado);
			$('.modal-title').text("Editar Cliente");
			$('#id_cliente').val(id_cliente);
			$('#action').val("Edit");
				


		});

   }


     function eliminar(id_cliente){
     

		bootbox.confirm("¿Está Seguro que deseas eliminar?", function(result){
		if(result){

		$.post("../ajax/cliente.php?op=eliminar",{id_cliente : id_cliente}, function(data, status){ 

		data = JSON.parse(data);

		});	
		location.reload();

 		}
 	 });//bootbox

   }

    //la funcion guardaryeditar(e); se llama cuando se da click al boton submit  
      
      function guardaryeditar(e){

      	e.preventDefault(); //No se activará la acción predeterminada del evento
      	var formData = new FormData($("#cliente_form")[0]);

 

       $.ajax({

       	    url: "../ajax/cliente.php?op=guardaryeditar",
		    type: "POST",
		    data: formData,
		    contentType: false,
		    processData: false,

		    success: function(datos){

		    	console.log(datos);

		    	$('#cliente_form')[0].reset();
				$('#clienteModal').modal('hide');

				$('#resultados_ajax').html(datos);
				$('#cliente_data').DataTable().ajax.reload();
		
                limpiar();

		    }
       });

	       

      }  
       
       //EDITAR ESTADO DEL USUARIO
       //importante:id_mantenimiento, est se envia por post via ajax
       function cambiarEstado(id_cliente,est){
            
        bootbox.confirm("¿Está Seguro de cambiar de estado?", function(result){
		if(result)
		{
           
           $.ajax({
				url:"../ajax/cliente.php?op=activarydesactivar",
				 method:"POST",
				
				//toma el valor del id y del estado
				data:{id_cliente:id_cliente, est:est},
				
				success: function(data){
                 
                  $('#cliente_data').DataTable().ajax.reload();
			    
			    }

			});


       }

		 });//bootbox

       } 

  init();

 






