<?php
	/*
	* Se o array endereco não estiver vazio, recupera os dados de endereco
	*/
	if(!empty($endereco)) {
		$logradouro = $endereco['Endereco']['logradouro'];
		$bairro		= $endereco['Bairro']['descricao'];
		$cidade		= $endereco['Cidade']['cidade'];
		$estado		= $endereco['Estado']['estado'];
		$pais		= $endereco['Paise']['nome'];
	}
?>
<script language="Javascript">
	/*
	 * Atribui os dados de endereço recuperados pelo php aos campos do formulário
	 * Obs.: Poderia colocar o php acima gerando o javascript direto, mas
	 * deixei separado para melhor entendimento 
	 */
	document.getElementById("ConsumidorEndereco").value = "<?php echo $logradouro; ?>";
	document.getElementById("ConsumidorBairro").value = "<?php echo $bairro; ?>";
	document.getElementById("ConsumidorCidade").value = "<?php echo $cidade; ?>";
	document.getElementById("loading").style.display = "none";
	document.getElementById("ConsumidorNumero").focus();
	
	/*
	 * Como o estado e país são campos do tipo select, foi necessário uma
	 * implementação a mais para fazê-lo funcionar como queremos, pois não basta atribuir um valor,
	 * temos que posicionar no valor correto.
	 * Obs.: Feito com (for) porque não existe uma função javascript para selecionar uma posição de acordo com o value.
	 */
	var estado = "<?php echo $estado; ?>", pais = "<?php echo $pais; ?>";
    selectEstados = document.getElementById("ConsumidorEstado");
	selectPais	  = document.getElementById("ConsumidorPais");
	selectEstados.options[0].selected = true;
	selectPais.options[0].selected = true;
    for(i=0; i<selectEstados.length; i++) { //for de 0 até o fim do select estados
	    if (selectEstados.options[i].value == estado) { //se posicao atual igual variável estado, seleciona este.
	    	selectEstados.options[i].selected = true;
	    }
    }
	for(i=0; i<selectPais.length; i++) { //for de 0 até o fim do select pais
		if (selectPais.options[i].value == pais) { //se posicao atual igual variável pais, seleciona este.
			selectPais.options[i].selected = true;
		}
	}
</script>