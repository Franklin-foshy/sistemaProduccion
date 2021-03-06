var tabla;

//funcion que se ejecuta al inicio
function init(){
   mostrarform(false);
   listar();

   $("#formulario").on("submit",function(e){
   	guardaryeditar(e);
   })

   
//cargamos los items al select transporte
$.post("../ajax/servicio.php?op=selecttransporte", function(r){
	$("#idtransporte").html(r);
	$("#idtransporte").selectpicker('refresh');
});
$("#imagenmuestra").hide();
}


//funcion limpiar
function limpiar(){
	$("#nombre").val("");
	$("#print").hide();
	$("#idservicio").val("");
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
			url:'../ajax/servicio.php?op=listar',
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
     	url: "../ajax/servicio.php?op=guardaryeditar",
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

function mostrar(idservicio){
	$.post("../ajax/servicio.php?op=mostrar",{idservicio : idservicio},
		function(data,status)
		{
			data=JSON.parse(data);
			mostrarform(true);

			$("#idtransporte").val(data.idtransporte);
			$("#idtransporte").selectpicker('refresh');
			$("#nombre").val(data.nombre);
			$("#idservicio").val(data.idservicio);
			generarbarcode();
		})
}


//funcion para desactivar
function desactivar(idservicio){
	bootbox.confirm("??Esta seguro de desactivar este dato?", function(result){
		if (result) {
			$.post("../ajax/servicio.php?op=desactivar", {idservicio : idservicio}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

function activar(idservicio){
	bootbox.confirm("??Esta seguro de activar este dato?" , function(result){
		if (result) {
			$.post("../ajax/servicio.php?op=activar" , {idservicio : idservicio}, function(e){
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