<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title></title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<!-- Ez ahaztu zure javascript fitxategiaren izena script etiketaren src atributuan zehazten. -->
		<script type="text/javascript" src="js/futbolTaldeak.js"></script>
		<link rel="stylesheet" type="text/css" href="css/estiloa.css">
	</head>
	<body onload = "startTimer()">
	 <div>
	   <h style="font-size:60px"> PARTIDUAREN AKTA </h>
	  <br>		
	  <br>
	 <form   id="akta" name="akta" method="post" action="">
		Partidua:<br><br>
		<input id="talde1" type="text" name="talde1">  -  <input id="talde2" type="text" name="talde2"/>
		<br>		
		<br>
		Emaitza:<br><br>
		<input id="emaitza1" type="text" name="emaitza1">  -  <input id="emaitza2" type="text" name="emaitza2"/>
		<br>		
		<br>
		<table id="akta">
			<div class="jokalariak">
			<tr>
				<th>Jokalariak</th>
				<th>Jokalariak</th>
			</tr>
			
			<?php 
			for ($i = 0; $i<6; $i++)
				echo "<tr>
				<td>
					<input id='jokalari' type='text' name='jokalari1$i'/>					
				</td>
				<td>
					<input id='jokalari' type='text' name='jokalari2$i'/>					
				</td>
			</tr>";
			?>
			<tr>
				<th>Ordezkoak</th>
				<th>Ordezkoak</th>
			</tr>
			<?php
			for ($i = 6; $i<9; $i++)
				echo "<tr>
				<td>
					<input id='jokalari' type='text' name='jokalari1$i'/>					
				</td>
				<td>
					<input id='jokalari' type='text' name='jokalari2$i'/>					
				</td>
			</tr>";
			?>
			</div>
		<table>
		</br>
		</br>
		<button id='gorde' name='gorde'>Akta gorde</button>
	</form>
	</br>
	</br>
		<a href="oinarria.html"> Hasierara itzuli </a>
		<br>
		<br>
	</div>
	</body>
</html>