<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title></title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<!-- Ez ahaztu zure javascript fitxategiaren izena script etiketaren src atributuan zehazten. -->
		<link rel="stylesheet" type="text/css" href="css/estiloa.css"/>
	</head>
	<body id='aktaGehitu'>
	 <div>
	   <p style="font-size:60px"> PARTIDUAREN AKTA </p>
	  
	 <form   id="akta" method="post" action="">
		<p>Partidua:</p>
		<input id="talde1" type="text" name="talde1" required />  -  <input id="talde2" type="text" name="talde2" required />	
		</br>
		</br/>
		<p>Emaitza:</p>
		<input id="emaitza" type="text" name="emaitza1" required />  -  <input id="emaitza" type="text" name="emaitza2" required />
		</br>		
		</br>
		<table id="akta">
			<div class="jokalariak">
			<tr>
				<th>Jokalariak</th>
				<th>Jokalariak</th>
			</tr>
			
			<?php 
			for ($i = 1; $i<6; $i++)
				echo "<tr>
				<td>
					<input id='jokalari' type='text' name='jokalari1$i' required/>					
				</td>
				<td>
					<input id='jokalari' type='text' name='jokalari2$i' required/>					
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
					<input id='jokalari' type='text' name='jokalari1$i' />					
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
		<button type='submit' id='gorde' name='gorde'>Akta gorde</button>
	</form>
	<div id="erantzuna"></div>
	</br>
	</br>
		<a href="oinarria.php"> Hasierara itzuli </a>
		</br>
		</br>
	</div>
	</body>
</html>
<?php
	$bool=true;
	// Jaso formularioko balioak eta testuei hasierako eta amaierako hutsuneak kendu (trim).
	if(isset($_POST['emaitza1'])&&isset($_POST['emaitza2'])&&isset($_POST['talde1'])&&isset($_POST['talde2'])){
		for($i=1;$i<6;$i++){
			if(isset($_POST["jokalari1$i"])||isset($_POST["jokalari2$i"])){}
			else $bool=false;
		}
		if($bool){
			$aktak = simplexml_load_file('data/aktak.xml');	
			$akta=$aktak->addChild('akta');
			$akta->addAttribute("akta-data",date("d-m-y"));
			$akta->addChild("emaitza",$_POST['emaitza1']."-".$_POST['emaitza2']);
			$talde1=$akta->addChild("etxekoa");
			$talde2=$akta->addChild("kanpokoa");
			$talde2->addAttribute("izena",$_POST['talde2']);
			$talde1->addAttribute("izena",$_POST['talde1']);

			for($i=1;$i<6;$i++){
				$talde1->addChild("jokalari",$_POST["jokalari1$i"]);
				$talde2->addChild("jokalari",$_POST["jokalari2$i"]);
			}
			for($i=6;$i<9;$i++){
				$talde1->addChild("ordezkoa",$_POST["jokalari1$i"]);
				$talde2->addChild("ordezkoa",$_POST["jokalari2$i"]);
			}
			$aktak-> asXml('data/aktak.xml');
			header("Location: oinarria.php");
		}
	}
	
	
?>