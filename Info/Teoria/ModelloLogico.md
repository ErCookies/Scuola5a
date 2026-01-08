###### DA E-R a Modello Logico

* *Ristrutturazione E-R*;
* *Traduzione*.



###### RISTRUTTURAZIONE

Cercare di avrere delle relazioni fra solo due entità, rendendolo il più semplice possibile



###### TRADUZIONE

Ogni entità diventa una tabella le cui colonne sono gli attributi dell'entità



|----------|

|  Persona |

|----------|

| *cod\_Fisc* |	==>  Person**e**(*cod\_Fisc*, nome, cog)

|   nome   |

|   cog    |

|----------|    **OBBLIGATORIO CHIAVE PRIMARIA**



Due entità legate 1:1 possono essere ridotta in *una singola entità con gli attributi di entrambe*

Dipende però da caso a caso





Due entità legate da una relazione 1:N diventano *due tabelle*



|----------|

|  Persona |          |----------|

|----------|         /| Telefono |

| *cod\_Fisc* |----------|----------|

|   nome   |         \\|  *Numero*  |

|   cog    |          |----------|

|----------|



Cittadin**i**(*cod\_Fisc*, nome, cog)

Telefon**i**(*numero*,cod\_Fisc(fk->Cittadini)) 

fk → *Foreign Key*: identifica **univocamente** una riga (record) in un'altra tabella





Due entità legate da una relazione N:M diventano ***3 tabelle***



Tabella 1 ------ ***TABELLA GIUNZIONE*** ------ Tabella 2



La *tabella giunzione* avrà come colonne le chiavi primarie delle altre due tabelle. Entrambe fungeranno da chiave primaria



Attor**i**(*nome*)

Film(*titolo*, anno)

Recita(*id*, nomeAttore(fk->Attori), titoloFilm(fk->Film))





Se si hanno degli attributi della relazione si inseriscono come colonna della tabella giunzione



Attor**i**(*nome*)

Film(*titolo*, anno)

Recita(*id*, nomeAttore(fk->Attori), titoloFilm(fk->Film), ruolo)





Per le **gerarchie** ci sono 3 modi:

1. *Tabella unica* (eliminazione dei figli) - si uniscono tutti gli attributi e si aggiunge l'attributo tipo;
2. *Una tabella per sottoclasse* (eliminazione del padre);
3. *Tabelle per super/sottoclasse*:

&nbsp;	Persone(*codFisc*, nome, cognome)

&nbsp;	Lavoratori(*codFisc*(fk->Persone), attività)

&nbsp;	Disoccupati(*codFisc*(fk->Persone), sussidio)

