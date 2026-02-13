La ***crittografia*** si occupa di rendere il trasferimento di informazioni il più sicuro possibile, evitando che un malintenzionato ricavi le informazioni in un tempo utile.

La ***crittoanalisi*** è la scienza che cerca di aggirare e superare le protezioni crittografiche, accedendo alle informazioni protette.

Insieme formano la ***crittologia***.



Scritture segrete:

 	***Stegangrafia***: nasconde il messaggio

 	***Crittografia***: altera il messaggio:

 		Sostituzione:

 			Codice: sostituisce le parole

 			Cifratura: sostituisce le lettere

 		Trasposizione: permuta le lettere



ESEMPI IN CLASSE:

* acrostico: lettera iniziale riga;
* seconda lettera ogni parola;
* Cifrario di Cesare: ogni lettera somma la sua posizione nell'alfabeto +n;
* Scitala Spartana: striscia di carta con lettere casuali, se avvolta al bastone con il diametro corretto rivelava il messaggio;
* ???: Modificare gli LSB dei colori dei di un'immagine per creare un messaggio;
* Maria di Scozia: sostituzione di lettere con simboli (A → @) --> comprensibile mediante conoscenza semantica --> \_╩\_ sarà 'a' oppure 'I';
* oniric



##### ***CRITTOGRAFIA ASSIMMETRICA***

1. Scegliere due numeri *PRIMI* *p* e *q* mooooolto grandi;
2. (Alt + 7) Calcola *n* = *p* • *q*;
3. (Alt+232) Φ = (*p*-1) • (*q*-1)
4. Scegliere *e* in modo che Φ ed *e* siano coprimi
5. (Alt+240) Scegliere *d* in modo che *d* • *e* ≡ 1 *mod* Φ

   * Equivale a trovare *k* in modo che *d* = ((1 + k•Φ)/*e*) sia intero



***CHIAVE PUBBLICA:*** (*e*,*n*) → (*M*^*e*)mod(*n*) = C (Cifrato)

***CHIAVE PRIVATA:***  (*d*,*n*) → (*C*^*d*)mod(*n*) = M (Messaggio originale) 

