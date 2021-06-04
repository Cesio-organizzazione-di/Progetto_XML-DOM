<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
	<head>
		<title> Apex Legends </title>
		<link rel="stylesheet" type="text/css" href="stile.css" />
	</head>
	<body class="mappe">
		<div class="menu">
			<a href="leggende.php">Leggende</a>
			<a href="mappe.php">Mappe</a>
			<a href="index.php"><img src="immagini/logo3.jpg" alt="logo" title="Home" class="logo" /></a>
		</div>
		<div class="titolo">
			<img src="immagini/titolo.png" alt="Apex Legends"/>
			<p>Canyon dei Re, Confini del Mondo e Olympus.<br />Sono stati scenari di lotte, vittorie e sconfitte, ma sai per quale motivo sono stati scelti?<br />La Hammond Robotics e la Commissione dei mercenari sembrano avere il controllo su qualsiasi cosa riguardi il futuro delle Terre Straniere...<br />Scopri di più sulle mappe degli Apex Games.</p>
		</div>
		
		<div class="filtri">
			<form action="mappe.php" method="get">
				<input class="bottone" name="invio" type="submit" value="Tutte" />
				<input class="bottone" name="invio" type="submit" value="Piccola" />
				<input class="bottone" name="invio" type="submit" value="Media" />
				<input class="bottone" name="invio" type="submit" value="Grande" />
			</form>
		</div>
		
		<div class = "sfondoM">
		<?php
			if(empty($_GET['invio']) || $_GET['invio'] == 'Tutte')
				stampa();
			else
				filtro();
		?>
		</div>
	</body>
</html>

<?php

	function stampa(){
		$xmlMappa = "";
		foreach( file("mappe.xml") as $nodo){
			$xmlMappa .= trim($nodo);
		}
		$doc = new DOMDocument();
		$doc->loadXML($xmlMappa);
		$root = $doc->documentElement;
		$mappe = $root->childNodes;
		for($i=0; $i<$mappe->length; $i++){
			$mappa = $mappe->item($i);
			
			$nome = $mappa->firstChild;
			$nomeX = $nome->textContent;
			
			$dimensione = $nome->nextSibling;
			$dimensioneX = $dimensione->textContent;
			
			$descrizione = $dimensione->nextSibling;
			$descrizioneX = $descrizione->textContent;
			
			$foto = $mappa->lastChild;
			$fotoX = $foto->textContent;
			
			print "<img class = \"mappa\" src = \"".$fotoX."\" alt = \"photo\" />";
			print "<h2>".$nomeX."</h2>";
			print "<p class = \"des\">".$descrizioneX."<hr /></p>";
		}
	}
	
	function filtro(){
		$xmlMappa = "";
		foreach( file("mappe.xml") as $nodo){
			$xmlMappa .= trim($nodo);
		}
		$doc = new DOMDocument();
		$doc->loadXML($xmlMappa);
		$root = $doc->documentElement;
		$mappe = $root->childNodes;
		for($i=0; $i<$mappe->length; $i++){
			$mappa = $mappe->item($i);
			$dimensioneCompare = $mappa->firstChild->nextSibling;
			if($_GET['invio'] == $dimensioneCompare->textContent){
				$nome = $mappa->firstChild;
				$nomeX = $nome->textContent;
			
				$dimensione = $nome->nextSibling;
				$dimensioneX = $dimensione->textContent;
			
				$descrizione = $dimensione->nextSibling;
				$descrizioneX = $descrizione->textContent;
			
				$foto = $mappa->lastChild;
				$fotoX = $foto->textContent;
				
				print "<img class = \"mappa\" src = \"".$fotoX."\" alt = \"photo\" />";
				print "<h2>".$nomeX."</h2>";
				print "<p class = \"des\">".$descrizioneX."</p>";
			}
		}
	}
?>