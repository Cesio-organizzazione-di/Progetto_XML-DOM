# Progetto_XML-DOM

Simone Orelli 1749732 lweb: http://lweb.dis.uniroma1.it/~lweb9/simone.orelli.XML-DOM/

Angelica Della Vecchia 1746294 lweb: http://lweb.dis.uniroma1.it/~lweb18/angelica.dellavecchia.XML-DOM/

Indirizzo repository github: https://github.com/Cesio-organizzazione-di/Progetto_XML-DOM/

Il presente esercizio rappresenta un sito web dove sono presenti i personaggi e le mappe del videogioco Apex Legends. 
Le tecnologie utilizzate sono le seguenti: 
- HTML
- CSS
- PHP
- XML con DOM

L'esercizio è composto da 8 file: 

- index.php: rappresenta la homepage del sito dalla quale è possibile accedere alle pagine leggende.php e mappe.php. 
- leggende.php: qui è possibile visualizzare l'elenco di alcuni personaggi del gioco. Le informazioni sui personaggi sono presenti nel file leggende.xml. Mediante DOM il file xml viene scasionato dalla radice fino alle foglie. Inoltre, sono state realizzate due funzioni: 
   - stampa(): visualizza a video tutte le informazioni presenti nel file xml (tutti i personaggi e le loro caratteristiche);
   - filtro(): stampa solo quei personaggi la cui classe coincide con "$_GET['invio']" all'interno della quale è presente la classe selezionata nel menù;
 - leggende.xml: sono presenti tutte le informazioni sui vari personaggi; 
 - leggende.dtd: definizione della grammatica usata per scrivere il file precedente;
 - mappe.php: qui è possibile visualizzare tutte le mappe disponibili. Anche qui sono presenti le funzioni stampa() e filtro() analoghe a quelle di leggende.php;
 - mappe.xml: contiene tutte le informazioni sulle mappe; 
 - mappe.dtd: definizione della grammatica usata per scrivere il file precedente; 
 - stile.css: contiene le regole di stile per la visualizzazione. 

NB: Sul bridge è stato caricato l'esercizio in formato rar privo di foto, caricando quindi solo i documenti PHP, CSS, XML, DTD, poiché la dimensione del file superava quella massima consentita.
