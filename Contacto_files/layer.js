// JavaScript Document
function layer(nombre, archivo){
	
	var capa = $('lay' + nombre);
	var fondo = $('bg' + nombre);
	var error = $('error' + nombre);
	
	var seccion = 0;
	var enviando = false;
	var errores = 0;
	var aCampos = new Array();
	var aValidar = new Array();
	var aLimpiar = new Array();
	var req = new Request();
	var animando = false;
	var elemento = false;
	var zoomEle = null;
	
	this.onSuccess = null;
	this.onError = null;
	this.onClose = null;
	
	//
	req.listener = function(){
		var d = req.respuestaXML;
		block(false);
		
		if(!d){ alert(req.respuestaHTML); }
		else if(d.getAttribute('exito') == 'si'){
			RemEvent(document, 'keypress', this.escape);
			block(true);
			if(!this.onSuccess){
				capa.style.zIndex = 9;
				Exito.onAccept = onAcceptSuccess;
				Exito.show(d.firstChild.data);
			}
			else{ this.onSuccess(); }
		}
		else{
			RemEvent(document, 'keypress', this.escape);
			block(true);
			if(!this.onError){
				capa.style.zIndex = 9;
				Error.onAccept = onAcceptError;
				Error.show(d.firstChild.data);
			}
			else{ this.onError(); }
		}
	}.closure(this);
	
	var onAcceptSuccess = function(){
		capa.style.zIndex = 10;
		clean();
		block(false);
		this.close();
	}.closure(this);
	var onAcceptError = function(){
		AddEvent(document, 'keypress', this.escape);
		block(false);
		capa.style.zIndex = 10;
	}.closure(this);
	
	var center = function(){
		//
		if(!!fondo){
			fondo.style.height = ((HBody() > HScreen())? HBody():HScreen()) + 'px';
			fondo.style.width = ((WBody() > WScreen())? WScreen():WBody()) + 'px';
		}
		//
		capa.style.top = (((HScreen() - capa.offsetHeight) / 2) + YPos()) + 'px';
		capa.style.left = (((WScreen() - capa.offsetWidth) / 2) + XPos()) + 'px';
	}.closure(this);
	this.escape = function(event){ if(event.keyCode == 27){ this.close(); } }.closure(this);
	this.enter = function(event){ if(event.keyCode == 13){ this.send(); } }.closure(this);
	
	this.open = function(ele, sec, event){
		if(!!event){ StopEvent(event); }
		if(!!animando){ return false; }
		animando = true;
		//
		elemento = ele;
		seccion = sec;
		animIn();
	}
	this.close = function(event){
		if(!!event){ StopEvent(event); }
		if(!!animando){ return false; }
		animando = true;
		
		RemEvent(window, 'scroll', center);
		RemEvent(window, 'resize', center);
		RemEvent(document, 'keypress', this.escape);
		
		clearTimeout(animBgInt);
		animBgFrame = 0;
		animBgMode = 'out';
		animBgInt = setTimeout(animBg, animBgRetardo);
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
	this.setBackground = function(oEle){ fondo = oEle; }
	
	var clean = function(){
		var i = null;
		//
		for(i in aLimpiar){ aCampos[aLimpiar[i]]['c'].value = ''; }
		for(i in aCampos){ inputError(aCampos[i]['c'], false); }
		errores = 0;
		showError();
	}
	
	this.send = function(event){
		var v = '', i = null;
		if(!!event){ StopEvent(event); }
		//
		if(enviando){ return false; }
		else if(validate()){ return false; }
		//
		block(true);
		//
		v += 'seccion' + SEP_IGUAL + seccion + SEP_AND;
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
	
	//Aminacion
	var animBgInt = 0;
	var animBgRetardo = 1;
	var animBgFrames = 5;
	var animBgFrame = 0;
	var animBgMode = '';
	
	var animIn = function(){
		center();
		if(!!fondo){
			setOpacity(0, fondo);
			fondo.style.display = 'block';
		}
		iZoomEleDelay = 1;
		if(!zoomEle){ zoomEle = new ZoomElement(); }
		zoomEle.zoomElement(elemento, capa, animInEnd, animOutEnd, false);
	}
	var animOut = function(){
		zoomEle.zoomElement(elemento, capa, animInEnd, animOutEnd, false, true);
		zoomEle.zoomElementOut();
	}
	var animInEnd = function(){
		center();
		//
		try{ aCampos[0]['c'].focus(); }catch(e){}
		AddEvent(window, 'scroll', center);
		AddEvent(window, 'resize', center);
		AddEvent(document, 'keypress', this.escape);
		
		clearTimeout(animBgInt);
		animBgFrame = (!!fondo)? 0 : animBgFrames + 1;
		animBgMode = 'in';
		animBgInt = setTimeout(animBg, animBgRetardo);
	}.closure(this);
	var animOutEnd = function(){
		if(!!fondo){ fondo.style.display = 'none'; }
		if(!!this.onClose){ this.onClose(); }
	}.closure(this);
	var animBg = function(){
		if(animBgFrame == animBgFrames + 1){
			animando = false;
			if(animBgMode == 'in'){ ; }
			else{ animOut(); }
		}
		else{
			var i = (animBgMode == 'in')? (60 / animBgFrames) * animBgFrame : (60 / animBgFrames) * (animBgFrames - animBgFrame);
			if(!!fondo){ setOpacity(i, fondo); }
			animBgFrame++;
			animBgInt = setTimeout(animBg, animBgRetardo);
		}
	}.closure(this);
}
