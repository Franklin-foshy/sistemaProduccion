var tabla;

//funcion que se ejecuta al inicio
function init(){
   mostrarform(false);
   listar();

   $("#formulario").on("submit",function(e){
   	guardaryeditar(e);
   })


 //cargamos los items al celect categoria
 $.post("../ajax/proyecto.php?op=selectpersona", function(r){
	$("#idpersona").html(r);
	$("#idpersona").selectpicker('refresh');
});
$("#imagenmuestra").hide();

 //cargamos los items al celect usuario
 $.post("../ajax/proyecto.php?op=selectusuario", function(r){
	$("#idusuario").html(r);
	$("#idusuario").selectpicker('refresh');
});
$("#imagenmuestra").hide();
}



//funcion limpiar
function limpiar(){
	$("#tipo_proyecto").val("");
    $("#numero_comprobante").val("");
	$("#fecha_hora").val("");
	$("#impuesto").val("");
	$("#total_proyecto").val("");
	$("#print").hide();
	$("#idproyecto").val("");
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
			url:'../ajax/proyecto.php?op=listar',
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
     	url: "../ajax/proyecto.php?op=guardaryeditar",
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

function mostrar(idproyecto){
	$.post("../ajax/proyecto.php?op=mostrar",{idproyecto : idproyecto},
		function(data,status)
		{
			data=JSON.parse(data);
			mostrarform(true);

			$("#idpersona").val(data.idpersona);
			$("#idpersona").selectpicker('refresh');
			$("#idusuario").val(data.idusuario);
			$("#idusuario").selectpicker('refresh');
			$("#tipo_proyecto").val(data.tipo_proyecto);
            $("#numero_comprobante").val(data.numero_comprobante);
			$("#fecha_hora").val(data.fecha_hora);
			$("#impuesto").val(data.impuesto);
			$("#total_proyecto").val(data.total_proyecto);
			$("#idproyecto").val(data.idproyecto);
			generarbarcode();
		})
}


//funcion para desactivar
function desactivar(idproyecto){
	bootbox.confirm("¿Esta seguro de desactivar este dato?", function(result){
		if (result) {
			$.post("../ajax/proyecto.php?op=desactivar", {idproyecto : idproyecto}, function(e){
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

function activar(idproyecto){
	bootbox.confirm("¿Esta seguro de activar este dato?" , function(result){
		if (result) {
			$.post("../ajax/proyecto.php?op=activar" , {idproyecto : idproyecto}, function(e){
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