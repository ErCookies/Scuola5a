I pc devono appartenere alla stessa rete



Per configurare la VLAN si accede allo switch e si apre la CLI, digitando:

* Switch(config)# vlan 10			-- Per creare la vlan dandole un numero
* Switch(config-vlan) name Amministrazione	-- Per assegnarle il nome
* Switch(config-vlan) exit



Switch# show vlan brief				-- Per vedere le vlan esistenti e le porte a loro associate

VLAN	NAME			STATUS	PORTS

\-------	----------------------	------	-----------------

1	default			active	Fa0/1, Fa0/2 \[...]

10	amministrazione		active



Access - Trunk: Sono due modalità di accesso, access una porta avrá solo una vlan, trunk su una porta possono lavorare più porte

Per assegnare una porta ad una vlan:

* Switch(config)# interface FastEthernet0/1
* Switch(config-if)# switchport access vlan 10
* Switch(config-if)# exit



Switch# show vlan brief				-- Per vedere le vlan esistenti e le porte a loro associate

VLAN	NAME			STATUS	PORTS

\-------	----------------------	------	-----------------

1	default			active	Fa0/2 \[...]

10	amministrazione		active	Fa0/1



