function tryLogin(frmLogin){
	const ris = document.getElementById("ris");
	let user = frmLogin.user.value;
	let pwd = frmLogin.pwd.value;
	
	if(user == "" || pwd == "")
		ris.innerHTML = "Inserire tutti i dati richiesti";
	else{
		const xhttp = new XMLHttpRequest();
		xhttp.open("POST", "serverLogin.php");
		
		xhttp.onload = function(){
			errorLogin(this.responseText);
		}
		
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("user="+user+"&pwd="+pwd);
	}
}

function errorLogin(msg){
	const ris = document.getElementById("ris");
	let msgJson = JSON.parse(msg);
	if(msgJson == "ERROR")
		ris.innerHTML = "Errore connessione";
	else if(msgJson == "0")
		ris.innerHTML = "Credenziali errate";
	else
		location = "home.php";
}

// ---------------------------

function searchCat(frmCat){
	const ris = document.getElementById("ris");
	let cat = frmCat.cat.value;
	
	if(cat == "")
		ris.innerHTML = "Inserire tutti i dati richiesti";
	else{
		const xhttp = new XMLHttpRequest();
		xhttp.open("POST", "serverSong.php");
		
		xhttp.onload = function(){
			manageResponseCat(this.responseText);
		}
		
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("cat="+cat);
	}
}

function manageResponseCat(msg){
	const ris = document.getElementById("ris");
	let msgJson = JSON.parse(msg);
	if(msgJson == "ERROR")
		ris.innerHTML = "Errore connessione";
	else if(msgJson == "0")
		ris.innerHTML = "Nessun brano trovato";
	else{
		let output = "<table border=1><thead><tr><th>Nome</th><th>Durata</th><th>Categoria</th></tr></thead><tbody>";
		for(let k = 0; k < msgJson.length; k++){
			output += '<tr>';
			output += '<td>' + msgJson[k]['nome'] + '</td>'; // nome
			output += '<td>' + msgJson[k]['durata'] + '</td>'; // durata
			output += '<td>' + msgJson[k]['categoria'] + '</td>'; // cat
			output += '</tr>';
		}
		output += '</tbody></table>';
		
		ris.innerHTML = output;
	}
}

function showAll(){
	const ris = document.getElementById("ris");
	const xhttp = new XMLHttpRequest();
	xhttp.open("GET", "serverSongAll.php");
	
	xhttp.onload = function(){
		manageResponseAll(this.responseText);
	}
	
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send();
}

function manageResponseAll(msg){
	const ris = document.getElementById("ris");
	let msgJson = JSON.parse(msg);
	let durTot = 0, totBr = 0;
	let output = "<table border=1><thead><tr><th>Nome</th><th>Durata</th><th>Categoria</th></tr></thead><tbody>";
	for(let k = 0; k < msgJson.length; k++){
		output += '<tr>';
		output += '<td>' + msgJson[k]['nome'] + '</td>'; // nome
		output += '<td>' + msgJson[k]['durata'] + '</td>'; // durata
		output += '<td>' + msgJson[k]['categoria'] + '</td>'; // cat
		output += '</tr>';
		durTot += msgJson[k]['durata'];
		totBr++;
	}
	output += '</tbody></table>';
	output += '<ol><li>Durata totale:' + durTot + '</li><li>Numero brani:' + totBr + '</li></ol>';
	
	ris.innerHTML = output;
}