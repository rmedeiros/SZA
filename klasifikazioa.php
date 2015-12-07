<?php
session_start();
	 
	$link = new mysqli("localhost","root","","klasifikazioa");
	//$link = new mysqli("mysql.hostinger.es","u275359965_root","dhroot","u526113874_klasifikazioa");
	
	if($link->error) {
			die( "Huts egin du konexioak MySQL-ra: (". 
			$link->error	);
	}
	$klasifikazioa =$link -> query("SELECT taldea,puntuak FROM klasifikazioa order by puntuak desc");
	echo"<table id = 'klasifikazioa'>
		<tr>
			<th>Taldea</th>
			<th>Puntuak</th>
		</tr>";
	while ($row = mysqli_fetch_assoc($klasifikazioa)){
			echo "
			<tr>
				<td id='tdg'>".$row['taldea']."</td>
				<td id='tdg'>".$row['puntuak']."</td>
			</tr>";
		}
		echo"</table>";

?>