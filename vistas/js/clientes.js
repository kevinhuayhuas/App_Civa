
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

   $("#TipoDocumento").val("");
   $("#Documento").val("");
   $("#Nombre").val("");
   $("#Apellido").val("");
   $("#Telefono").val("");
   $("#Ruc").val("");
   $("#RazonSocial").val("");
   $("#Correo").val("");
   $("#Usuario").val("");
   $("#Password1").val("");
   $("#Password2").val("");
   $("#Fecha_ingreso").val("");
   $("#Estado").val("");
   $("#idCliente").val("");
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

     function mostrar(idCliente){

     $.post("../ajax/cliente.php?op=mostrar",{idCliente : idCliente}, function(data, status)
	
		{ 

         data = JSON.parse(data);

         $("#clienteModal").modal("show");

			$("#TipoDocumento").val(data.TipoDocumento);
                        $('.modal-title').text("Editar Cliente");
			$('#Documento').val(data.Documento);
			
			$('#Nombre').val(data.Nombre);
			$('#Apellido').val(data.Apellido);
                        $('#Telefono').val(data.Telefono);
                        $('#Ruc').val(data.Ruc);
			$('#RazonSocial').val(data.RazonSocial);
                        $('#Correo').val(data.Correo);
			$('#Usuario').val(data.Usuario);
                        $('#Password1').val(data.Password1);
                        $('#Password2').val(data.Password2);
                        $('#Fecha_ingreso').val(data.Fecha_ingreso);
                        $('#Estado').val(data.Estado);
			
			$('#idCliente').val(idCliente);
			$('#action').val("Edit");
			


		});

   }


     function eliminar(idCliente){
     

		bootbox.confirm("¿Está Seguro que deseas eliminar?", function(result){
		if(result){

		$.post("../ajax/cliente.php?op=eliminar",{idCliente : idCliente}, function(data, status){ 

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

      	  var Password1= $("#Password1").val();
	      var Password2= $("#Password2").val();
            
             //si el password conincide entonces se envia el formulario
	         if(Password1 == Password2){

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

	         } //cierre de la validacion


	         else {

                 bootbox.alert("No coincide el password");
	         }

      }  
       
       //EDITAR ESTADO DEL USUARIO
       //importante:id_mantenimiento, est se envia por post via ajax
       function cambiarEstado(idCliente,est){
            
        bootbox.confirm("¿Está Seguro de cambiar de estado?", function(result){
		if(result)
		{
           
           $.ajax({
				url:"../ajax/cliente.php?op=activarydesactivar",
				 method:"POST",
				
				//toma el valor del id y del estado
				data:{idCliente:idCliente, est:est},
				
				success: function(data){
                 
                  $('#cliente_data').DataTable().ajax.reload();
			    
			    }

			});


       }

		 });//bootbox

       } 

  init();

 






