<?php
	// Jaso formularioko balioak eta testuei hasierako eta amaierako hutsuneak kendu (trim).
	if(isset($_POST['eposta'])&&isset($_POST['pasahitza'])) {
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
		<title>Erregistratu</title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<script type="text/javascript" src="js/futbolTaldeak.js"></script>
		<link rel="stylesheet" type="text/css" href="css/estiloa.css"/>
	</head>
	<body id="erregistro" onload = "startTimer()">
		<h1>TALDEAREN DATUAK</h1>
		<br />		
		<form id="erregistratu" method="post" onsubmit="eremuakBalidatu()" action="" enctype="multipartform-data">
			<p>E-posta</p>
			<input id="eposta" type="text" name="eposta" />
			<p>Pasahitza</p>
			<input id="pasahitza" type="password" name="pasahitza" onkeydown="return checkbox()" />
			<p>Zure taldearen kodea(Taldea sortzean jaso zenuena):</p>
			<input id="kodea" name="kodea" type="text" />
			<br />
			<br />
			<input id="bidali" name="bidali" type="submit" value="Bidali" />
			<br />
			<br />
		</form>
		<a href="oinarria.php">Hasierara itzuli</a>
		<br />
		<br />
	</body>
</html>


