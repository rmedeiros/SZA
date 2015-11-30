
<?php
	
	// Jaso formularioko balioak eta testuei hasierako eta amaierako hutsuneak kendu (trim).
	if(isset($_POST['eposta'])&&isset($_POST['pasahitza'])){
	$eposta=trim($_POST['eposta']);
	$pasahitza=trim($_POST['pasahitza']);
	
	$erabiltzaileak = simplexml_load_file('data/erabiltzaileak.xml');	
	$erabiltzailea=$erabiltzaileak->addChild('erabiltzailea');
	$erabiltzailea->addAttribute("erregistro-data",date("d-m-y"));
	$erabiltzailea->addChild("eposta",$eposta);
	$erabiltzailea->addChild("pasahitza",$pasahitza);
	$erabiltzaileak-> asXml('data/erabiltzaileak.xml');
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title></title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<!-- Ez ahaztu zure javascript fitxategiaren izena script etiketaren src atributuan zehazten. -->
		<script type="text/javascript" src="js/futbolTaldeak.js"></script>
		<link rel="stylesheet" type="text/css" href="css/estiloa.css">
	</head>
	<body onload = "startTimer()">
	 <div>
	   <h style="font-size:60px"> TALDEAREN DATUAK </h>
	  <br>		
	  <br>
	 <form   id="iruzkinak" name="iruzkinak" method="post" onsubmit="eremuakBalidatu()" action="" enctype="multipartform-data">
		Eposta<br>
		<input id="eposta" type="eposta" name="eposta">
		<br>		
		<br>
		Pasahitza<br>
		<input id="pasahitza" type="password" name="pasahitza" onkeydown="return checkbox()">
		<br>
		<br>
		Zure taldearen kodea(Taldea sortzean jaso zenuena):<br>
		<input id="kodea" name="kodea" type="text"></input>
		<br>
		<br>
		<input id="bidali" name="bidali" type="submit" value="Bidali">
		<br>
	    	<br>
	</form>
		<a href="oinarria.html"> Hasierara itzuli </a>
		<br>
		<br>
	</div>
	</body>
</html>


