var tabla;

//funcion que se ejecuta al inicio
function init(){
   mostrarform(false);
   listar();

   $("#formulario").on("submit",function(e){
   	guardaryeditar(e);
   })

   //cargamos los items de articulo
   $.post("../ajax/proceso.php?op=selectarticulo", function(r){
   	$("#idarticulo").html(r);
   	$("#idarticulo").selectpicker('refresh');
   });
   $("#imagenmuestra").hide();



//cargamos los items de extraccion 
$.post("../ajax/proceso.php?op=selectextraccion", function(r){
	$("#idextraccion").html(r);
	$("#idextraccion").selectpicker('refresh');
});
$("#imagenmuestra").hide();
}

//funcion limpiar
function limpiar(){
	$("#cantidad").val("");
    $("#precio_compra").val("");
	$("#precio_venta").val("");
	$("#print").hide();
	$("#idproceso").val("");
}

//funcion mostrar formulario
function mostrarform(flag){
	limpiar();
	if(flag){
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}else{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

//cancelar form
function cancelarform(){
	limpiar();
	mostrarform(false);
}

//funcion listar
function listar(){
	tabla=$('#tbllistado').dataTable({
		"aProcessing": true,//activamos el procedimiento del datatable
		"aServerSide": true,//paginacion y filrado realizados por el server
		dom: 'Bfrtip',//definimos los elementos del control de la tabla
		buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdf'
		],
		"ajax":
		{
			url:'../ajax/proceso.php?op=listar',
			type: "get",
			dataType : "json",
			error:function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy":true,
		"iDisplayLength":5,//paginacion
		"order":[[0,"desc"]]//ordenar (columna, orden)
	}).DataTable();
}
//funcion para guardaryeditar
function guardaryeditar(e){
     e.preventDefault();//no se activara la accion predeterminada 
     $("#btnGuardar").prop("disabled",true);
     var formData=new FormData($("#formulario")[0]);

     $.ajax({
     	url: "../ajax/proceso.php?op=guardaryeditar",
     	type: "POST",
     	data: formData,
     	contentType: false,
     	processData: false,

     	success: function(datos){
     		bootbox.alert(datos);
     		mostrarform(false);
     		tabla.ajax.reload();
     	}
     });

     limpiar();
}


function mostrar(idproceso){
	$.post("../ajax/proceso.php?op=mostrar",{idproceso : idtproceso},
		function(data,status)
		{
			data=JSON.parse(data);
			mostrarform(true);
			$("#idarticulo").val(data.idarticulo);
			$("#idarticulo").selectpicker('refresh');
			$("#idextraccion").val(data.extraccion);
			$("#idextraccion").selectpicker('refresh');
			$("#cantidad").val(data.cantidad);
            $("#precio_compra").val(data.precio_compra);
			$("#precio_venta").val(data.precio_venta);
			$("#idproceso").val(data.idproceso);
			generarbarcode();
		})
}


//funcion para desactivar
function desactivar(idproceso){
	bootbox.confirm("¿Esta seguro de desactivar este dato?", function(result){
		if (result) {
			$.post("../ajax/proceso.php?op=desactivar", {idproceso : idproceso}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

function activar(idproceso){
	bootbox.confirm("¿Esta seguro de activar este dato?" , function(result){
		if (result) {
			$.post("../ajax/proceso.php?op=activar" , {idproceso : idproceso}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}



function generarbarcode(){
	codigo=$("#codigo").val();
	JsBarcode("#barcode",codigo);
	$("#print").show();

}

function imprimir(){
	$("#print").printArea();
}

init();