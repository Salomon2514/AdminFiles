// JavaScript Document
	var Error = new function(){
		//
		this.show = function(msj){
			$('msjError').innerHTML = msj;
			
			var l = $('capaError');
			l.style.top = (((HScreen() - l.offsetHeight) / 2) + YPos()) + 'px';
			l.style.left = (((WScreen() - l.offsetWidth) / 2) + XPos()) + 'px';
			l.style.visibility = 'visible';
			
			try{ $('aceptarError').focus(); }catch(e){ ; }
			AddEvent(document, 'keypress', escape);
		}
		
		this.hide = function(){
			RemEvent(document, 'keypress', escape);
			var l = $('capaError');
			l.style.visibility = 'hidden';
			l.style.top = '-1000px';
		}
		
		this.onAccept = null;
		
		var accept = function(e){
			if(!!e){ StopEvent(e); }
			this.hide();
			if(!!this.onAccept){ this.onAccept(); }
		}.closure(this);
		var escape = function(event){ if(event.keyCode == 27){ accept(); }}.closure(this);
		
		//
		AddEvent($('aceptarError'), 'click', accept);
		AddEvent($('cerrarError'), 'click', accept);
	}
