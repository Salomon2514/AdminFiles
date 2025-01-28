//Javascript
function ZoomElement(){
	//Config
	var iZoomEleDelay = 4;//mlsgs
	var iZoomEleFrames = 10;//px
	var fZoomEleMove = strongEaseInOut;//function
	
	//
	var iZoomEleW = 0;
	var iZoomEleH = 0;
	var iZoomEleY = 0;
	var iZoomEleX = 0;
	var bZoomEleOn = false;
	var bZoomEleAnim = false;
	var eZoomEleFrom = null;
	var eZoomEleTo = null;
	var fZoomEleInEnd = null;
	var fZoomEleOutEnd = null;
	var fZoomEleAnim = null;
	
	var iIniW, iChangeW, iIniH, iChangeH, iIniX, iChangeX, iIniY, iChangeY, iCurFrame, sMode;

	var zoomElementInit = function(){
		if(!window.innerWidth){//IE
			iZoomEleW = document.documentElement.clientWidth;
			iZoomEleH = document.documentElement.clientHeight;
			iZoomEleY = document.documentElement.scrollTop;
			iZoomEleX = document.documentElement.scrollLeft;
		}
		else{
			iZoomEleW = window.innerWidth;
			iZoomEleH = window.innerHeight;
			iZoomEleY = window.pageYOffset;
			iZoomEleX = window.pageXOffset;
		}
	}
	
	this.zoomElement = function(eFrom, eTo, fOnInEnd, fOnOutEnd, fOnAmin, bNoStart){
		eZoomEleFrom = eFrom;
		eZoomEleTo = eTo;
		fZoomEleInEnd = fOnInEnd;
		fZoomEleOutEnd = fOnOutEnd;
		fZoomEleAnim = fOnAmin;
		zoomElementInit();
		if(!bNoStart){ zoomElementIn(); }
	}
	
	var zoomElementIn = function(){
		iIniW = eZoomEleFrom.offsetWidth;
		iIniH = eZoomEleFrom.offsetHeight;
		var iEndW = eZoomEleTo.offsetWidth;
		var iEndH = eZoomEleTo.offsetHeight;
		
		var oPos = getElementPos(eZoomEleFrom);
		iIniX = oPos.x;
		iIniY = oPos.y;
		
		if(bZoomEleAnim != true){
			eZoomEleTo.style.overflow = 'hidden';
			eZoomEleTo.style.height = iIniH + 'px';
			eZoomEleTo.style.width = iIniW + 'px';
			eZoomEleTo.style.top = iIniY + 'px';
			eZoomEleTo.style.left = iIniX + 'px';
			
			setOpacity(0, eZoomEleTo);
			eZoomEleTo.style.visibility = 'visible';
			
			iChangeX = (((iZoomEleW / 2) - (iEndW / 2) - iIniX) + iZoomEleX);
			iChangeY = (((iZoomEleH / 2) - (iEndH / 2) - iIniY) + iZoomEleY);
			iChangeW = (iEndW - iIniW);
			iChangeH = (iEndH - iIniH);
			iCurFrame = 0;
			sMode = 'in';
			
			setTimeout(zoomElementAnim, iZoomEleDelay);
			bZoomEleAnim = true;
			oPos = null;
		}
	}
	
	this.zoomElementOut = function(){
		if(bZoomEleAnim != true){
			eZoomEleTo.style.overflow = 'hidden';
			
			iIniW = eZoomEleTo.offsetWidth;
			eZoomEleTo.__width = iIniW;
			iIniH = eZoomEleTo.offsetHeight;
			var iEndW = eZoomEleFrom.offsetWidth;
			var iEndH = eZoomEleFrom.offsetHeight;
			
			iIniX = parseInt(eZoomEleTo.style.left);
			iIniY = parseInt(eZoomEleTo.style.top);
			
			var oPos = getElementPos(eZoomEleFrom);
			iChangeX = oPos.x - iIniX;
			iChangeY = oPos.y - iIniY;
			iChangeW = eZoomEleFrom.offsetWidth - iIniW;
			iChangeH = eZoomEleFrom.offsetHeight - iIniH;
			iCurFrame = 0;
			sMode = 'out';
			
			setTimeout(zoomElementAnim, iZoomEleDelay);
			bZoomEleAnim = true;
		}
	}
	
	var zoomElementAnim = function(){
		if(iCurFrame == (iZoomEleFrames + 1)){
			bZoomEleAnim = false;
			if(sMode == 'in'){ zoomElementInEnd(); }
			else{ zoomElementOutEnd(); }
		}
		else{
			var w = fZoomEleMove(iCurFrame, iIniW, iChangeW, iZoomEleFrames);
			var h = fZoomEleMove(iCurFrame, iIniH, iChangeH, iZoomEleFrames);
			var x = fZoomEleMove(iCurFrame, iIniX, iChangeX, iZoomEleFrames);
			var y = fZoomEleMove(iCurFrame, iIniY, iChangeY, iZoomEleFrames);
			var i = (sMode == 'in')? (100 / iZoomEleFrames) * iCurFrame : (100 / iZoomEleFrames) * (iZoomEleFrames - iCurFrame);
			
			eZoomEleTo.style.left = x + 'px';
			eZoomEleTo.style.top = y + 'px';
			eZoomEleTo.style.width = w + 'px';
			eZoomEleTo.style.height = h + 'px';
			
			setOpacity(i, eZoomEleTo);
			
			iCurFrame++;
			
			setTimeout(zoomElementAnim, iZoomEleDelay);
		}
		
		if(fZoomEleAnim){ fZoomEleAnim(iCurFrame, sMode); }
	}.closure(this);
	
	var zoomElementInEnd = function(){
		bZoomEleOn = true;
		eZoomEleTo.style.height = 'auto';
		if(fZoomEleInEnd){ fZoomEleInEnd(); }
	}
	
	var zoomElementOutEnd = function(){
		bZoomEleOn = false;
		eZoomEleTo.style.visibility = 'hidden';
		eZoomEleTo.style.top = '-1000px';
		eZoomEleTo.style.left = '0';
		eZoomEleTo.style.overflow = 'auto';
		eZoomEleTo.style.height = 'auto';
		eZoomEleTo.style.width = eZoomEleTo.__width + 'px';
		if(fZoomEleOutEnd){ fZoomEleOutEnd(); }
	}
	
}