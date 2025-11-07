//Cucchi Francesco 5AI es13.js

function checkForm(formettino){
	const name = formettino.nome.value;
	const regex = /[A-Z][a-z]{1,}/;
	let valido = !(name == null || name === "" || !regex.test(name));
	if(!valido)
		alert("Nome (" + name + ") non valido");
	return valido;
}