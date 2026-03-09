###### *DHCP*

Domain Host Configuration Protocol - Protocollo di Configurazione Dinamica degli Host



Funzionamento: Si divide in 4 fasi:

1. Discover: il nuovo host invia una richiesta generica in broadcast alla rete a cui si è appena connesso

Inizialmente il nuovo host non ha nulla di configurato, quindi lavora a livello 2, nel pacchetto vi sarà come destinazione FF:FF:FF:FF:FF:FF (MAC Broadcast), mentre come mittente il proprio MAC Address.

Solo chi ha attivo il servizio DHCP manterrà il pacchetto, mentre gli altri host che lo ricevono lo scartano.



2\. Il/I Server DHCP invia\[no] in broadcast la risposta con un possibile IP Address assegnabile alla macchina

...



3\. L'host effettua una richiesta in broadcast chiedendo lo stesso IP offerto

...



4\. Il Server DHCP invia in broadcast il pacchetto contenente l'IP

...



*Configurazione*:

* Innanzitutto si entra nella fase di configurazione del DHCP: 	*ip dhcp pool poolRouter*
* Si imposta poi l'IP Address della rete:			*network 192.168.10.0 255.255.255.0* - valori per esempio
* Si imposta poi il Default Gateway:				*default-router 192.168.10.1*
* Si esce ed infine si escludono gli indirizzi non desiderati:	*ip dhcp exclude x y* - x e y sono i limiti dell'intervallo

a

