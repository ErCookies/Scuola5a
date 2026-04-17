function cercaGelatiNome(frmGel){
	const ris = document.getElementById("ris");
	let nome = frmGel.Nome.value;
	
	if(nome == "")
		ris.innerHTML = "Inserire tutti i dati richiesti";
	else{
		const xhttp = new XMLHttpRequest();
		xhttp.open("POST", "server.php");
		
		xhttp.onload = function(){
			gestisciReturn(this.responseText);
		}
		
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("nome="+nome);
	}
}

function cercaGelatiData(frmGel){
	const ris = document.getElementById("ris");
	let data = frmGel.Data.value;
	
	if(data == "")
		ris.innerHTML = "Inserire tutti i dati richiesti";
	else{
		const xhttp = new XMLHttpRequest();
		xhttp.open("POST", "server.php");
		
		xhttp.onload = function(){
			gestisciReturn(this.responseText);
		}
		
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("data="+data);
	}
}

function cercaGelatiProd(frmGel){
	const ris = document.getElementById("ris");
	let prod = frmGel.Prod.value;
	
	if(prod == "")
		ris.innerHTML = "Inserire tutti i dati richiesti";
	else{
		const xhttp = new XMLHttpRequest();
		xhttp.open("POST", "server.php");
		
		xhttp.onload = function(){
			gestisciReturn(this.responseText);
		}
		
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("prod="+prod);
	}
}

function gestisciReturn(msg){
	const ris = document.getElementById("ris");
	let msgJson = JSON.parse(msg);
	if(msgJson == "ERROR")
		ris.innerHTML = "Errore connessione";
	else{
		let aus = "";
		msgJson.forEach(gel => aus += gel + "<br>");
		ris.innerHTML = aus;
	}
}