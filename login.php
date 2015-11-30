<?php 
	if(isset($_POST['eposta'])&&isset($_POST['pasahitza'])){}
	if(!($erabiltzaileak=simplexml_load_file("data/erabiltzaileak.xml")))
			{
				echo('<p>Errore bat gertatu da erabiltzaileak irakurtzean. Barkatu eragozpenak</p>');
			}
		
				
	foreach($erabiltzaileak->erabiltzailea as $erabiltzailea){
 			if($erabiltzailea->eposta==$_POST['eposta'] && $erabiltzailea->pasahitza==$_POST['pasahitza']){
				header('Location: ');
			}	
			
		}
	echo"<p style='color:red>Sartu dituzun datuak ez dira zuzenak, saiatu berriro</p>";	

?>
