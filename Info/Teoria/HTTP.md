HTTP e' un protocollo stateless ("senza memoria"), ossia ogni richiesta e' completamente indipendente dalle precedenti.



HTTP 1 e 2 per comunicare usano sessioni basate su TCP.

Il client genera un numero casuale x (Initial Sequence Number) 	--> SYN = 1, ACK = 0; SeqNumber = x;

Il server genera y casuale e ritorna x+1 come acknowledgement; 	--> SYN = 1; ACK = 1; SeqNumber = y; ACKNumber = x+1;

Il client conferma la recezione calcolando y+1;			--> SYN = 0; ACK = 1; SeqNumber = x+1; ACKNumber = y+1;

DOPO QUESTO LA *CONNESSIONE TCP* E' **STABILITA.** Questo processo si definisce Three-Way HandShake.

Successivamente avviene una connessione sicura TLS (condivisione di una chiave crittografica, cio' che distingue l'HTTPS dall'HTTP)

Avverra' poi la richiesta HTTP, la risposta HTTP ed infine la chiusura della connessione TCP.



**HTTP REQUEST**:

REQUEST LINE:	GET /api/users?page=1 HTTP/2

HEADER LINE:	Host: www.andreabonardi.it

 		User-Agent: Mozilla/5.0 (Windows NT 10.0; Win-64; x64)

 		Accept: text/html,application/xhtml+xml,applicaton/xml;q=0.9,\*/\*;q=0.8

 		Accept-Language: it-IT,it;q=0.9,en-US;q=0.8,en;q=0.7

 		Accept-Encoding: gzip, deflate, br

 		If-Modified-Since: Wed, 10 Sep 2025 12:00:00 GMT

 		Connection: keep-alive

EMPTY LINE:	*carriage return, line feed*

BODY:

---

Nella request line serve il *metodo* (GET, POST... sempre in CAPS), il percorso (+ eventuali parametri) e versione del protocollo;

Nell'header line:

Host:			pagina a cui connettersi

User-Agent:		Browser utilizzato

Accept:			cosa accetto come risposta

Accept-Language:	lingue accettate

Accept-Encoding:	crittografie accettate

If-Modified-Since:	se e' stato modificato dopo questa data mandamelo, altrimenti uso quella nella cache del browser

Connection:		metodo di connessione.



Solitamente il GET si utilizza quando facciamo ricerche/richieste senza modificare i dati del server, voglio condividere l'URL e l'operazione e' sicura e ripetibile;

Il POST lo uso quando invio dati sensibili, modifico dati sul server, l'operazione non e' idempotente (quindi OGNI INVIO produce dati differenti) o carico dei file.



**RISPOSTA HTTP:**

STATUS LINE:	HTTP/2 200 OK

HEADER LINES:	Date: Mon

 		Server:

 		Last-Modified:

 		Content-Type:

 		Content-Length:
Connection: keep-alive

EMPTY LINE:	*carriage return, line feed*

BODY:		<!DOCTYPE html>

 			<html>

 				<head>

 					...



***STATUS CODES***:	100-199 Informational	()

 		200-299 Successful	(200 OK)

 		300-399 Redirection	(301 moved permanently)

 		400-499 Client Error	(400 syntax error, 404 roba not found)

 		500-599 Server Error	(500 errore generico di server)

