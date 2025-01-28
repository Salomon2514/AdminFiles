// JavaScript Document
function form(nombre, archivo){
	
	var error = $('error' + nombre);
	var loader = $('loader' + nombre);
	
	var enviando = false;
	var errores = 0;
	var aCampos = new Array();
	var aValidar = new Array();
	var aLimpiar = new Array();
	var req = new Request();
	var elemento = false;
	//
	this.onSuccess = null;
	this.onError = null;
	this.onSend = null;
	
	//
	req.listener = function(){
		var d = req.respuestaXML;
		block(false);
		if(!!loader){ loader.style.display = 'none'; }
		
		if(!d){ alert(req.respuestaHTML); }
		else if(d.getAttribute('exito') == 'si'){
			if(!this.onSuccess){
				block(true);
				Exito.onAccept = onAccept;
				Exito.show(d.firstChild.data);
			}
			else{ this.onSuccess(d); }
		}
		else{
			if(!this.onError){
				block(true);
				Error.onAccept = onAccept;
				Error.show(d.firstChild.data);
			}
			else{ this.onError(d); }
		}
	}.closure(this);
	
	var onAccept = function(){
		clean();
		block(false);
	}.closure(this);
	
	this.addField = function(campo, nombre, expresion, clear){
		var o = {'c':campo, 'n':nombre};
		//
		aCampos.push(o);
		if(expresion){
			campo.expresion = expresion;
			campo.inputError = inputError;
			campo.onblur = funcVal.closure(campo);
			//
			aValidar.push(aCampos.length - 1);
		}
		if(clear){ aLimpiar.push(aCampos.length - 1); }
	}
	
	var clean = function(){
		var i = null;
		//
		for(i in aLimpiar){ aCampos[aLimpiar[i]]['c'].value = ''; }
		for(i in aCampos){ inputError(aCampos[i]['c'], false); }
		errores = 0;
		showError();
	}
	
	this.enter = function(event){ if(event.keyCode == 13){ this.send(); } }.closure(this);
	
	this.send = function(event){
		var v = '', i = null;
		if(!!event){ StopEvent(event); }
		if(!!this.onSend){ this.onSend(); }
		//
		if(enviando){ return false; }
		else if(validate()){ return false; }
		//
		block(true);
		if(!!loader){ loader.style.display = 'block'; }
		//
		for(i in aCampos){ v += aCampos[i]['n'] + SEP_IGUAL + trim(aCampos[i]['c'].value) + SEP_AND; }
		//
		req.pedir(DIR_ROOT + 'requests/' + archivo + '.php', v);
	}.closure(this);
	
	var inputError = function(c, b){
		errores += (b)? 1:0;
		c.className = (b)? 'inputError':'';
	}.closure(this);
	var showError = function(){
		error.style.display = (errores > 0)? 'block':'none';
	}
	
	var funcVal = function(){
		this.value = trim(this.value);
		if(this.value.search(this.expresion) == 0){ this.inputError(this, false); }
		else{ this.inputError(this, true); }
	}
	var validate = function(){
		var i = null;
		//
		errores = 0;
		for(i in aValidar){ aCampos[aValidar[i]]['c'].onblur(); }
		showError();
		return (errores > 0);
	}
	
	var block = function(b){
		var i = null;
		//
		enviando = b;
		for(i in aCampos){ aCampos[i]['c'].disabled = b; }
	}
}
