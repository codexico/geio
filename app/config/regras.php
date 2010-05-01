<?php
/**
 * regras.php
 *
 * Regras da campanha
 */


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




////////////////////
// Saldo das trocas
///////////////////
/**
 * True se acumula os saldos, False se descarta o saldo
 *
 * @global boolean $GLOBALS['config']
 * @name $config
 */
$config['Regras.Saldo.true'] =  FALSE;




////////////////////
// Bandeiras Patrocinadoras
///////////////////
/**
 * True se tem alguma bandeira patrocinadora
 *
 * @global boolean $GLOBALS['config']
 * @name $config
 */
$config['Regras.Bandeira.true'] = TRUE;
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
 * Quantidade de cupons por 'Regras.Valor'
 *
 * @global int $GLOBALS['config']
 * @name $config
 */
$config['Regras.Bandeira.valor'] =  3;
/**
 * Máximo de brindes que um consumidor pode retirar
 *
 * @global int $GLOBALS['config']
 * @name $config
 */
$config['Regras.Brinde.max'] = 4;



?>