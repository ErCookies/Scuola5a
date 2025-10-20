//Cucchi Francesco 5AI es11.js

function check(formettino){
	const alt = formettino.altezza.value;
	const massa = formettino.massa.value;
	let valido = true;
	
	if(alt == null || isNaN(massa) || alt <= 30 || alt >= 220){
		valido = false;
		formettino.altezza.focus;
	}
	if(massa == null || isNaN(massa) || massa <=10 || massa >= 500){
		valido = false;
		formettino.massa.focus;
	}
	
	return valido;
}