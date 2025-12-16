// Cucchi Francesco 5AI 24/11/2025 script.js

document.addEventListener("DOMContentLoaded", () =>{
	const inVoto = document.getElementById("inVoto");
	inVoto.addEventListener("blur", () =>{
		if(parseInt(inVoto.value) < 1 || parseInt(inVoto.value) > 10){
			alert("Voto non valido");
			inVoto.focus;
		}
	});
});

function checkForm(formettino){
	return !(isNaN(formettino.voto.value) || (parseInt(formettino.voto.value) < 1 || parseInt(formettino.voto.value) > 10));
}