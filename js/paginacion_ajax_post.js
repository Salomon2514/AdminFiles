function objetoAjax(){
 var xmlhttp=false;
  try{
   xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  }catch(e){
   try {
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
   }catch(E){
    xmlhttp = false;
   }
  }
  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
   xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}

function Pagina(nropagina){
 //donde se mostrará los registros

			 divContenido = document.getElementById('wrap');
 			 Documento = document.getElementById('Documento').value;
			 enlace = document.getElementById('enlace').value;
			 anio = document.getElementById('anio').value;
			 publicar = document.getElementById('publicar').value;
			
			 //var fecha =document.getElementById("sel3").value;
			
			

	Buscar  = "Buscar";
	//alert(nombre);
	 ajax=objetoAjax();
 
 //uso del medoto GET
 //indicamos el archivo que realizará el proceso de paginar | salario
 //junto con un valor que representa el nro de pagina
 //ajax.open("GET", "candidatos.php?pag="+nropagina+"&nombre="+nombre+"&apellido="+apellido+"&enviar="+enviar);
ajax.open("GET","transparenciaAdmin.php?pag="+nropagina+"&Buscar="+Buscar+
		  "&Documento="+Documento+
		  "&enlace="+enlace+
		  "&anio="+anio+
		  "&publicar="+publicar);
		  

 divContenido.innerHTML= '<img src="anim.gif">';
 ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   //mostrar resultados en esta capa
   divContenido.innerHTML = ajax.responseText
  }
 }
 //como hacemos uso del metodo GET
 //colocamos null ya que enviamos 
 //el valor por la url ?pag=nropagina
 ajax.send(null)
}

