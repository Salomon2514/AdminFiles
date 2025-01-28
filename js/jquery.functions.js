function EliminarDato(id){
		alert(id);
		var msg = confirm("Desea eliminar este holalalalalalalal?")
		if ( msg ) {
			$.ajax({
				url: 'eliminarArchivosUnload.php',
				type: "GET",
				data: "id="+id,
				success: function(datos){
					alert(datos);
					//alert(id);
					$("#fila-"+id).remove();
				}
			});
		}
		return false;
} //EliminarDato(id){
	
	function EliminarArchivo(id){
		alert(id);
		var msg = confirm("Desea eliminar el archivo PDF?")
		if ( msg ) {
			$.ajax({
				url: 'eliminarArchivosUnload.php',
				type: "GET",
				data: "id="+id,
				success: function(datos){
					alert(datos);
					//alert(id);
					$("#fila-"+id).remove();
				}
			});
		}
		return false;
} //EliminarDato(id){