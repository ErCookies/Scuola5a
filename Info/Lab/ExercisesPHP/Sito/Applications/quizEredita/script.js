// Cucchi Francesco 5^AI script.js
// Function that checks if the form data is valid, returning true or false
// The condition for the data to be valid is that all of the words have to be 
// different between each other
function checkData(form){
	let w1 = form.word1.value,
		w2 = form.word2.value,
		w3 = form.word3.value,
		w4 = form.word4.value,
		w5 = form.word5.value,
		ww = form.winWord.value;
	let val = (w1 !== w2 && w1 !== w3 && w1 !== w4 && w1 !== w5 && w1 !== ww &&
				w2 !== w3 && w2 !== w4 && w2 !== w5 && w2 !== ww &&
				w3 !== w4 && w3 !== w5 && w3 !== ww &&
				w4 !== w5 && w4 !== ww &&
				w5 !== ww);
	
	if(!val) alert("Nessuna parola può essere uguale!");
	
	return val;
}