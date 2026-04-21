##### ***SQL INJECTION***

Un particolare tipo di attacco basato sull'indurre il DB a eseguire query SQL anomale/non autorizzate.



Come evitare?

* Assegnare permessi di accesso restrittivi sul DB
* Inserendo validazioni lato client/server sui dati inviati, come tipo di dato, limite caratteri...
* Impedendo l'aggiunta di codice;

  * Le prepared statement aumentano la sicurezza delle query SQL
  * Il metodo *bindParam* associa un parametro nominale (1) ad una variabile (2) e al tipo della stessa (3); -- come tipo si ha PDO::PARAM\_STR, \_INT e \_BOOL

