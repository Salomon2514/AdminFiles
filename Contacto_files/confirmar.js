// JavaScript Document
	var Confirmar = new function(){
		//
		this.show = function(msj){
			$('msjConfirmar').innerHTML = msj;
			
			var l = $('capaConfirmar');
			l.style.top = (((HScreen() - l.offsetHeight) / 2) + YPos()) + 'px';
			l.style.left = (((WScreen() - l.offsetWidth) / 2) + XPos()) + 'px';
			l.style.visibility = 'visible';
			
			try{ $('noConfirmar').focus(); }catch(e){ ; }
			AddEvent(document, 'keypress', escape);
		}
		
		this.hide = function(){
			RemEvent(document, 'keypress', escape);
			var l = $('capaConfirmar');
			l.style.visibility = 'hidden';
			l.style.top = '-1000px';
		}
		
		this.onAccept = null;
		this.onCancel = null;
		
		var accept = function(e){
			if(!!e){ StopEvent(e); }
			this.hide();
			if(!!this.onAccept){ this.onAccept(); }
		}.closure(this);
		var cancel = function(e){
			if(!!e){ StopEvent(e); }
			this.hide();
			if(!!this.onCancel){ this.onCancel(); }
		}.closure(this);
		
		var escape = function(event){ if(event.keyCode == 27){ cancel(); }}.closure(this);
		
		//
		AddEvent($('siConfirmar'), 'click', accept);
		AddEvent($('noConfirmar'), 'click', cancel);
		AddEvent($('cerrarConfirmar'), 'click', cancel);
	}
