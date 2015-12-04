<?php 
	if(!($aktak=simplexml_load_file("data/aktak.xml")))
			{
				echo('<p>Errore bat gertatu da aktak irakurtzean. Barkatu eragozpenak</p>');
			}
		
			$bool=false;
		echo"<table>";	
	foreach($aktak->akta as $akta){
			
			echo"<li>$akta$akta-emaitza</li>";

			}	
		echo"</table>	
		}
?>