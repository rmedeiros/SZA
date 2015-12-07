<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>EHU/if-eko futbol liga</title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
		<script type="text/javascript" src="js/futbolTaldeak.js"></script>
		<link rel="stylesheet" type="text/css" href="css/estiloa.css"/>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script type="text/javascript">
		/* <![CDATA[ */
			function login(){
				if(eremuakBalidatu()){
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
			}
			/* ]]> */
			$(document).ready(function(){				
				$("#klasifikazioa").click(function(){
					$("#content").load("klasifikazioa.php" );
				});
			});
			$(document).on("click", '#emaitzak', function(event) { 
				$("#content").load("emaitzaklortu.php" );
			});
		</script>
	</head>
	<body onload="startTimer()">
	
		<div id="header">
			<h1><a href="oinarria.php">EHU/if-eko futbol liga</a></h1>
			<ul>
				<li><a href="erregistratu.php">Erregistratu</a></li>
				<li><a href="#" id="klasifikazioa">Klasifikazioa</a></li>
				<li><a href="oinarria.php">Home</a></li>
			</ul>
		</div>
		
		<div id="nav">
		<?php	
			session_start();
			if(!isset($_SESSION['username'])){
				echo"
				<form  id='futbola' action=''>
					<div>
						<h3>Ikusi zure taldearen datuak</h3>
						<p>E-posta</p>
						<input id='eposta' type='text' name='eposta'></input>		
						<p>Pasahitza</p>
						<input id='pasahitza' type='password' name='pasahitza'></input>	
					</div>
				</form>
				<button id='bidali' name='Bidali' onclick='login()' >Bidali</button>
				";
			} else
				echo"
				<div>
					<ul>
						<li>".$_SESSION['taldea']."</li>	
						<li><a href='aktaGehitu.php'>Akta Gehitu</a></li>
						<li><a href='#' id='emaitzak'>Nire Emaitzak</a></li>
						<li><a href='logout.php'>Log Out</a></li>
					</ul>
				</div>";
				
			?>
		</div>
		
		<div id="content">
			<h2>ONGI ETORRI!</h2>
			<p>Ongi etorri EHUko Informatika Fakultateko futbol ligaren webgunera! Hemen zure taldeari buruzko informazioa aurkitu eta zure partiduen aktak
			gorde ditzazkezu.</p>
			<br/>
			<p>Espero dugu webgunea zure gustokoa izatea, edozein iradokizun edo arazo edukiz gero, mesedez idatzi beheko e-posta helbidera.</p>
		</div>
		
		<div id="section">
			<br/>
			<br/>
			<img id="img" src="https://pbs.twimg.com/profile_images/452381666649313280/1Y_pVkyh.jpeg" width="300px" height="300px" alt="iragarkiak"/>
			<br/>
			<a href="http://www.julioiglesias.com">Iragarkiak</a>
		</div>
		
		<div id="footer">
			<img id="ehu" src="rsz_negro_grande.jpg" alt="ehu"/>
			<div id="emaila">
				<p>E-posta: <a href="mailto:futbolligaehuif@ehu.eus">futbolligaehuif@ehu.eus</a></p>
			</div>
		</div>
	</body>
</html>