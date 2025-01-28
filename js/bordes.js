// JavaScript Document
//función realizada por Javier Batista.
function runInputs(elemento){
var myInputArray = document.forms[0].getElementsByTagName("INPUT");
  for (var i=0; i<myInputArray.length; i++) {
    if(myInputArray[i].type == 'text') {
      myInputArray[i].className='outtext';
    }
  } // fin del for
  
   var myInputArray = document.forms[0].getElementsByTagName("TEXTAREA");
 	 for (var i=0; i<myInputArray.length; i++) {
      myInputArray[i].className='outtext';
 
  	}//fin del for
  
  elemento.className='overtext';
}
