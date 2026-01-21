##### ***GUARDARE DOCUMENTAZIONE***

Il client predispone un form ***IN POST***, attributo *enctype="multipart/form-data"* ed un campo input con *type="file"*

* Verificare nel php.ini file\_uploads=true



L'array associativo **$\_FILES** contiene nomi e informazioni dei file caricati:

* $\_FILES\[*nameDelCampoDiInputNelForm*]\["name"]     => nome.extension
* $\_FILES\[*nameDelCampoDiInputNelForm*]\["type"]     => MIME type del file caricato
* $\_FILES\[*nameDelCampoDiInputNelForm*]\["size"]     => dimensione del file caricato
* $\_FILES\[*nameDelCampoDiInputNelForm*]\["tmp\_name"] => percorso + nome del file temporaneo sul server
* $\_FILES\[*nameDelCampoDiInputNelForm*]\["error"] 	  => codice da 0 8 per tipo di errore ==> 0 *topperia missilozzi*


piquet

