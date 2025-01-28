<?php

function inputChecked($field,$value)
{

$checked = "";
if ($field == $value)
$checked =" checked=\"checked\"";
return $checked;

}  //inputChecked
function imagen($tb_name,$where,$campo){

		global $sql;
		$imagen = 0;
			
		$consulta = "select $campo from $tb_name where $where";	
		$numb = $sql->nums($consulta);
		
		if ($numb > 0){
		$regImagen = $sql->objects("select ($campo) as imagen  from $tb_name where $where ");
		$imagen = $regImagen->imagen;
	
			
		}else $imagen = "";
		return $imagen;

} // ultimo_registro
function redireccionar($url){

echo "<meta http-equiv='refresh' content='0;url=$url'>";
}//redireccionar



function Objeto($array)
{
	$obj = new stdObject($array);

return $obj;
} 
function comboActivo($tabla,$id_Respuesta){
// Funciona para la tabla Activo: Predeterminado debe ser s�
global $sql;

//Tabla: respuestas
	
	if (isset($id_Respuesta) and ($id_Respuesta !=1) ){
	$reg = $sql->objects("select * from $tabla  where id ='$id_Respuesta'");
	echo "<option value='$reg->id'>".$reg->nombre."</option>";
	
	}
			$consulta = "select * from $tabla where id !=1 ORDER BY  id ASC";
			$ad_query = $sql->query($consulta);
				
	echo "<option value='1'>"."Sí"."</option>";
			while($ad = $sql->objects('',$ad_query)){
				echo "<option value='$ad->id'>".$ad->nombre."</option>";
			}

}//fin de la funci�n combo($tabla, $var)


function combotipoNoticia($tabla,$id_Respuesta){
// Funciona para la tabla Activo: Predeterminado debe ser s�
global $sql;

//Tabla: respuestas
	//tablas de noticias tienen, 1. Noticia, 2:Evento, 3:Deportiva
	if (isset($id_Respuesta) and ($id_Respuesta > 1) ){
	$reg = $sql->objects("select * from $tabla  where id ='$id_Respuesta'");
	echo "<option value='$reg->id'>".$reg->nombre."</option>";
	
	}
			$consulta = "select * from $tabla where id !=1 ORDER BY  id ASC";
			$ad_query = $sql->query($consulta);
				
	echo "<option value='1'>"."Noticia"."</option>";
			while($ad = $sql->objects('',$ad_query)){
				echo "<option value='$ad->id'>".$ad->nombre."</option>";
			}

}//fin de la funci�n combo($tabla, $var)



//Funcion que rellena un comboBox
function setSelect($data, $default=""){
  /* this is an internal function and normally isn't called by the user.  it
 * loops through the results of a select query $query and prints HTML
 * around it, for use by things like listboxes and radio selections
 *
 * NOTE: this function uses dblib.php */
  $found_str="selected";
  $suffix="</option>";
  $prefix="<option";
	$output = "";
	
	foreach($data as $val => $label){
		if (is_array($default))
			$selected = empty($default[$val]) ? "" : $found_str;
		else
			$selected = $val == $default ? $found_str : "";

		$output .= "$prefix value='$val' $selected>$label$suffix";
	}

	return $output;
}
/* Función De Javier getSiafaData*/
//FUnci�n que obtiene el nombre de la especialidad
function getSiafaData($tabla, $where ,$campos) {
 global $sql;
 $sql_query = "select $campos from $tabla where $where";
 echo $sql_query;
 $sql_id = $sql->query($sql_query);
 $sql_resp = $sql->objects('',$sql_query);
 return $sql_resp;
}//getSiafaData


function totales($tabla, $where ,$campo) {
 global $sql;
 $sql_query = "select count($campo) as total  from $tabla where $where";
 //echo $sql_query;
 $sql_id = $sql->query($sql_query);
 $sql_resp = $sql->objects('',$sql_id);
 return $sql_resp->total;
}//getSiafaData


function getAnios($anio)
{
	
	/*Este sistema inició el 2011*/
	global $sql;
	//$tabla = "anios";	
	$marca= ""; //dibujando
	$marca = "selected = 'selected'";
	
	$inicial = "Seleccione el A&ntilde;o ";

		
		echo "<select name='Anio' id='Anio'>";
		if ($anio != 0)
			echo "<option $marca value='$anio'>".$anio."</option>";
		else 
			echo "<option $marca value='0'>".$inicial."</option>";
		
		for ($i=2006; $i<= date("Y")+1; $i++){
					//if ($i == date("Y"))
				 		//$marca = "selected = 'selected'";
							// else  $marca = "";
							
					 echo "<option  value='$i'>".$i."</option>";
		}//fin del for
		echo "</select>";



}// fin de la funci�n generaSelect()----->>>--->>>--->>>--->>

?>