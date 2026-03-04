function mostraAnimali(frmZoo){
	const ris = document.getElementById("ris");
	let spc = frmZoo.specie.value;
	if(spc == "")
		ris.innerHTML = "";
	else{
		const xhttp = new XMLHttpRequest();
		// xhttp.open("GET", "serverZoo.php?specie="+spc);
		xhttp.open("POST", "serverZoo.php");
		/*xhttp.onload = function(){
			//
		}*/
		xhttp.onload = function(){
			stampaAnimali(this.responseText);
		}
		// xhttp.send(); // senza parametri per richieste in get
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // SOLO PER RICHIESTE IN POST
		xhttp.send("specie="+spc);
	}
}

function stampaAnimali(risServer){
	let risHTML = "";
	if(risServer == "ERR_CONN"){
		risHTML = "Errore - Nessuna connessione al server";
	}else{
		let aus = JSON.parse(risServer);
		if(aus.length == "0")
			risHTML = "Nessun animale trovato";
		else{
			risHTML = "<table border=1><thead><th>Nome</th><th>Et&agrave;</th><th>Specie</th></thead><tbody>";
			for(let k = 0; k < aus.length; k++){
				risHTML += "<tr>";
				for(j = 0; j < 3; j++)
					risHTML += "<td>" + aus[k][j] + "</td>"
				risHTML += "</tr>";
			}
			risHTML += "</tbody></table>";
		}
	}
	document.getElementById("ris").innerHTML = risHTML;
}