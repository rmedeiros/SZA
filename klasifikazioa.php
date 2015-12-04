<?php
session_start();
	 
	$link = new mysqli("localhost","root","","klasfikazioa");
	//$link = new mysqli("mysql.hostinger.es","u526113874_rb15","123456789","u526113874_quiz");
	
	if($link->connect_errno) {
			die( "Huts egin du konexioak MySQL-ra: (". 
			$link->connect_errno() . ") " . 
			$link->connect_error()	);
	}
	$klasifikazioa =$link -> query("SELECT taldea,puntuak FROM klasfikazioa order by puntuak");
	echo"<table id = 'klasifikazioa'>";
	while ($row = mysqli_fetch_assoc($klasifikazioa)){
			echo "
			<tr>
				<td id='tdg'>$row['taldea'].'          '.$row['puntuak']</td>
				
			</tr>";
		}
		echo"</table>";

?>