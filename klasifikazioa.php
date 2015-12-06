<?php
	session_start();
	
	$link = new mysqli("mysql.hostinger.es","u275359965_root","dbroot","u275359965_quiz");
	
	if($link->connect_errno) {
		die("Huts egin du konexioak MySQL-ra:" . $link->error);
	}
	
	$klasifikazioa =$link -> query("SELECT taldea,puntuak FROM Klasifikazioa order by puntuak desc");
	echo"<table id = 'klasifikazioa'>";
	while ($row = mysqli_fetch_assoc($klasifikazioa)){
		echo "
		<tr>
			<td id='tdg'>".$row['taldea']."</td>
			<td id='tdg'>".$row['puntuak']."</td>
		</tr>";
	}
	echo"</table>";
?>