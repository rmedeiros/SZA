//Login balidazioa
function eremuakBalidatu(){
    var sAux = "";
    var frm = document.getElementById("futbola");
    var boo = Boolean(true);
    
	if (frm.elements[0].value == null || frm.elements[0].value == "" ) {
		sAux += frm.elements[0].name+" eremua betetzea derrigorrezkoa da!!!\n";
		boo = false;
    }
    
	if (frm.elements[1].value == null || frm.elements[1].value == "" ) {
		sAux += frm.elements[1].name+" eremua betetzea derrigorrezkoa da!!!\n";
		boo = false;
    }
	
    if (!boo) {
		alert(sAux);
		return boo;
    }
    
    var email= document.getElementById("eposta").value;
	var pasahitza = document.getElementById('pasahitza').value;
    var res=email.split("@");
    
	if(res.length==2) {
		if(res[0].length>0) {
			var res2=res[1].split(".");
			if(res2.length>1) {
				if (res2[0].length>0) {
					if(res2[res2.length-1].length>1) {						
						return true;
					}else {boo=false;}
				}else {boo=false;}
			}else {boo=false;}
		}else {boo=false;}
    }else {boo=false;}
	
    alert("Emailaren formatua ez da zuzena!! (Adib: kaixo@zmz.eus)");
    return boo; 
}

//Argazkiak
function displayNextImage() {
	x = (x === images.length - 1) ? 0 : x + 1;
	document.getElementById("img").src = images[x];
}

function displayPreviousImage() {
	x = (x <= 0) ? images.length - 1 : x - 1;
	document.getElementById("img").src = images[x];
}

function startTimer() {
	setInterval(displayNextImage, 3000);
}

var images = [], x = -1;
images[0] = "http://i0.wp.com/atombit.es/wp-content/uploads/2015/02/tienes_una_contrasena_y_lo_sabes.jpg?fit=1024%2C1024";
images[1] = "http://www.pintzap.com/img/pics/t/600/humor-meme-ICi2cKM3ztpFGIL2o4.jpeg";
images[2] = "https://pbs.twimg.com/profile_images/452381666649313280/1Y_pVkyh.jpeg";
images[3] = "http://stmedia.bolsamania.com/web/img/images_uploaded/5/9/cuuqfnbxaaahmmb.jpg";

		  
		  
		  
		  
		  
function eremuakBalidatuErregistratu(){
    var sAux = "";
    var frm = document.getElementById("erregistratufrm");
    var boo = Boolean(true);
    if (frm.elements[0].value == null || frm.elements[0].value == "" ) {
      sAux += frm.elements[0].name+" eremua betetzea derrigorrezkoa da!!!\n";
      boo = false;
    }
    if (frm.elements[1].value == null || frm.elements[1].value == "" ) {
	sAux += frm.elements[1].name+" eremua betetzea derrigorrezkoa da!!!\n";
	boo = false;
    }
	if (frm.elements[2].value == null || frm.elements[2].value == "" ) {
	sAux += frm.elements[2].name+" eremua betetzea derrigorrezkoa da!!!\n";
	boo = false;
    }
    if (!boo) {
      alert(sAux);
      return boo;
    }
    
    var email= document.getElementById("eposta").value;
	var pasahitza = document.getElementById('pasahitza').value;
    var res=email.split("@");
    if(res.length==2) {
		if(res[0].length>0) {
			var res2=res[1].split(".");
			if(res2.length>1) {
				if (res2[0].length>0) {
					if(res2[res2.length-1].length>1) {						
						return true;
					}else {boo=false;}
				}else {boo=false;}
			}else {boo=false;}
		}else {boo=false;}
    }else {boo=false;}
	
    alert("Emailaren formatua ez da zuzena!! (Adib: kaixo@zmz.eus)");
    return boo; 
	
	
	
}		  
	
		
function emaitzakBalidatu(){
	var emaitza1= document.getElementById('emaitza1').value;
	var emaitza2= document.getElementById('emaitza2').value;
	var talde1 =document.getElementById('talde1').value;
	var talde1 =document.getElementById('talde1').value;
	var re = new RegExp("([A-Z][a-z]+)+");
	var sAux = "";
	var boo= true;
	if(!(re.test(talde1))||!(re.test(talde2))){
		sAux+="Taldeen izenak behar bezela bete behar dira Adb: Mirandes, Tottenham Hotspur...\n";
		boo= false;
	}
	 re = new RegExp("[0-9]+");
	if(!(re.test(emaitza1))||!(re.test(emaitza2))){
		sAux+="Emaitzak positiboak edo 0 izen behar dira\n";
		boo= false;
	}
	re= new RegExp("([A-Z][a-z]+)+");
	var jokalari1;
	var jokalari2;
	var booJok=true;
	for(i=1;i<6;i++){
		jokalari1= document.getElementById("jokalari1"+i).value;
		jokalari2= document.getElementById("jokalari2"+i).value;
		if(!(re.test(jokalari1))||!(re.test(jokalari2))){
			booJok=false;
			boo= false;
		}		
	}
	if(!booJok)	
			sAux+="Titularren izenak behar bezala bete behar dira, letrez osatuak bakarrik Adb:Jon, Joseba...\n";
	re= new RegExp("[A-Z][a-z]*");
	var booOrd=true;
	for(i=6;i<9;i++){
		jokalari1= document.getElementById("jokalari1"+i).value;
		jokalari2= document.getElementById("jokalari2"+i).value;
		if(!(re.test(jokalari1))||!(re.test(jokalari2))){
			booOrd= false;
			boo=false;
		}	
	}
	if(!booOrd)
		sAux+="Ordezkoen izenak ez dira derrigorrezkoak, baina modu egokian bete behar dira, letrez osatuak bakarrik Adb:Jon, Joseba...\n";
	alert(sAux);
	return boo;
}
		  

