##### REGOLE DI FILTRAGGIO

Per decidere se un pacchetto è accettato o rifiutato si usa una lista di regole.

Ogni regola ha la forma

###### **pattern → azione**

Pattern: a quali pacchetti si applica la regola

Azione: indica se il pacchetto debba essere accettato o rifiutato



Le regole vengono verificaate **in sequenza** fino a che un pattern soddisfa il formato del pacchetto oppure la lista è terminata.

Nel primo caso si applica l'azione specificata dalla regola\[...]



##### POLICY DI DEFAULT

* **Firewall inclusivo** (inclusive): blocca tutto il traffico che non soddisfa le regole (corrisponde ad avere come ultima regola "blocca tutto"), è sicuro ma è scomodo poichè senza definire le regole non si può accedere dall'esterno. Si parla anche di *black hole*;
* **Firewall esclusivo** (exclusive): accetta tutto il traffico che non soddisfa le regole (corrisponde ad avere come ultima regola "accetta tutto"), è comodo ma insicuro.



Il traffico è relativo all'interfaccia del router su cui è posizionata l'ACL: se il traffico arriva all'interfaccia è inbound



ACL Standard: 1-99 | analizzano l'indirizzo IP



###### CREARE ACL

Router(Config)# access-list 1 deny 192.168.2.3 0.0.0.0	-- acl num \[deny/permit] IP Wildcard | Wildcard 0.0.0.0 == host

Router(Config)# access-list 1 permit any

Router# show access-lists

**SOLITAMENTE SI POSIZIONA L'ACL SULL'INTERFACCIA PIÙ VICINA ALLA DESTINAZIONE**



###### APPLICARE ALL'INTERFACCIA

Router(Config)# interface GigabitEthernet0/0

Router(Config-if)# ip access-group 1 out		-- ip access-group num \[in/out]

