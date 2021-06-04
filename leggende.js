function get(scelta) {
	
	var xmlhttp = new XMLHttpRequest(); /* XMLHttpRequest è un API per manipolare dati XML tramite HTTP per le pagine web */
	xmlhttp.onreadystatechange = function() {	/* onreadystatechange è il gestore di eventi*/
		if(this.readyState == 4 && this.status == 200 & scelta == 0) { 
		/*quando è stata inviata e ricevuta la richiesta con successo (200= "OK") con scelta = 0 allora viene chiamata la funzione leggende. 
		readyState funzione che mantiene lo stato della XMLHttpRequest*/
			leggende(this);
		}	
		if (this.readyState == 4 && this.status == 200 && scelta != 0){ 
		/*quando è stata inviata e ricevuta la richiesta con successo (200= "OK") con scelta != 0 allora viene chiamata la funzione filtro.*/ 
			filtro(this, scelta);
		}	
	};
	xmlhttp.open("GET", "XML/leggende.xml", true);/* open è una funzione di XMLHttpRequest per caricare(metodo GET) un file XML.*/
	xmlhttp.send(); /* send è una funzione di invio richiesta di XMLHttpRequest */
}

function leggende(xml) {
	var i;
	var xmlDoc = xml.responseXML; /*responseXML restituisce l'oggetto richiesto*/
	var table ""; /* table è una stringa vuota che riceverà codice HTML e Javascript per costruire una vera e propria tabella */
	var x = xmlDoc.getElementsByTagName("leggenda"); 
	for(i=0; i<x.length; i++) {
		table += '<div class="row racchetta"><div class="col-sm"><img src="' +
		x[i].getElementsByTagName("foto")[0].childNodes[0].nodeValue +	'" /></div><div class="col-sm"><p>' + 
		x[i].getElementsByTagName("nome")[0].childNodes[0].nodeValue +"<br />" +
		x[i].getElementsByTagName("classe")[0].childNodes[0].nodeValue +	'<br />' +
		x[i].getElementsByTagName("descrizione")[0].childNodes[0].nodeValue +	'<br />' + 
		x[i].getElementsByTagName("AnnoProduzione")[0].childNodes[0].nodeValue +	'<br />' + 
		x[i].getElementsByTagName("Prezzo")[0].childNodes[0].nodeValue + "</p></div></div>";
	}