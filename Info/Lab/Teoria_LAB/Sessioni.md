###### *VARI ESEMPI DI HEADER LINE*

header("Refresh:5") 			# refresh della pagina dopo 5 secondi

header("Refresh:5;url=pag2.php") 	# dopo 5 secondi refresh e va ad un'altra pagina

header("HTTP/1.1 404 Not Found")	# settare un codice di errore

header("Content-Disposition \[...]")	# forzare un download



##### ***SESSIONI***

Un cookie è limitato sia in dimensioni (~4kb), sia in sicurezza (salvati lato client).

I dati delle *sessioni* sono memorizzati lato server.

Il server crea una sessione *per ciascun **client***; più in particolare:

* Un file di testo identificato da una stringa "*PHPSESSID*", tipo "ahdfvh234fdvkqepvioqebvoufoib4943dv", al cui interno vengono identificati i dati;
* Un cookie contenente il *PHPSESSID*;



DATA LA RICHIESTA : *GET pag1.php?name=Andrea HTTP/1.1*



Nel momento in cui si vuole iniziare una sessione, si usa

**session\_start();** 			# viene generata una nuova PHPSESSID e ne crea un file specifico, oltre che al cookie di sessione;

$\_SESSION\["n"] = $\_GET\["name"];		# memorizzo i dati interessati nell'array interessato



LA RISPOSTA SARÀ : *HTTP/1.1 200 OK*, allegando il cookie di sessione



$\_SESSION è disponibile solo dopo session\_start();

* Per modificare una variabile è sufficiente sovrascriverla;
* Per eliminare una variabile dalla sessione si usa *unset($\_SESSION\['varName'])*.



Una sessione termina quando l'utente chiude il browser.

*session\_unset();*			# viene eliminato tutto il contenuto della sessione

*session\_destroy();*			# elimina completamente tutto, sessione e file compresi

