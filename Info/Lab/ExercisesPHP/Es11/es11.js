//Cucchi Francesco 5AI es11.js

function check(formettino){
	const alt = formettino.altezza.value;
	const massa = formettino.massa.value;
	let valido = false;
	
	alert("Altezza: " + alt + " | Massa: " + massa);
	
	if(alt == null || isNaN(alt) || alt <= 30 || alt >= 220){
		valido = false;
	}
	if(massa == null || isNaN(massa) || massa <=10 || massa >= 500){
		valido = false;
	}
	
	if(!valido)
		alert("Controllare i dati inseriti");
	
	return valido;
}