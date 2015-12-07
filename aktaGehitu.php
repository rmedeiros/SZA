<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Akta gehitu</title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="css/estiloa.css"/>
		<script type="text/javascript" src="js/futbolTaldeak.js"></script>
	</head>
	<body id='aktaGehitu'>
		<h1>PARTIDUAREN AKTA</h1>
		<form id="akta" method="post" action="" onsubmit="return emaitzakBalidatu()">
			<p>Partidua</p>
			<input id="talde1" type="text" name="talde1" required />  -  <input id="talde2" type="text" name="talde2" required />	
			<br />
			<p>Emaitza</p>
			<input id="emaitza1" type="number" name="emaitza1" required />  -  <input id="emaitza2" type="number" name="emaitza2" required />
			<br />		
			<br />
			<table>
				<tr>
					<th>Jokalariak</th>
					<th>Jokalariak</th>
				</tr>
				
				<?php 
					for ($i = 1; $i<6; $i++)
						echo "
						<tr>
							<td>
								<input id='jokalari' type='text' name='jokalari1$i' required />					
							</td>
							<td>
								<input id='jokalari' type='text' name='jokalari2$i' required />					
							</td>
						</tr>";
				?>
				
				<tr>
					<th>Ordezkoak</th>
					<th>Ordezkoak</th>
				</tr>
				
				<?php
				for ($i = 6; $i<9; $i++)
					echo "
					<tr>
						<td>
							<input id='jokalari' type='text' name='jokalari1$i' />					
						</td>
						<td>
							<input id='jokalari' type='text' name='jokalari2$i' />					
						</td>
					</tr>";
				?>
			</table>
			<br />
			<br />
			<button type='submit' id='gorde' name='gorde'>Akta gorde</button>
		</form>
		<div id="erantzuna"></div>
		<br />
		<br />
		<a href="oinarria.php">Hasierara itzuli</a>
		<br />
		<br />
	</body>
</html>

<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header("Location: oinarria.php");
	}
	$bool=true;
	// Jaso formularioko balioak eta testuei hasierako eta amaierako hutsuneak kendu(trim).
	if(isset($_POST['emaitza1'])&&isset($_POST['emaitza2'])&&isset($_POST['talde1'])&&isset($_POST['talde2'])){
		for($i=1;$i<6;$i++){
			if(isset($_POST["jokalari1$i"])||isset($_POST["jokalari2$i"])){}
			else $bool=false;
		}
		if($bool){
			$link = new mysqli("localhost","root","","klasifikazioa");
			//$link = new mysqli("mysql.hostinger.es","u275359965_root","dhroot","u526113874_klasifikazioa");

			if($link->error) 
			{
			die( "Huts egin du konexioak MySQL-ra: (". 
			$link->error);
			}
			$taldea1 =$link ->query("SELECT taldea FROM klasifikazioa where taldea='".$_POST['talde1']."'");
			$taldea2 =$link ->query("SELECT taldea FROM klasifikazioa where taldea='".$_POST['talde2']."'");
			$emaitza1=$_POST['emaitza1'];
			$emaitza2=$_POST['emaitza2'];
			if(($taldea1 && $_SESSION['taldea']==$_POST['talde2'])||($taldea2 && $_SESSION['taldea']==$_POST['talde1'])){				
				$aktak = simplexml_load_file('data/aktak.xml');	
				$akta=$aktak->addChild('akta');
				$akta->addAttribute("akta-data",date("d-m-y"));
				$akta->addChild("emaitza",$emaitza1."-".$emaitza2);
				$talde1=$akta->addChild("etxekoa");
				$talde2=$akta->addChild("kanpokoa");
				$talde2->addAttribute("izena",$_POST['talde2']);
				$talde1->addAttribute("izena",$_POST['talde1']);

				//Puntuazioen eguneraketa.
				if($emaitza1>$emaitza2){
					if ($link->query("update klasifikazioa set puntuak=puntuak+3 where taldea='".$_POST['talde1']."'") != TRUE) {
						echo "Errorea puntuak eguneratzean: " . $link->error;
					}
				}else if($emaitza1<$emaitza2){
					if ($link->query("update klasifikazioa set puntuak=puntuak+3 where taldea='".$_POST['talde2']."'") != TRUE) {
						echo "Errorea puntuak eguneratzean: " . $link->error;
					}
				}else{
					if (($link->query("update klasifikazioa set puntuak=puntuak+1 where taldea='".$_POST['talde1']."'")!= TRUE)||
						($link->query("update klasifikazioa set puntuak=puntuak+1 where taldea='".$_POST['talde2']."'")!= TRUE)){
						echo "Errorea puntuak eguneratzean: " . $link->error;
					}
				}
				
				
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
			}else{
				echo"<p style='color:red'>Sartu dituzun taldeak ez dira zuzenak</p>";
			}
		}
	}
?>