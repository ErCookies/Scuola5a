-- 1) Crea la tabella gare. (Bonus(+1): riesci ad aggiungere anche il vincolo che in genere si possano aggiungere solo ‘M’ o ‘F’?)
CREATE TABLE gare(
	idGara INT PRIMARY KEY AUTO_INCREMENT,
	dataOra TIMESTAMP NOT NULL,
	descrizione VARCHAR(255),
	genere CHAR NOT NULL CHECK(genere='M' OR genere='F'),
	idSpecialita INT,
	FOREIGN KEY (idSpecialita) REFERENCES Specialita(idSpecialita) ON DELETE SET NULL ON UPDATE CASCADE
);

-- 2) Inserire un nuovo atleta italiano (non conosci idNazione, solo il nome).
INSERT INTO atleti (cognome, nome, sesso, dataNascita, idNazione)
VALUES ('Rossi', 'Mario', 'M', '2000/01/01', 
(SELECT 'idNazione' FROM nazioni WHERE nome='Italia'));

-- 3) Modificare la data di nascita (25/04/2005) dell’atleta avente idAtleta=3
UPDATE atleti SET dataNascita='25/04/2005'
WHERE idAtleta=3;

-- 4) Eliminare tutte le partecipazioni dell’atleta Marcell Jacobs
DELETE FROM partecipazioni
WHERE idAtleta=(SELECT idAtleta FROM atleti
	WHERE nome='Marcell' AND cognome='Jacobs');

-- 5) Trova il numero totale di medaglie d’oro assegnate nel corso dei giochi olimpici
SELECT COUNT(*) FROM partecipazioni WHERE posizione=1;

-- 6) Elenco delle 10 atlete più giovani, ordinate dalla più giovane alla meno giovane
SELECT * FROM atleti WHERE sesso='F'
ORDER BY dataNascita DESC LIMIT 10;

-- 7) Nazione, cognome e nome di tutti gli atleti inglesi ed americani ordinati alfabeticamente per nazione, cognome e nome dell’atleta
SELECT n.nome, a.cognome, a.nome FROM atleti AS a
INNER JOIN nazioni AS n ON a.idNazione=n.idNazione
WHERE n.nome='USA' OR n.nome='GB'
ORDER BY n.nome, a.cognome, a.nome;

-- 8) Mostrare l’elenco delle gare ancora da disputare, specificando data e ora, il nome della specialità e il numero di atleti in gara
SELECT g.dataOra, s.nome, COUNT(p.idAtleta) AS 'Numero ' FROM gara AS g
INNER JOIN specialita AS s ON s.idSpecialita=g.idSpecialita
INNER JOIN partecipazioni AS p ON p.idGara=g.idGara
WHERE g.dataOra>NOW()
GROUP BY g.idGara;

-- 9) Qual è l’atleta più anziano che ha partecipato alle olimpiadi? Se necessario, mostrare tutti gli atleti più anziani nati lo stesso giorno
SELECT a.* FROM atleti AS A
INNER JOIN partecipazioni AS p WHERE p.idAtleta=a.idAtleta
WHERE a.dataNascita=(SELECT MIN(dataNascita) FROM atleti);

-- 10) Qualora un atleta venga squalificato la posizione viene impostata a -1. Se viene squalificato per doping, nelle note viene inserita la scritta “squalifica per doping” seguita dal nome delle sostanze rilevate dalle analisi. Trova l’elenco (senza duplicati) degli atleti squalificati per doping

SELECT DISTINCT a.* FROM atleti AS a
INNER JOIN partecipazioni AS p ON p.idAtleta=a.idAtleta
WHERE p.posizione=-1 AND p.note LIKE '%squalifica per doping%';

-- 11)  Trovare le nazioni che hanno più di 5 atleti iscritti.
SELECT a.*, COUNT(*) AS NumIscritti FROM atleti AS a GROUP BY idNazione HAVING NumIscritti>5;

-- 12) Elenco degli atleti presenti nella tabella Atleti ma che non hanno partecipato ad alcuna gara
SELECT a.* FROM atleti AS a
LEFT JOIN partecipazioni AS p ON p.idAtleta=a.idAtleta WHERE p.idAtleta IS null;

-- OPPURE
SELECT a.* FROM atleti
WHERE idAtleta NOT IN (SELECT DISTINCT idAtleta FROM partecipazioni)

-- 13) Per ciascuna nazione, numero di atleti che hanno partecipato alle olimpiadi. Ordina le nazioni da quella con più atleti a quella con meno atleti.
SELECT n.nome AS 'Nazione', COUNT(DISTINCT p.idAtleta) AS 'Num. Atleti' FROM atleti AS a
INNER JOIN partecipazioni AS p ON p.idAtleta=a.idAtleta
INNER JOIN nazioni AS n ON a.idNazione=n.idNazione
GROUP BY n.nome
ORDER BY 'Num. Atleti' DESC;

-- 14) Elenco delle nazioni che hanno vinto almeno 10 medaglie, ordinate per numero di medaglie vinte (oro+argento+bronzo). NB. Le nazioni che non hanno vinto neanche una medaglia non devono comparire
SELECT n.nome AS 'Nazione', COUNT(p.idAtleta) AS 'Tot. Medaglie' FROM atleti AS a
INNER JOIN nazioni AS n ON n.idNazione=a.idNazione
INNER JOIN partecipazioni AS p ON p.idAtleta=a.idAtleta
WHERE p.posizione IN (1,2,3)
GROUP BY n.nome HAVING 'Tot. Medaglie' >= 10
ORDER BY 'Tot. Medaglie' DESC;

-- 15) Mostra per ogni nazione, la percentuale di medaglie d’oro che ha ottenuto sul totale delle medaglie d’oro assegnate.
SELECT n.nome, (COUNT(p.id) * 100 / (SELECT COUNT(*) FROM partecipazioni WHERE posizione=1)) AS '% ori' FROM atleti AS a
INNER JOIN nazioni AS n ON n.idNazione=a.idNazione
INNER JOIN partecipazioni AS p ON p.idAtleta=a.idAtleta
WHERE p.posizione=1
GROUP BY n.nome;