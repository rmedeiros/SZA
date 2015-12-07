


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title></title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<!-- Ez ahaztu zure javascript fitxategiaren izena script etiketaren src atributuan zehazten. -->
		<script type="text/javascript" src="js/futbolTaldeak.js"></script>
		<link rel="stylesheet" type="text/css" href="css/estiloa.css"></link>
	</head>
	<body id='erregistro'>
	 <div>
	   <h4 style="font-size:60px"> TALDEAREN DATUAK </h4>
	 <form   id="erregistratufrm"  method="post" onsubmit="return eremuakBalidatuErregistratu()" action="" enctype="multipartform-data">
		<div>
			<p>Eposta</p>
			<input id="eposta" type="text" name="eposta" ></input>
			<p>Pasahitza</p>
			<input id="pasahitza" type="password" name="pasahitza" ></input>
			<p>Zure taldearen kodea(Taldea sortzean jaso zenuena):</p>
			<input id="kodea" name="kodea" type="text" ></input>
			<br/>
			<br/>
			<input id="bidali" name="bidali" type="submit" value="Bidali" ></input>
		</div>
	</form>
	<?php
	
		if(isset($_POST['eposta'])&&isset($_POST['pasahitza'])&&isset($_POST['kodea']))
		{
			
			$link = new mysqli("localhost","root","","klasifikazioa");
			//$link = new mysqli("mysql.hostinger.es","u275359965_root","dhroot","u526113874_klasifikazioa");

			if($link->error) 
			{
			die( "Huts egin du konexioak MySQL-ra: (". 
			$link->error);
			}
			$kodea=$_POST['kodea'];
			$taldea =$link ->query("SELECT taldea FROM klasifikazioa where kodea=$kodea");
			if($taldea)
			{
				$row=
				$eposta=trim($_POST['eposta']);
				$pasahitza=trim($_POST['pasahitza']);
				$row = mysqli_fetch_assoc($taldea);
				$erabiltzaileak = simplexml_load_file('data/erabiltzaileak.xml');	
				$erabiltzailea=$erabiltzaileak->addChild('erabiltzailea');
				$erabiltzailea->addAttribute("erregistro-data",date("d-m-y"));
				$erabiltzailea->addChild("eposta",$eposta);
				$erabiltzailea->addChild("pasahitza",$pasahitza);
				$erabiltzailea->addChild("taldea",$row['taldea']);
				$erabiltzaileak-> asXml('data/erabiltzaileak.xml');
				header("Location: oinarri.php");
			}else{
				echo"<p style='color:red'>Sartu duzun kodea ez dagokio gure ligako talde bati</p>";
			}
		}
	
?>
		<br/>
		<br/>
		<a href="oinarria.php"> Hasierara itzuli </a>

	</div>
	</body>
</html>



