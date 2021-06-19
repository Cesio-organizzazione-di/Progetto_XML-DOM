<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL &~E_NOTICE);

echo '<?xml version="1.0" encoding="UTF-8"?>';?>
<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<title>Aggiungi Leggenda</title>
<link rel="stylesheet" type="text/css" href="stile.css" />
</head>

<body>
	
<h2>AGGIUNGI UNA LEGGENDA</h2>

<?php

$aggiunto=0;
$datimancanti=0;

if(isset($_POST['invio'])){
	
	
    if ($_POST['nome'] && $_POST['classe'] && $_POST['descrizione'] && $_POST['nome_passiva'] && $_POST['des_passiva'] && $_POST['nome_tattica'] && $_POST['des_tattica'] && $_POST['nome_ultimate']&& $_POST['des_ultimate']) {
		
		$xmlLeggenda = "";
		foreach( file("XML/leggende.xml") as $nodo){
			$xmlLeggenda .= trim($nodo);
		}
		
		$doc = new DOMDocument();
		$doc->loadXML($xmlLeggenda);
		$root = $doc->documentElement;
		
		/*viene creato un elemento "leggenda" e viene aggiunto come figlio all'elemento radice.
		Cio' verra' fatto anche con gli altri elementi e sottoelementi di "leggenda".
        Laddove richiesto verra' specificato anche il valore che l'elemento deve assumere.		*/
		
		$newLegend = $doc->createElement("leggenda");
		$root->appendChild($newLegend);
		
		$newName = $doc->createElement("nome", "{$_POST['nome']}");
		$newLegend->appendChild($newName);
		
		$newClass = $doc->createElement("classe","{$_POST['classe']}");
		$newLegend->appendChild($newClass);
		
		$newDescription = $doc->createElement("descrizione","{$_POST['descrizione']}");
		$newLegend->appendChild($newDescription);
		
		$newAbility = $doc->createElement("abilita");
		$newLegend->appendChild($newAbility);
		
		$newPassive= $doc->createElement("passiva");
		$newAbility->appendChild($newPassive);
		
		$newPasName = $doc->createElement("nome","{$_POST['nome_passiva']}");
		$newPassive->appendChild($newPasName);
		
		$newPasDes = $doc->createElement("descrizione","{$_POST['des_passiva']}");
		$newPassive->appendChild($newPasDes);
		
		$newTactical= $doc->createElement("tattica");
		$newAbility->appendChild($newTactical);
		
		$newTatName = $doc->createElement("nome","{$_POST['nome_tattica']}");
		$newTactical->appendChild($newTatName);
		
		$newTatDes = $doc->createElement("descrizione","{$_POST['des_tattica']}");
		$newTactical->appendChild($newTatDes);
		
		$newUltimate= $doc->createElement("ultimate");
		$newAbility->appendChild($newUltimate);
		
		$newUltiName = $doc->createElement("nome","{$_POST['nome_ultimate']}");
		$newUltimate->appendChild($newUltiName);
		
		$newUltiDes = $doc->createElement("descrizione","{$_POST['des_ultimate']}");
		$newUltimate->appendChild($newUltiDes);
		
		//opzionale
		if($_POST['foto']){
			$newFoto = $doc->createElement("foto","{$_POST['foto']}");
			$newLegend->appendChild($newFoto);
		}
		//permette di salvare il documento in un file xml. In particolare, sovrascrivo il nuovo documento con il
		//libro aggiunto nel file xml iniziale.
		$doc->save('XML/leggende.xml');
	    $aggiunto=1;
	}else {$datimancanti=1;}  //nel caso manchi almeno un dato dalla form
		
}   
	

?>



<form action="<?php $_SERVER['PHP_SELF']?>" method="post" >
<div>
<p>Nome della leggenda              <input type="text" name="nome" size="30" /></p>
<p>Classe della leggenda:
<br />
									<input type="radio" name="classe" value = "Difensore" size="30" /> Difensore
<br />
									<input type="radio" name="classe" value = "Healer" size="30" /> Healer
<br />
									<input type="radio" name="classe" value = "Ricognitore" size="30" /> Ricognitore
<br />
									<input type="radio" name="classe" value = "Assalto" size="30" /> Assalto
</p>
<p>Descrizione della leggenda:      <input type="text" name="descrizione" size = "30"/></p>
<p>Nome abilit&agrave; passiva:  	<input type="text" name="nome_passiva" size="30" /></p>
<p>Descrizione abilit&agrave; passiva:	<input type="text" name="des_passiva" size="50" /></p>
<p>Nome abilit&agrave; tattica:  	<input type="text" name="nome_tattica" size="30" /></p>
<p>Descrizione abilit&agrave; tattica: <input type="text" name="des_tattica" size="50" /></p>
<p>Nome abilit&agrave; ultimate:  	<input type="text" name="nome_ultimate" size="30" /></p>
<p>Descrzione abilit&agrave; ultimate: <input type="text" name="des_ultimate" size="50" /></p>
<p>URL dello sprite della leggenda(opzionale) <input type="text" name="foto" size="30" /></p>

<p>
<input type="reset" name="reset" value="Reset" />
<input type="submit" name="invio" value="Aggiungi" />
</p>
</div>
</form>


<?php 

if($datimancanti==1) echo "<p><strong>Mancano i dati!!!</strong></p>";
elseif(isset($_POST['invio']) && $aggiunto==0) echo "<p>La leggenda non &egrave; stata aggiunta</p>";
elseif ($aggiunto==1){
	echo "\n<p>La leggenda &egrave; stata aggiunta con successo!\n<br />\n";   
    }
?>

<p> <a href = "leggende.php">Visualizza tutte le leggende</a></p>


</body>
</html>