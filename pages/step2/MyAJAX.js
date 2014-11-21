// JavaScript Document

function MyAJAX() {
    var req = init();
	var loadPlace = null;
	var divWait = null;
	var errorMessage = "[!] Connection Error.";
	var onReady = null;
        
   function init() {
      if (window.XMLHttpRequest) {
        return new XMLHttpRequest();
      } else if (window.ActiveXObject) {
        return new ActiveXObject("Microsoft.XMLHTTP");
      }
    }


	function execScript(text){
		//try{
			b = text.indexOf('<script>');
			while (b>0){
				e= text.indexOf('</script>');
				sc = text.substring(b+8,e);
				try{
					eval(sc);
				}catch(e){}
				text = text.substring(e+8);
				b = text.indexOf('<script>');
			}
		//}catch(e){}
	}

	//======================
	// Functions to Set Propertis
	//======================
	
    this.setDivWait = function setDivWait(dv){
		divWait = dv;
	}
    this.setOnReady = function setDivWait(or){
		onReady = or;
	}
	
	//======================
	
    this.setContent = function setContent(){
      if (req.readyState == 4) {
        if (req.status == 200) {
          if (loadPlace) {
	          if (onReady) {
				ff = onReady;
				onReady = null;
				ff(req.responseText);
			  }else{
				document.getElementById(loadPlace).innerHTML=req.responseText;
				if(divWait!=null){document.getElementById(divWait).style.display = 'none';}
				execScript(req.responseText);
			  }
		  }
        }else{
			alert("Error: status code is " + req.status);
			//alert(errorMessage);
	    };
      }
    }

	this.load = function(url){
		this.load(url,null);
	}

	this.load = function(url,place){
		this.load(url,place,'__rnd='+Math.random());
	}
	this.submitForm = function submitForm(url,place,formId){
		var form =document.getElementById(formId);
		var body = '';
		for (var i = 0; i < form.elements.length; i++) {
			var e = form.elements[i];
			if (e.name != null && e.name != '') {
				if (!((e.type=="checkbox" || e.type=="radio")  && !e.checked)){
					body += e.name+'='+e.value+'&';
				}
			}
		}
		body += '__rnd='+Math.random();
		//make body
		this.load(url,place,body);
	}
	
	this.load = function(url,place,body){
		/*while((req.readyState!=0) && (req.readyState!=4)){
			alert(req.readyState);
			return;
		}
		*/
		if(divWait!=null){document.getElementById(divWait).style.display = 'block';}
			
		loadPlace = place;
		req.open("POST", url, true);
		req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		req.onreadystatechange = this.setContent;
		req.send(body);
	}
	
}// Class MyAJAX

function isCapslock(e){
	e = (e) ? e : window.event;
	var s = String.fromCharCode( e.which );
    if ( s.toUpperCase() === s && s.toLowerCase() !== s && !e.shiftKey ) {
        return true;
    }	else {
	return false;
	}
}