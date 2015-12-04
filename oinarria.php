<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title></title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<!-- Ez ahaztu zure javascript fitxategiaren izena script etiketaren src atributuan zehazten. -->
		<script type="text/javascript" src="js/futbolTaldeak.js"></script>
		<link rel="stylesheet" type="text/css" href="css/estiloa.css">
		<script type="text/javascript" language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript" language="javascript">
			function login(){
				alert("aa");
				var xhr = new XMLHttpRequest();
				var eposta=document.getElementById('eposta').value;
				var pasahitza=document.getElementById('pasahitza').value;
				
				xhr.onreadystatechange = function(){
					if (xhr.readyState==4)
					{
						document.getElementById('nav').innerHTML = xhr.responseText;
					}
					
				}
				xhr.open('GET',"login.php?pasahitza="+pasahitza+"&eposta="+eposta,true);
				xhr.send();			

			}
			
			$(document).ready(function(){
			$("#emaitzak").click(function(){
        $("#nav").load("emaitzaklortu.php" );
    });});
		</script>
	</head>
	<body onload="startTimer()">
	<div id="header">
		<h1>EHU/if-eko futbol liga</h1>
		<ul>
			<li><a href="erregistratu.php">Erregistratu</a></li>
			<li><a href="#">Klasifikazioa</a></li>
				
		</ul>
	</div>
	<div id="nav">
	<?php	
		session_start();
		if(!isset($_SESSION['username'])){
		echo"<form  id='futbola'  name='futbola'>
			<h3>Ikusi zure taldearen datuak</h3>
			Eposta<br>
			<input id='eposta' type='text' name='eposta'>
			<br>		
			<br>
			Pasahitza<br>
			<input id='pasahitza' type='password' name='pasahitza'>
			<br>		
			<br>
		</form>
		<button id='bidali' name='Bidali' onClick='login()' >Bidali</button>
			<br>
			<br>";
			}else
				echo"<ul>
			<li><a href='aktaGehitu.php'>Akta Gehitu</a></li>
			<li><a href='#' id='emaitzak'>Nire Emaitzak</a></li>
			<li><a href='logout.php'>Log Out</a></li>
		</ul>";
		?>
	</div>
	<div id="content">
		<table border="1" cellpadding="1" cellspacing="1">
			<tr>
				<th>Izena</th>
				<th>Points</th>
			</tr>
			<tr>
				<td>Batbatbat</td>
				<td>0</td>
			</tr>
			<tr>
				<td>Bibibi</td>
				<td>0</td>
			</tr>
			<tr>
				<td>Hiruhiruhiru</td>
				<td>0</td>
			</tr>
			<tr>
				<td>Laulaulau</td>
				<td>0</td>
			</tr>
			<tr>
				<td>Bostbost</td>
				<td>0</td>
			</tr>
			<tr>
				<td>Seiseisei</td>
				<td>0</td>
			</tr>
			<tr>
				<td>Zazpizazpi</td>
				<td>0</td>
			</tr>
			<tr>
				<td>Zortzizortzi</td>
				<td>0</td>
			</tr>
		</table>
	</div>
	<div id="section">
		<!--<a href="iruzkinak.html"> Ikusi iruzkinak </a>-->
		<br>
		<br>
		<img id="img" src="https://pbs.twimg.com/profile_images/452381666649313280/1Y_pVkyh.jpeg" width="300px" height="300px"/>
		<br>
		<a href="http://www.julioiglesias.com"/>Iragarkiak</a>
	</div>
	<div id="footer">
	</div>
</html>