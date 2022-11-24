var tabla;
 
 //Función que se ejecuta al inicio
  function init(){
      listar();

      //cuando se da click al boton submit entonces se ejecuta la funcion guardaryeditar(e);
	$("#usuario_form").on("submit",function(e)
	{

		guardaryeditar(e);	
	})

	 //cambia el titulo de la ventana modal cuando se da click al boton
	$("#add_button").click(function(){
			
			$(".modal-title").text("Registrar Usuario");
		
	  });

  }


  //funcion que limpia los campos del formulario
    function limpiar(){
                $("#Dni").val("");
                $("#Nombre").val("");
				$("#Apellido").val("");
				$("#Cargo").val("");
				$("#Usuario").val("");
				$("#Password1").val("");
				$("#Password2").val("");
				$("#Telefono").val("");
				$("#Correo").val("");
				$('#Direccion').val("");
                                $("#Fecha_ingreso").val("");
				$("#Estado").val("");
				$("#idUsuario").val("");
    }
   
    //function listar 

    function listar(){

    	tabla=$('#usuario_data').dataTable({

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
					url: '../ajax/usuario.php?op=listar',
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
    
     //Mostrar datos del usuario en la ventana modal del formulario 

     function mostrar(idUsuario){

     $.post("../ajax/usuario.php?op=mostrar",{idUsuario : idUsuario}, function(data, status)
	
		{ 

         data = JSON.parse(data);

                $("#usuarioModal").modal("show");
                
                $("#Dni").val(data.Dni);
                $('.modal-title').text("Editar Usuario");
                $('#Nombre').val(data.Nombre);
				$('#Apellido').val(data.Apellido);
				$('#Cargo').val(data.Cargo);
				$('#Usuario').val(data.Usuario);
				$('#Password1').val(data.Password1);
				$('#Password2').val(data.Password2);
				$('#Telefono').val(data.Telefono);
				$('#Correo').val(data.Correo);
				$('#Direccion').val(data.Direccion);
                                $('#Fecha_ingreso').val(data.Fecha_ingreso);
				$('#Estado').val(data.Estado);
				$('#idUsuario').val(idUsuario);
                                
                                
				$('#action').val("Edit");


		});

   }

      
       
       //EDITAR ESTADO DEL USUARIO
       //importante:id_usuario, est se envia por post via ajax
       function cambiarEstado(idUsuario,est){
            
        bootbox.confirm("¿Está Seguro de cambiar de estado?", function(result){
		if(result)
		{
           
           $.ajax({
				url:"../ajax/usuario.php?op=activarydesactivar",
				 method:"POST",
				
				//toma el valor del id y del estado
				data:{idUsuario:idUsuario, est:est},
				
				success: function(data){
                 
                  $('#usuario_data').DataTable().ajax.reload();
			    
			    }

			});


       }

		 });//bootbox

       } 
       
       //eliminar usuario
    function eliminar(idUsuario){
     

		bootbox.confirm("¿Está Seguro que deseas eliminar?", function(result){
		if(result){

		$.post("../ajax/usuario.php?op=eliminar",{idUsuario : idUsuario}, function(data, status){ 

		data = JSON.parse(data);

		});	
		location.reload();

 		}
 	 });//bootbox

   }

    //la funcion guardaryeditar(e); se llama cuando se da click al boton submit  
      
      function guardaryeditar(e){

      	e.preventDefault(); //No se activará la acción predeterminada del evento
      	var formData = new FormData($("#usuario_form")[0]);

      	  var Password1= $("#Password1").val();
	      var Password2= $("#Password2").val();
            
             //si el password conincide entonces se envia el formulario
	         if(Password1 == Password2){

               $.ajax({

               	    url: "../ajax/usuario.php?op=guardaryeditar",
				    type: "POST",
				    data: formData,
				    contentType: false,
				    processData: false,

				    success: function(datos){

				    	console.log(datos);

				    	$('#usuario_form')[0].reset();
						$('#usuarioModal').modal('hide');

						$('#resultados_ajax').html(datos);
						$('#usuario_data').DataTable().ajax.reload();
				
                        limpiar();

				    }
               });

	         } //cierre de la validacion


	         else {

                 bootbox.alert("No coincide el password");
	         }

      }   

  init();

 




