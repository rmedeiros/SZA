<?php 
	session_start();
	if(isset($_GET['eposta'])&& isset($_GET['pasahitza'])){}
	if(!($erabiltzaileak=simplexml_load_file("data/erabiltzaileak.xml")))
			{
				echo('<p>Errore bat gertatu da erabiltzaileak irakurtzean. Barkatu eragozpenak</p>');
			}
		
			$bool=false;	
	foreach($erabiltzaileak->erabiltzailea as $erabiltzailea){
 			if($erabiltzailea->eposta==$_GET['eposta'] && $erabiltzailea->pasahitza==$_GET['pasahitza']){
				$bool=true;
				$_SESSION['username']=$_GET['eposta'];
				echo"<ul>
			<li><a href='aktaGehitu.php'>Akta Gehitu</a></li>
			<li><a href='#'>Nire Emaitzak</a></li>
			<li><a href='logout.php'>Log Out</a></li>
		</ul>";
			}	
			
		}
		
		if(!$bool){
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
			<br><p style='color:red'>Sartu dituzun datuak ez dira zuzenak, saiatu berriro</p>";	
		}

?>
