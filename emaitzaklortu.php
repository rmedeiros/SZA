<?php 
	session_start();
	if(!($aktak=simplexml_load_file("data/aktak.xml")))
			{
				echo('<p>Errore bat gertatu da aktak irakurtzean. Barkatu eragozpenak</p>');
			}
		
			$bool=false;
		echo"<table>
			<tr>
				<th>Etxekoa</th>
				<th>Emaitza</th>
				<th>Kanpokoa</th>
			</tr>
		";
		
	foreach($aktak->akta as $akta){
		if($_SESSION['taldea']==$akta->etxekoa['izena']||$_SESSION['taldea']==$akta->kanpokoa['izena']){
			echo"<tr>
					<td>".$akta->etxekoa['izena']."</td>
					<td>".$akta->emaitza."</td>
					<td>".$akta->kanpokoa['izena']."</td>
				</tr>";
			
		}
	}	
		echo"</table>";	
		
?>