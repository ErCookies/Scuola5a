//tutti i campi compilati | pwd e conferma corispondono | data non nel futuro

//ritorna true se la stringa passata come parametro e' null oppure vuota
function isStrVuota(str){
	return (str == null || str ==="");
}

// confronta la data (in formato String) passata come parametro alla data odierna e 
// ritorna true se la data passata come parametro e' nel futuro rispetto ad oggi
function isDataFutura(myDateStr){
	if(!isStrVuota(myDateStr){
		let dataRef = new Date();
		let myDate = new Date(myDateStr);
		return myDate > dataRef;
	}
}

function check(myForm){
	let valido = true
	
	let name = myForm.name.value;
	let sur = myForm.sur.value;
	let genere = myForm.genere.value;
	let data = myForm.data.value;
	let numTel = myForm.numTel.value;
	let colore = myForm.colore.value;
	let mail = myForm.mail.value;
	let pwd = myForm.pwd.value;
	let pwdConf = myForm.pwdConf.value;
	
	let errMex = "";
	
	if(isStrVuota(name))
		errMex += "Compilare il nome\n";
	if(isStrVuota(sur))
		errMex += "Compilare il cognome\n";
	if(isDataFutura(data))
		errMex += "Data futura non valida\n";
	if(isStrVuota(numTel))
		errMex += "Compilare il numero di telefono\n";
	if(isStrVuota(mail))
		errMex += "Compilare la E-Mail\n";
	if(isStrVuota(pwd))
		errMex += "Compilare la password\n";
	if(isStrVuota(pwdConf))
		errMex += "Compilare la conferma della password\n";
	if((!isStrVuota(confPwd) && !isStrVuota(pwd)) && pwd != confPwd)
		errMex += "Le password non corispondono\n";
	
	
	if(!isStrVuota(errMex)){
		valido = false
		alert(errMex);
	}
	
	return valido;
}