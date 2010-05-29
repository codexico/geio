<?php
/**
 * regras.php
 *
 * Regras da campanha
 */

/////////
//CAMPANHA
/////////
$config['Campanha.Inicio'] =  date('Y-m-d', strtotime("1 May 2010"));


////////////////////
// Tipo de premiacao
///////////////////
/**
 * True se gera Cupom Promocional, False se não gera
 * Ex: se não precisa imprimir cupom não precisa gerar
 *
 * @global <type> $GLOBALS['config']
 * @name $config
 */
$config['Regras.CupomPromocional.true'] = FALSE;
/**
 * True se troca por brinde, false se nao tem brinde
 *
 * @global boolean $GLOBALS['config']
 * @name $config
 */
$config['Regras.Brinde.true'] = TRUE;
/**
 * True se o Consumidor deve pagar um valor para receber o Brinde, false se é grátis
 *
 * @since namorados 2010
 * @global boolean $GLOBALS['config']
 * @name $config['Regras.Brinde.Pagar.true']
 */
$config['Regras.Brinde.Pagar.true'] = TRUE;




////////////////////
// Saldo das trocas
///////////////////
/**
 * True se usa os saldos, false se não usa
 *
 * @global <type> $GLOBALS['config']
 * @name $config 
 */
$config['Regras.Saldo.true'] =  FALSE;
/**
 * True se acumula os saldos, False se descarta o saldo
 * Ex: Casos em que o saldo não é utilizado porém ainda é guardado para estatísticas
 *
 * @global boolean $GLOBALS['config']
 * @name $config
 */
$config['Regras.Saldo.acumular'] =  TRUE;
/**
 * True se gasta os saldos acumulados, false se não gasta
 *
 * @global <type> $GLOBALS['config']
 * @name $config
 */
$config['Regras.Saldo.gastar'] =  FALSE;




////////////////////
// Bandeiras Patrocinadoras
///////////////////
/**
 * True se tem alguma bandeira patrocinadora
 *
 * @global boolean $GLOBALS['config']
 * @name $config
 */
$config['Regras.Bandeira.true'] = FALSE;
/**
 * Nome da bandeira patrocinadora
 *
 * @global String $GLOBALS['config']
 * @name $config
 */
$config['Regras.Bandeira.nome'] =  'VISA';




////////////////////
// Valores
///////////////////
/**
 * Valor minimo em R$ necessarios para gerar um cupom ou brinde
 *
 * @global int $GLOBALS['config']
 * @name $config
 */
$config['Regras.Valor'] =  50;
/**
 * Quantidade de cupons e/ou brindes gerados se a troca foi com a Bandeira, a cada 'Regras.Valor'
 * Por default é gerado apenas 1 cupom e/ou brinde se a troca não for com bandeira
 *
 * @global int $GLOBALS['config']
 * @name $config
 */
$config['Regras.Bandeira.valor'] =  1;
/**
 * Máximo de brindes que um consumidor pode retirar
 *
 * @global int $GLOBALS['config']
 * @name $config
 */
$config['Regras.Brinde.max'] = 999;

/**
 * Valor que o Consumidor deve pagar para receber o Brinde, em R$
 *
 * @since namorados 2010
 * @see $config['Regras.Brinde.Pagar.true']
 * @global int $GLOBALS['config']
 * @name $config
 */
$config['Regras.Brinde.preco'] = 10;


?>