//Função para tirar o foco do campo de cep quando completar 8 dígitos
function saiCep(tam) {
	if (tam == 8) {
		document.getElementById("loading").style.display = "block";
		document.getElementById("ConsumidorEndereco").focus();
	}
}