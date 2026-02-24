###### **S**tructured **Q**uery **L**anguage

Usato per interagire, gestire e modificare i DB relazionali

SQL: insieme di tanti linguaggi:

* **DDL**: Data Definition Language;
* **DML**: Data Manipulation Language
* **TCL**: Transaction Control Language
* **DQL**: Data Query Language
* **DCL**: Data Control Language;



DDL si occupa della struttura del database (tabelle senza dati) - CREATE, ALTER (modifica), DROP (delete), TRUNCATE (elimina *solo* i dati dalla tabella).

DML gestisce il contenuto delle tabelle - INSERT, UPDATE, DELETE.

DQL richiede i dati al database - SELECT.

DCL riguarda permessi e accessi degli utenti - GRANT, REVOKE.

TCL gestisce le transazioni del DB - COMMIT (salva definitivamente), ROLLBACK (quick load F8), SAVEPOINT (quick save F5).



SQL è un linguaggio dichiarativo, non procedurale

Le istruzioni IN CAPS LOCK

Ogni DBMS ha delle differenze nella sintassi



###### *NORMALIZZAZIONE*

Spezzettare una tabella con problemi di ridondanza in più tabelle.

***1a Forma Normale (1FN)*** requisiti:

* Tutte le righe hanno lo stesso numero di colonne;
* Gli attributi sono valori elementari
* Non è rilevante l'ordine delle righe;
* Esiste una chiave primaria;
* Non esistono due righe identiche.



###### *DIPENDENZA FUNZIONALE*

Un attributo Y dipende *funzionalmente* da X (X→Y) se dato il valore di X è possibile trovare 1 ed 1 solo valore di Y (definizione di funzione)



***2a forma normale (2FN)*** requisiti:

* essere in 1FN;
* *NON esistono* campi NON chiave che dipendono **DA UNA PARTE DELLA CHIAVE PRIMARIA** e non dalla sua interezza



***3FN***:

* è in 2FN;
* TUTTI gli attributi non chiave dipendono funzionalmente dalla chiave primaria.

##### 

Esistono delle funzioni (dette di *aggregazione*) che elaborano i dati di una colonna, come COUNT, SUM, AVG, MIN, MAX

ESEMPIO:

&nbsp;	SELECT SUM(population)

&nbsp;	FROM countries

&nbsp;	WHERE region='Europe';



ESEMPIO 2:

SELECT region, COUNT(\*) AS '#'

FROM countries

GROUP BY region

HAVING '#' >= 50;



ESEMPIO 3:

SELECT region, COUNT(\*) AS '#'

FROM countries

WHERE area >= 300000

GROUP BY region

HAVING '#' >= 15;



