<?php 
	if(isset($_GET['eposta'])&& isset($_GET['pasahitza'])){}
	if(!($erabiltzaileak==simplexml_load_file("data/erabiltzaileak.xml")))
			{
				echo('<p>Errore bat gertatu da erabiltzaileak irakurtzean. Barkatu eragozpenak</p>');
			}
		
				
	foreach($erabiltzaileak->erabiltzailea as $erabiltzailea){
 			if($erabiltzailea->eposta==$_POST['eposta'] && $erabiltzailea->pasahitza==$_POST['pasahitza']){
				echo "aaaaaa";
			}	
			
		}
	echo"<p style='color:red>Sartu dituzun datuak ez dira zuzenak, saiatu berriro</p>";	

?>
