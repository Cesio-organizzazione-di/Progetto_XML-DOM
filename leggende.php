<?php 
	error_reporting(E_ALL &~E_NOTICE);
 ?>

<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it">
	<head>
		<title> Apex Legends </title>
		<link rel="stylesheet" type="text/css" href="stile.css" />
	</head>
	<body class="leggende">
		<div class="menu">
			<a href="leggende.php">Leggende</a>
			<a href="mappe.php">Mappe</a>
			<a href="index.php"><img src="immagini/logo2.jpg" alt="logo" title="Home" class="logo" /></a>
		</div>
		
		<div class="titolo">
			<img src="immagini/titolo.png" alt="Apex Legends"/>
			<p>Ci vogliono fegato, talento e tanta fortuna per diventare delle leggende.<br />Scegli quella che preferisci e vedrai cosa possono fare per la tua squadra le sue sorprendenti abilità!</p>
		</div>
		
		<div class="filtri">
				<a href="aggiungiLeggenda.php"><button class="bottone"> Aggiungi Leggenda</button></a>
			<form action="leggende.php" method="get">
				<input class="bottone" name="invio" type="submit" value="Tutti" />
				<input class="bottone" name="invio" type="submit" value="Ricognitore" />
				<input class="bottone" name="invio" type="submit" value="Difensore" />
				<input class="bottone" name="invio" type="submit" value="Healer" />
				<input class="bottone" name="invio" type="submit" value="Assalto" />
			</form>
		</div>
		
		<?php
			print "<table class=\"sfondo\">\n\t<tbody>\n\t";
			if(empty($_GET['invio']) || $_GET['invio'] == 'Tutti')
				stampa();
			else
				filtro();
			print "\n</tbody>\n</table>";
		?>
		
		
	</body>
</html>

<?php

	function stampa(){
		$xmlLeggenda = "";
		foreach( file("XML/leggende.xml") as $nodo){
			$xmlLeggenda .= trim($nodo);
		}
		$doc = new DOMDocument();
		$doc->loadXML($xmlLeggenda);
		$root = $doc->documentElement;
		$leggende = $root->childNodes;
		for($i=0; $i<$leggende->length; $i++){
			$leggenda = $leggende->item($i);
			
			$nome = $leggenda->firstChild;
			$nomeX = $nome->textContent;
			
			$classe = $nome->nextSibling;
			$classeX = $classe->textContent;
			
			$descrizione = $classe->nextSibling;
			$descrizioneX = $descrizione->textContent;
			
			$abilita = $descrizione->nextSibling;
				$passiva = $abilita->firstChild;
				$passivaX = $passiva->firstChild;
				$passivaNome = $passivaX->textContent;
				$passivaY = $passiva->lastChild;
				$passivaDes = $passivaY->textContent;
				
				$tattica = $passiva->nextSibling;
				$tatticaX = $tattica->firstChild;
				$tatticaNome  = $tatticaX->textContent;
				$tatticaY = $tattica->lastChild;
				$tatticaDes = $tatticaY->textContent;
				
				$ultimate = $abilita->lastChild;
				$ultimateX = $ultimate->firstChild;
				$ultimateNome = $ultimateX->textContent;
				$ultimateY = $ultimate->lastChild;
				$ultimateDes = $ultimateY->textContent;
			
			$foto = $leggenda->lastChild;
			$fotoX = $foto->textContent;
			
			print "<tr class=\"spazio\">\n\t";
			print "<td><img class=\"photo\" src = \"".$fotoX."\" alt = \"photo\" /></td>\n";
			print "<td><p class=\"name\">".$nomeX."</p>\n";
			print "<p class=\"class\">".$classeX."</p>\n";
			print "<p class=\"description\">".$descrizioneX."<p>\n";
			print "<p class=\"ability\"><strong>Abilit&agrave; </strong></p>\n";
			print "<table class=\"tab\"><tbody><tr><td><span class = \"item\">Passiva</span></td><td><span class = \"item\">Tattica</span></td><td><span class = \"item\">Ultimate</span></td></tr>";
			print "<tr><th>".$passivaNome."</th><th>".$tatticaNome."</th><th>".$ultimateNome."</th></tr>";
			print "<tr><td>".$passivaDes."</td><td>".$tatticaDes."</td><td>".$ultimateDes."</td>";
			print "</tr></tbody></table>\n</td>\n</tr>\n";
		}
	}
	
	function filtro(){
		$xmlLeggenda = "";
		foreach( file("XML/leggende.xml") as $nodo){
			$xmlLeggenda .= trim($nodo);
		}
		$doc = new DOMDocument();
		$doc->loadXML($xmlLeggenda);
		$root = $doc->documentElement;
		$leggende = $root->childNodes;
		
		for($i=0; $i<$leggende->length; $i++){
			$leggenda = $leggende->item($i);
			$classeCompare = $leggenda->firstChild->nextSibling;
			if($_GET['invio'] == $classeCompare->textContent){
				$nome = $leggenda->firstChild;
				$nomeX = $nome->textContent;
			
				$classe = $nome->nextSibling;
				$classeX = $classe->textContent;
			
				$descrizione = $classe->nextSibling;
				$descrizioneX = $descrizione->textContent;
			
				$abilita = $descrizione->nextSibling;
					$passiva = $abilita->firstChild;
					$passivaX = $passiva->firstChild;
					$passivaNome = $passivaX->textContent;
					$passivaY = $passiva->lastChild;
					$passivaDes = $passivaY->textContent;
				
					$tattica = $passiva->nextSibling;
					$tatticaX = $tattica->firstChild;
					$tatticaNome  = $tatticaX->textContent;
					$tatticaY = $tattica->lastChild;
					$tatticaDes = $tatticaY->textContent;
				
					$ultimate = $abilita->lastChild;
					$ultimateX = $ultimate->firstChild;
					$ultimateNome = $ultimateX->textContent;
					$ultimateY = $ultimate->lastChild;
					$ultimateDes = $ultimateY->textContent;
			
				$foto = $leggenda->lastChild;
				$fotoX = $foto->textContent;
			
				print "<tr >\n\t";
			print "<td><img class=\"photo\" src = \"".$fotoX."\" alt = \"photo\" /></td>\n";
			print "<td><p class=\"name\">".$nomeX."</p>\n";
			print "<p class=\"class\">".$classeX."</p>\n";
			print "<p class=\"description\">".$descrizioneX."<p>\n";
			print "<p class=\"ability\"><strong>Abilit&agrave; </strong></p>\n";
			print "<table class=\"tab\"><tbody><tr><td><span class = \"item\">Passiva</span></td><td><span class = \"item\">Tattica</span></td><td><span class = \"item\">Ultimate</span></td></tr>";
			print "<tr><th>".$passivaNome."</th><th>".$tatticaNome."</th><th>".$ultimateNome."</th></tr>";
			print "<tr><td>".$passivaDes."</td><td>".$tatticaDes."</td><td>".$ultimateDes."</td>";
			print "</tr></tbody></table>\n</td>\n</tr>\n";
			}
		}
	}
?>