<?php 

function comoCarpetas($tabla,$id_Respuesta){
// Funciona para la tabla Activo: Predeterminado debe ser s�
global $sql;
$opcionSeleccionada = 0;

//Tabla: respuestas
	//tablas de noticias tienen, 1. Noticia, 2:Evento, 3:Deportiva
	if (isset($id_Respuesta) and ($id_Respuesta >= 1) ){
	$reg = $sql->objects("select * from $tabla  where id ='$id_Respuesta'");
	echo "<option value='$reg->id'>".$reg->Nombre."</option>";
	$opcionSeleccionada = $reg->id;
	
	}
			$consulta = "select * from $tabla where Acceso = 1 ORDER BY  Nombre  ASC";
			$ad_query = $sql->query($consulta);
				
	echo "<option value='0'>"."Seleccionar"."</option>";
			while($ad = $sql->objects('',$ad_query)){
				if ($opcionSeleccionada != $ad->id)
				echo "<option value='$ad->id'>".utf8_encode($ad->Nombre)."</option>";
			}

}//fin de la funci�n combo($tabla, $var)
function eleccionCarpeta($idCarpeta){
	global $sql;
	$tipoEnlace = "";
	if ($idCarpeta > 0){
			$consulta = "select * from  carpetaarchivos  where id = '$idCarpeta' ORDER BY  id ASC";
			$numb = $sql->nums($consulta);
			
			if ($numb >0){
			
				$reg = $sql->objects("select Nombre  from  carpetaarchivos  where id = '$idCarpeta'");
				$tipoEnlace = utf8_encode($reg->Nombre);
				
			}
	}//fin del TipoEnlace
	return $tipoEnlace;
}



?>