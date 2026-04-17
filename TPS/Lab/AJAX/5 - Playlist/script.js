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
			error(this.responseText);
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