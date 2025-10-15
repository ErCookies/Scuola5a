##### *09/30/2025*

#### ***Archivi***

Un archivio e' un insieme organizzato di informazioni. Caratteristiche:

* *nesso logico* (medesimo argomento);
* ...;



Un archivio e' una struttura dati astratta costituita da un insieme di ***record.***

Ogni record e' identificato tramite l'indirizzo logico (posizione interna all'archivio).

L'elenco dei campi dei record costituisce il *tracciato del record.* (matricola;cognome;nome)



Un archivio di dati e' sempre implementato uno o piu' file.



###### Creazione di un archivio:

* nome;
* tracciato del record;
* supporto per archiviare i dati;
* dimensione massima;
* organizzazione (come sono strutturati, collegati e relazionati i dati).





Organizzazioni:

* *Sequenziale*;
* *Accesso diretto*;
* *A indici;*





***Sequenziale***:

* Facile da gestire;
* Record lunghezza differente;
* Efficace per piccoli file;
* Scrittura nuovo record solo in coda;
* .



***A indici:***

Serve avere un file chiamato *File Indice* dove vengono inseriti il Campo chiave legato alla posizione nel file RAF/Tabella.

* I dati occupano maggiore spazio su disco per la presenza del doppio file.
* .porcodio vai piano





###### *10/7/2025*

Step per progettare un database:

* Analisi dei requisiti;
* Progettazione concettuale;
* Inserimento di dati in *File XML* o *tabelle*?;
* Scelta di un *DBMS* fra i vari sul mercato;
* Scrittura fisica del database in linguaggio SQL.





***Progettazione concettuale***

Utilizziamo un modello a zampa di corvo, Crow's Foot. Si rappresentano con rettangoli contenenti il nome dell'entita', al singolare.

Le entita' possono essere descritte usando una serie di *attributi*. Le entita' che ne necessitano un'altra per esistere sono dette deboli, altrimenti forti.

La chiave primaria (pk) indica un attributo (od insieme di attributi, come codice fiscale e mattricola) che permette di distinguere le varie istanze di una stessa entita'.



La chiave primaria va sottolineata e va scritto fra parentesi **(pk)** a fianco.



Un attributo e' ***opzionale*** quando puo' non essere valorizzato (*null*), ***derivato*** quando puo' essere calcolato con altri attributi (ad esempio l'eta', calcolabile dalla data di nascita) questi non vanno aggiunti al modello.



Le ***associazioni*** rappresentano i legami logici fra le entita'.



 -----------------

|    **STUDENTE**     |                      --------

|---------------- |        frequenta **>**  | **CLASSE** |

| matricola (pk)  |\\      --------------|--------|

| nome            |------|              | nome   |

| cognome         |/                     --------

| data di nascita |

 -----------------



**Solitamente si scrive la frase italiana che rappresenta l'associazione:**

***"Lo STUDENTE frequenta 1 CLASSE"* e <i>"1 classe e' frequentata da piu' studenti"</i>.**



Associazioni 1:1, 1:N, N:M



***1:1***:

 ----------                      -------------------

| STUDENTE |	 possiede >	| ACCOUNT MICROSOFT |

|----------|--------------------|-------------------|

| ...      |                    | ...               |

 ----------                      -------------------

*Uno studente possiede un Account Microsoft*

*Un Account Microsoft e' di un singolo studente*



***1:N***:

 ----------                     ---------------

| STUDENTE |	svolge >      /| PROVA SCRITTA |

|----------|-------------------|---------------|

| ...      |                  \\| ...           |

 ----------                     ---------------

*Uno studente svolge piu' prove scritte*

*Una prova scritta e' svolta da uno studente*



***N:M***:

 ----------                     ---------

| STUDENTE |\\	< insegna     /| DOCENTE |

|----------|-------------------|---------|

| ...      |/                 \\| ...     |

 ----------                     ---------

*Un docente insegna a piu' studenti*

*Uno studente viene istruito da piu' docenti*





***Cardinalita' minime***:

&nbsp;----------                   ---------------

| STUDENTE |    svolge >    /| PROVA SCRITTA |

|----------|-|------------0--|---------------|

| ...      |                \\| ...           |

&nbsp;----------                   ---------------



tradotto: *Uno studente svolge 0 o piu' prove scritte,*

&nbsp;	  *Una prova scritta e' di un solo studente.*



&nbsp;      < Coordina

&nbsp;     --------------

&nbsp;     |            |

&nbsp;     |            | *Supervisore*

&nbsp;     |        ------------

&nbsp;     |      /| DIPENDENTE |

&nbsp;     |-----|-|------------|

&nbsp;*Cooperatore* \\| ...        |

&nbsp;              ------------





*Un dipendente (supervisore) coordina uno o piu' dipendenti (collaboratori),*

*Un dipendente (collaboratore) viene supervisionato da un altro dipendente (supervisore).*



###### *10/14/2025*



***Classificazione***:

* Totale-Esclusiva: **OGNI** elemento della superclasse appartiene ad una ed una sola sottoclasse;
* Totale-Sovrapposta: **OGNI** elemento della superclasse appartiene ad una o piu' sottoclassi;
* Parziale-Esclusiva: Gli elementi della superclasse possono appartenere a 0 od una sottoclasse;
* Parziale-sovrapposta: Gli elementi della superclasse possono appartenere a 0 o piu' sottoclassi;





***DURANTE LA FASE DI PRODUZIONE DEL DIAGRAMMA ER NON E' NECESSARIO TROVARE UNA CHIAVE PRIMARIA, SE NON RICAVABILE DAL PROBLEMA.***

***ALLO STESSO MODO SI POSSONO AGGIUNGERE PIU' ATTRIBUTI, IN MANIERA SENSATA E RELATIVA AL PROBLEMA.***

.
















